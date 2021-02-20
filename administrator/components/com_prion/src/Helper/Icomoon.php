<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_prion
 *
 * @copyright   (C) Sajeeb Ahamed, <dark07web@gmail.com>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Component\Prion\Administrator\Helper;

\defined('_JEXEC') or die('Restricted Direct Access!');

/**
 * Icomoon icons helper class.
 *
 * @since	1.0.0
 */
class Icomoon
{
	/**
	 * The icon names array.
	 *
	 * @var		array	The name array.
	 *
	 * @since	1.0.0
	 */
	private static $icons = ["add", "address-book", "address", "align-justify", "angle-double-left", "angle-double-right", "angle-down", "angle-left", "angle-right", "angle-up", "apply", "archive", "arrow-down-2", "arrow-down-3", "arrow-down-4", "arrow-down", "arrow-first", "arrow-last", "arrow-left-2", "arrow-left-3", "arrow-left-4", "arrow-left", "arrow-right-2", "arrow-right-3", "arrow-right-4", "arrow-right", "arrow-up-2", "arrow-up-3", "arrow-up-4", "arrow-up", "arrows-alt", "asterisk", "attachment", "backward-2", "backward-circle", "backward", "ban-circle", "bars", "basket", "bell", "bolt", "book", "bookmark-2", "bookmark", "box-add", "box-remove", "briefcase", "broadcast", "brush", "bubble-quote", "bullhorn", "calendar-check", "calendar-2", "calendar-3", "calendar-alt", "calendar", "camera-2", "camera", "cancel-2", "cancel-circle", "cancel", "caret-down", "caret-up", "cart", "chart", "check-circle", "check-square", "check", "checkbox-checked", "checkbox-partial", "checkbox-unchecked", "checkbox", "checkedout", "checkin", "checkmark-2", "checkmark-circle", "checkmark", "chevron-down", "chevron-left", "chevron-right", "chevron-up", "circle", "clipboard", "clock", "cloud-download-alt", "cloud-download", "cloud-upload", "cloud", "code", "code-branch", "cog", "cogs", "collapse", "color-palette", "comment-dots", "comment", "comments-2", "comments", "compass", "connection", "contract-2", "contract", "copy", "credit-2", "credit", "crop", "cube", "cubes", "dashboard", "database", "default", "delete", "desktop", "downarrow", "download", "drawer-2", "drawer", "edit", "ellipsis-h", "ellipsis-v", "enter", "envelope-open-text", "envelope-opened", "envelope", "equalizer", "error", "exclamation-circle", "exclamation-triangle", "exclamation", "exit", "expand-2", "expand", "expired", "external-link-alt", "eye-2", "eye-blocked", "eye-close", "eye-open", "eye-slash", "eye", "fax", "featured", "feed", "file-2", "file-add", "file-alt", "file-check", "file-minus", "file-plus", "file-remove", "file", "filter", "first", "flag-2", "flag-3", "flag", "flash", "folder-2", "folder-3", "folder-close", "folder-minus", "folder-open", "folder-plus-2", "folder-plus", "folder-remove", "folder", "forward-2", "forward-circle", "forward", "generic", "globe", "grid-2", "grid-view-2", "grid-view", "grid", "handshake", "health", "heart-2", "heart", "help", "hits", "home-2", "home", "image", "images", "info-2", "info-circle", "info", "key", "lamp", "language", "last", "leftarrow", "lightbulb", "lightning", "link", "list-2", "list-view", "list", "loading", "location", "lock", "locked", "loop", "mail-2", "mail", "map-signs", "menu-2", "menu-3", "menu", "minus-2", "minus-circle", "minus-sign", "minus", "mobile", "move", "music", "new-tab-2", "new-tab", "new", "next", "not-ok", "notification-2", "notification-circle", "notification", "ok", "open", "options", "out-2", "out-3", "out", "paint-brush", "palette", "paperclip", "paragraph-center", "paragraph-justify", "paragraph-left", "paragraph-right", "pause-circle", "pause", "pen-square", "pencil-2", "pencil-alt", "pencil", "pending", "phone-2", "phone", "picture", "pictures", "pie", "pin", "play-2", "play-circle", "play", "plug", "plus-2", "plus-circle", "plus-square", "plus", "power-cord", "power-off", "previous", "print", "printer", "project-diagram", "protected", "publish", "purge", "pushpin", "puzzle-piece", "puzzle", "question-2", "question-circle", "question-sign", "question", "quote-2", "quote-3", "quote", "quotes-left", "quotes-right", "radio-checked", "radio-unchecked", "redo-2", "redo", "refresh", "register", "remove", "reply", "rightarrow", "rss", "save-copy", "save-new", "save", "scissors", "screen", "screwdriver", "search-minus", "search-plus", "search", "select-file", "share-alt", "share", "shield-alt", "shield", "shuffle", "signup", "sliders-h", "smiley-2", "smiley-happy-2", "smiley-happy", "smiley-neutral-2", "smiley-neutral", "smiley-sad-2", "smiley-sad", "smiley", "sort", "spinner", "square", "stack", "star-2", "star-empty", "star", "stop-circle", "stop", "success", "support", "switch", "sync", "tablet", "tachometer-alt", "tag-2", "tag", "tags-2", "tags", "tasks", "text-width", "th", "th-large", "thumbs-down", "thumbs-up", "times", "toggle-off", "toggle-on", "tools", "trash", "tree-2", "tree", "trophy", "unarchive", "unblock", "undo-2", "undo", "unfeatured", "universal", "universal-access", "unlock-alt", "unlock", "unpublish", "uparrow", "upload", "user-circle", "user-edit", "user-lock", "user-tag", "user", "users-cog", "users", "vcard", "video-2", "video", "wand", "warning-2", "warning-circle", "warning", "wifi", "wrench", "zoom-in", "zoom-out"];

	/**
	 * Get the Icons List.
	 *
	 * @param	string	$filter		The filter keyword.
	 *
	 * @return	array	The icon names array.
	 *
	 * @since	1.0.0
	 */
	public static function getIcons($filter = '')
	{
		if (empty($filter))
		{
			return self::$icons;
		}

		$filter = preg_replace("@\s+@", ' ', $filter);
		$filter = implode('|', explode(' ', $filter));
		$regex = "@" . $filter . "@i";

		return array_filter(self::$icons, function($icon) use ($regex) {
			return preg_match($regex, $icon);
		});
	}
}