<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_content
 *
 * @copyright   (C) 2008 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Uri\Uri;
use Joomla\Component\Prion\Administrator\Helper\Icomoon;

$icons = Icomoon::getIcons();

$wa = $this->document->getWebAssetManager();
$wa->useScript('com_prion.icons');
$wa->useStyle('com_prion.icons');

$this->document->addScriptOptions('config', ['base' => rtrim(Uri::root(), '/')]);

?>

<div id="prion-icomoon-container">
	<div class="prion-icons-searchbar">
		<input type="text" class="form-control prion-icon-search" placeholder="Search icons">
		<?php echo HTMLHelper::_('icon.render', 'search', 'placeholder-icon'); ?>
		<?php echo HTMLHelper::_('icon.render', 'times', 'remove-icon'); ?>
	</div>
	<div class="prion-message-bar">
		<h2 class="prion-total-icons"></h2>
		<div class="prion-search-tokens">
		</div>
	</div>
	<div class="prion-icomoon-icons"></div>
</div>