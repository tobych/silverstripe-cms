<?php
/**
 * Represents a single comment on a page
 * @package cms
 * @subpackage comments
 */
class PageComment extends DataObject {
	
	static $db = array(
		"Name" => "Varchar(200)",
		"Comment" => "Text",
		"IsSpam" => "Boolean",
		"NeedsModeration" => "Boolean",
		"CommenterURL" => "Varchar(255)",
		"SessionID" => "Varchar(255)"	
	);

	static $has_one = array(
		"Parent" => "SiteTree",
		"Author" => "Member" // Only set when the user is logged in when posting 
	);
	
	static $has_many = array();
	
	static $many_many = array();
	
	static $defaults = array();
	
	static $casting = array(
		"RSSTitle" => "Varchar",
	);

	// Number of comments to show before paginating
	static $comments_per_page = 10;
	
	static $moderate = false;
	
	static $bbcode = false;

	/**
	 * Return a link to this comment
	 * @return string link to this comment.
	 */
	function Link() {
		return $this->Parent()->Link() . '#PageComment_'. $this->ID;
	}
	
	function getRSSName() {
		if($this->Name) {
			return $this->Name;
		} elseif($this->Author()) {
			return $this->Author()->getName();
		}
	}
	
	function ParsedBBCode(){
		$parser = new BBCodeParser($this->Comment);
		return $parser->parse();		
	}

	function DeleteLink() {
		return (Permission::check('CMS_ACCESS_CMSMain')) ? "PageComment_Controller/deletecomment/$this->ID" : false;
	}
	
	function CommentTextWithLinks() {
		$pattern = '|([a-zA-Z]+://)([a-zA-Z0-9?&%.;:/=+_-]*)|is';
		$replace = '<a rel="nofollow" href="$1$2">$1$2</a>';
		return preg_replace($pattern, $replace, $this->Comment);
	}
	
	function SpamLink() {
		return (Permission::check('CMS_ACCESS_CMSMain') && !$this->IsSpam) ? "PageComment_Controller/reportspam/$this->ID" : false;
	}
	
	function HamLink() {
		return (Permission::check('CMS_ACCESS_CMSMain') && $this->IsSpam) ? "PageComment_Controller/reportham/$this->ID" : false;
	}
	
	function ApproveLink() {
		return (Permission::check('CMS_ACCESS_CMSMain') && $this->NeedsModeration) ? "PageComment_Controller/approve/$this->ID" : false;
	}
	
	function SpamClass() {
		if($this->getField('IsSpam')) {
			return 'spam';
		} else if($this->getField('NeedsModeration')) {
			return 'unmoderated';
		} else {
			return 'notspam';
		}
	}
	
	
	function RSSTitle() {
		return sprintf(
			_t('PageComment.COMMENTBY', "Comment by '%s' on %s", PR_MEDIUM, 'Name, Page Title'),
			Convert::raw2xml($this->getRSSName()),
			$this->Parent()->Title
		);
	}
	


	
	function PageTitle() {
		return $this->Parent()->Title;
	}
	
	static function enableModeration() {
		self::$moderate = true;
	}	

	static function moderationEnabled() {
		return self::$moderate;
	}
	
	static function enableBBCode() {
		self::$bbcode = true;
	}	

	static function bbCodeEnabled() {
		return self::$bbcode;
	}
	
	/**
	 *
	 * @param boolean $includerelations a boolean value to indicate if the labels returned include relation fields
	 * 
	 */
	function fieldLabels($includerelations = true) {
		$labels = parent::fieldLabels($includerelations);
		$labels['Name'] = _t('PageComment.Name', 'Author Name');
		$labels['Comment'] = _t('PageComment.Comment', 'Comment');
		$labels['IsSpam'] = _t('PageComment.IsSpam', 'Spam?');
		$labels['NeedsModeration'] = _t('PageComment.NeedsModeration', 'Needs Moderation?');
		
		return $labels;
	}
	
	/**
	 * This method is called just before this object is
	 * written to the database.
	 * 
	 * Specifically, make sure "http://" exists at the start
	 * of the URL, if it doesn't have https:// or http://
	 */
	public function onBeforeWrite() {
		parent::onBeforeWrite();
		
		$url = $this->CommenterURL;
		
		if($url) {
			if(substr($url, 0, 8) != 'https://') {
				if(substr($url, 0, 7) != 'http://') {
					$url = $this->CommenterURL = 'http://' . $url;
				}
			}
		}
		
		$this->CommenterURL = $url;
	}
	
}


class PageComment_Controller extends Controller {
	function rss() {
		$parentcheck = isset($_REQUEST['pageid']) ? "\"ParentID\" = " . (int) $_REQUEST['pageid'] : "\"ParentID\" > 0";
		$unmoderatedfilter = Permission::check('ADMIN') ? '' : "AND \"NeedsModeration\" = 0";
		$comments = DataObject::get("PageComment", "$parentcheck AND \"IsSpam\" = 0 $unmoderatedfilter", "\"Created\" DESC", "", 10);
		if(!isset($comments)) {
			$comments = new DataObjectSet();
		}
		
		$rss = new RSSFeed($comments, "home/", "Page comments", "", "RSSTitle", "Comment", "RSSName");
		$rss->outputToBrowser();
	}
	
	/**
	 * Deletes all comments on the page referenced by the url param pageid
	 */
	function deleteallcomments() {
		if(Permission::check('CMS_ACCESS_CMSMain')) {
			$pageId = $_REQUEST['pageid'];
			if(preg_match('/^\d+$/', $pageId)) {
				$comments = DataObject::get("PageComment", "ParentID = $pageId");
				if($comments) foreach($comments as $c) {
					$c->delete();
				}
			}
		}
		
		if(Director::is_ajax()) {
			echo "";
		} else {
			Director::redirectBack();
		}
	}
	
	function deletecomment() {
		if(Permission::check('CMS_ACCESS_CMSMain')) {
			$comment = DataObject::get_by_id("PageComment", $this->urlParams['ID']);
			if($comment) {
				$comment->delete();
			}
		}
		
		if(Director::is_ajax()) {
			echo "";
		} else {
			Director::redirectBack();
		}
	}
	
	function approve() {
		if(Permission::check('CMS_ACCESS_CMSMain')) {
			$comment = DataObject::get_by_id("PageComment", $this->urlParams['ID']);

			if($comment) {
				$comment->NeedsModeration = false;
				$comment->write();
			
				// @todo Report to spamprotecter this is true
			
				if(Director::is_ajax()) {
					echo $comment->renderWith('PageCommentInterface_singlecomment');
				} else {
					Director::redirectBack();
				}
			}
		}
	}
	
	function reportspam() {
		$comment = DataObject::get_by_id("PageComment", $this->urlParams['ID']);
		if($comment) {
			// check they have access
			if(Permission::check('CMS_ACCESS_CMSMain')) {
				
				// if spam protection module exists
				if(class_exists('SpamProtectorManager')) {
					SpamProtectorManager::send_feedback($comment, 'spam');
				}
				
				// If Akismet is enabled
				else if(SSAkismet::isEnabled()) {
					try {
						$akismet = new SSAkismet();
						$akismet->setCommentAuthor($comment->getField('Name'));
						$akismet->setCommentContent($comment->getField('Comment'));
						$akismet->submitSpam();
					} catch (Exception $e) {
						// Akismet didn't work, most likely the service is down.
					}
				}
				
				$comment->IsSpam = true;
				$comment->NeedsModeration = false;
				$comment->write();
			}
		}
		if(Director::is_ajax()) {
			if(SSAkismet::isEnabled() && SSAkismet::getSaveSpam()) {
				echo $comment->renderWith('PageCommentInterface_singlecomment');
			} else {
				echo '';
			}
		} else {
			Director::redirectBack();
		}	
	}
	/**
	 * Report a Spam Comment as valid comment (not spam)
	 */
	function reportham() {
		$comment = DataObject::get_by_id("PageComment", $this->urlParams['ID']);
		if($comment) {
			if(Permission::check('CMS_ACCESS_CMSMain')) {
					
				// if spam protection module exists
				if(class_exists('SpamProtectorManager')) {
					SpamProtectorManager::send_feedback($comment, 'ham');
				}
				
				if(SSAkismet::isEnabled()) {
					try {
						$akismet = new SSAkismet();
						$akismet->setCommentAuthor($comment->getField('Name'));
						$akismet->setCommentContent($comment->getField('Comment'));
						$akismet->submitHam();
					} catch (Exception $e) {
						// Akismet didn't work, most likely the service is down.
					}
				}
				$comment->setField('IsSpam', false);
				$comment->write();
			}
		}
		if(Director::is_ajax()) {
			echo $comment->renderWith('PageCommentInterface_singlecomment');
		} else {		
			Director::redirectBack();
		}
	}
	
}

?>
