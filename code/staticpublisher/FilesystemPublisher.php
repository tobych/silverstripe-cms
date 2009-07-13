<?php

/**
 * Usage: Object::add_extension("SiteTree", "FilesystemPublisher('../static-folder/')")
 *
 * @see http://doc.silverstripe.com/doku.php?id=staticpublisher
 * 
 * @package cms
 * @subpackage publishers
 */
class FilesystemPublisher extends StaticPublisher {
	protected $destFolder;
	protected $fileExtension;
	
	protected static $static_base_url = null;
	
	/**
	 * Use domain based cacheing (put cache files into a domain subfolder)
	 * This must be true if you are using this with subsites.
	 */
	public static $domain_based_caching = false;
	
	/**
	 * Set a different base URL for the static copy of the site.
	 * This can be useful if you are running the CMS on a different domain from the website.
	 */
	static function set_static_base_url($url) {
		self::$static_base_url = $url;
	}
	
	/**
	 * @param $destFolder The folder to save the cached site into
	 * @param $fileExtension  The file extension to use, for example, 'html'.  If omitted, then each page will be placed
	 * in its own directory, with the filename 'index.html'.  If you set the extension to PHP, then a simple PHP script will
	 * be generated that can do appropriate cache & redirect header negotation
	 */
	function __construct($destFolder, $fileExtension = null) {
		if(substr($destFolder, -1) == '/') $destFolder = substr($destFolder, 0, -1);
		$this->destFolder = $destFolder;
		$this->fileExtension = $fileExtension;
		parent::__construct();
	}
	
	function publishPages($urls) { 
		// This can be quite memory hungry and time-consuming
		// @todo - Make a more memory efficient publisher
		increase_time_limit_to();
		increase_memory_limit_to();
		
		//$base = Director::absoluteURL($this->destFolder);
		//$base = preg_replace('/\/[^\/]+\/\.\./','',$base) . '/';
		
		if(self::$static_base_url) Director::setBaseURL(self::$static_base_url);
		
		$files = array();
		$i = 0;
		$totalURLs = sizeof($urls);
		foreach($urls as $url) {
			$i++;

			if($url && !is_string($url)) {
				user_error("Bad url:" . var_export($url,true), E_USER_WARNING);
				continue;
			}
			
			if(StaticPublisher::echo_progress()) {
				echo " * Publishing page $i/$totalURLs: $url\n";
				flush();
			}
			
			Requirements::clear();
			$response = Director::test(str_replace('+', ' ', $url));
			Requirements::clear();
			
			DataObject::flush_and_destroy_cache();

			// Generate file content			
			// PHP file caching will generate a simple script from a template
			if($this->fileExtension == 'php') {
				if(is_object($response)) {
					if($response->getStatusCode() == '301' || $response->getStatusCode() == '302') {
						$content = $this->generatePHPCacheRedirection($response->getHeader('Location'));
					} else {
						$content = $this->generatePHPCacheFile($response->getBody(), HTTP::get_cache_age(), date('Y-m-d H:i:s'));
					}
				} else {
					$content = $this->generatePHPCacheFile($response . '', HTTP::get_cache_age(), date('Y-m-d H:i:s'));
				}
				
			// HTML file caching generally just creates a simple file
			} else {
				if(is_object($response)) {
					if($response->getStatusCode() == '301' || $response->getStatusCode() == '302') {
						$absoluteURL = Director::absoluteURL($response->getHeader('Location'));
						$content = "<meta http-equiv=\"refresh\" content=\"2; URL=$absoluteURL\">";
					} else {
						$content = $response->getBody();
					}
				} else {
					$content = $response . '';
				}
			}
			
			
			$urlParts = @parse_url($url);
			$urlParts['path'] = isset($urlParts['path']) ? $urlParts['path'] : '';
			$url = preg_replace('/[^a-zA-Z0-9]/si', '_', trim($urlParts['path'], '/'));

			if($this->fileExtension) $filename = $url ? "$url.$this->fileExtension" : "index.$this->fileExtension";
			else $filename = $url ? "$url/index.html" : "index.html";
			
			if (self::$domain_based_caching) {
				if (!$urlParts) continue; // seriously malformed url here...
				$filename = $urlParts['host'] . '/' . $filename;
			}
			
			$files[$filename] = array(
				'Content' => $content,
				'Folder' => (dirname($filename) == '/') ? '' :  (dirname($filename).'/'),
				'Filename' => basename($filename),
			);
			
			// Add externals
			/*
			$externals = $this->externalReferencesFor($content);
			if($externals) foreach($externals as $external) {
				// Skip absolute URLs
				if(preg_match('/^[a-zA-Z]+:\/\//', $external)) continue;
				// Drop querystring parameters
				$external = strtok($external, '?');
				
				if(file_exists("../" . $external)) {
					// Break into folder and filename
					if(preg_match('/^(.*\/)([^\/]+)$/', $external, $matches)) {
						$files[$external] = array(
							"Copy" => "../$external",
							"Folder" => $matches[1],
							"Filename" => $matches[2],
						);
					
					} else {
						user_error("Can't parse external: $external", E_USER_WARNING);
					}
				} else {
					$missingFiles[$external] = true;
				}
			}*/
		}

		if(self::$static_base_url) Director::setBaseURL(null);
		
		$base = "../$this->destFolder";
		foreach($files as $file) {
			Filesystem::makeFolder("$base/$file[Folder]");
			
			if(isset($file['Content'])) {
				$fh = fopen("$base/$file[Folder]$file[Filename]", "w");
				fwrite($fh, $file['Content']);
				fclose($fh);
			} else if(isset($file['Copy'])) {
				copy($file['Copy'], "$base/$file[Folder]$file[Filename]");
			}
		}
	}
	
	/**
	 * Generate the templated content for a PHP script that can serve up the given piece of content with the given age and expiry
	 */
	protected function generatePHPCacheFile($content, $age, $lastModified) {
		$template = file_get_contents('../cms/code/staticpublisher/CachedPHPPage.tmpl');
		return str_replace(
				array('**MAX_AGE**', '**LAST_MODIFIED**', '**CONTENT**'),
				array((int)$age, $lastModified, $content),
				$template);
	}
	/**
	 * Generate the templated content for a PHP script that can serve up a 301 redirect to the given destionation
	 */
	protected function generatePHPCacheRedirection($destination) {
		$template = file_get_contents('../cms/code/staticpublisher/CachedPHPRedirection.tmpl');
		return str_replace(
				array('**DESTINATION**'),
				array($destination),
				$template);
	}
}

?>
