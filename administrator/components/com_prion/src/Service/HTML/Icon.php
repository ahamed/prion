<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_prion
 *
 * @copyright   (C) Sajeeb Ahamed, <dark07web@gmail.com>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Component\Prion\Administrator\Service\HTML;

\defined('_JEXEC') or die('Restricted Direct Access!');

use Joomla\CMS\Factory;

/**
 * Sample class for HTML Service class Icon.
 *
 * @since	1.0.0
 */
class Icon
{
	/**
	 * Application instance.
	 *
	 * @var		CMSApplication
	 *
	 * @since	1.0.0
	 */
	private $application = null;

	/**
	 * Constructor function for the Icon class.
	 *
	 * @since	1.0.0
	 */
	public function __construct()
	{
		$application = Factory::getApplication();
	}

	/**
	 * Render an icon.
	 *
	 * @param	string	$name	The icon name.
	 *
	 * @return	string	The HTML string for the icon.
	 *
	 * @since	1.0.0
	 */
	public function render(string $name, string $modifier = '') : string
	{
		return '<span class="icon-' . $name . ($modifier ? ' ' . $modifier : '') . '"></span>';
	}
}