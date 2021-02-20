<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_prion
 *
 * @copyright   (C) Sajeeb Ahamed, <dark07web@gmail.com>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */


namespace Joomla\Component\Prion\Administrator\Controller;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\MVC\Controller\BaseController;
use Joomla\CMS\MVC\Factory\MVCFactoryInterface;
use Joomla\CMS\Response\JsonResponse;
use Joomla\Component\Prion\Administrator\Helper\Icomoon;

\defined('_JEXEC') or die('Restricted Direct Access!');

/**
 * Controller class for the icomoon icons
 *
 * @since	1.0.0
 */
class IcomoonController extends BaseController
{
	/**
	 * Constructor.
	 *
	 * @param   array                $config   An optional associative array of configuration settings.
	 * Recognized key values include 'name', 'default_task', 'model_path', and
	 * 'view_path' (this list is not meant to be comprehensive).
	 * @param   MVCFactoryInterface  $factory  The factory.
	 * @param   CMSApplication       $app      The JApplication for the dispatcher
	 * @param   Input                $input    Input
	 *
	 * @since   1.0.0
	 */
	public function __construct($config = array(), MVCFactoryInterface $factory = null, $app = null, $input = null)
	{
		parent::__construct($config, $factory, $app, $input);
	}

	/**
	 * Get icomoon icons response
	 *
	 * @return	void
	 *
	 * @since	1.0.0
	 */
	public function getIcons()
	{
		$keyword = $this->input->getString('keyword', '');
		$icons = Icomoon::getIcons($keyword);

		$html = [];

		if (!empty($icons))
		{
			foreach ($icons as $icon)
			{
				$html[] = '<a href="javascript:void(0);" class="box">';
				$html[] = '		<div class="prion-icon-preview">';
				$html[] = HTMLHelper::_('icon.render', $icon, 'preview');
				$html[] = '		</div>';
				$html[] = '		<div class="prion-icon-info">';
				$html[] = '			<span class="icon-name">' . $icon . '</span>';
				$html[] = '		</div>';
				$html[] = '		<span class="prion-copied-message">Copied!</span>';
				$html[] = '</a>';
			}
		}
		else
		{
			$html[] = '<div class="prion-no-icon">';
			$html[] = '<svg height="100" viewBox="0 0 60 61" width="100" xmlns="http://www.w3.org/2000/svg"><g fill-rule="nonzero" fill="none"><path d="M43.23 27.01c1.166.05 2.252.61 2.97 1.53l11.96 15.38c.543.701.838 1.563.84 2.45V56a4 4 0 01-4 4H5a4 4 0 01-4-4v-9.63a4.014 4.014 0 01.84-2.45L13.8 28.54a3.982 3.982 0 012.97-1.53z" fill="#e8edfc"/><path d="M58.16 43.92L46.2 28.54a3.982 3.982 0 00-2.97-1.53h-3c1.166.05 2.252.61 2.97 1.53l11.96 15.38c.543.701.838 1.563.84 2.45V56a4 4 0 01-4 4h3a4 4 0 004-4v-9.63a4.014 4.014 0 00-.84-2.45z" fill="#cad9fc"/><path d="M55 47H42.24a2 2 0 00-1.79 1.11l-1.9 3.78A2 2 0 0136.76 53H23.24a2 2 0 01-1.79-1.11l-1.9-3.78A2 2 0 0017.76 47H5l12-16h26z" fill="#cad9fc"/><path d="M55 47H42.24a2 2 0 00-1.79 1.11l-1.9 3.78A2 2 0 0136.76 53H23.24a2 2 0 01-1.79-1.11l-1.9-3.78A2 2 0 0017.76 47H5l12-16h26z" fill="#a4c2f7"/><circle cx="30" cy="18" fill="#e8edfc" r="16"/><path d="M30 2c-.506 0-1.006.03-1.5.076C36.718 2.847 43 9.746 43 18s-6.282 15.153-14.5 15.924c.494.046.994.076 1.5.076 8.837 0 16-7.163 16-16S38.837 2 30 2z" fill="#cad9fc"/><path d="M5 60h3a4 4 0 01-4-4v-9.63a4.014 4.014 0 01.84-2.45L16.8 28.54a3.982 3.982 0 012.981-1.53A16.023 16.023 0 0131.5 2.074C31.008 2.03 30.51 2 30 2a16.018 16.018 0 00-13.219 25.01 3.982 3.982 0 00-2.981 1.53L1.84 43.92A4.014 4.014 0 001 46.37V56a4 4 0 004 4z" fill="#fff"/><path d="M1.034 43.31L5.946 37l1.578 1.228-4.912 6.312z" fill="#fff"/><g fill="#428dff"><path d="M4.315 41.762a1 1 0 01-.01-2h.01a1 1 0 010 2z"/><path d="M46.988 27.923a4.99 4.99 0 00-2.182-1.6 17 17 0 10-29.612 0 4.99 4.99 0 00-2.182 1.6l-7.05 9.068a1 1 0 001.578 1.228l7.048-9.064a2.981 2.981 0 011.755-1.074c5.42 7.39 15.737 9.127 23.279 3.919H42.5l11.7 15.6a1 1 0 001.6-1.2l-12-16a1 1 0 00-.8-.4h-.971c.59-.599 1.133-1.24 1.628-1.919a2.974 2.974 0 011.754 1.073l11.957 15.377c.407.527.63 1.173.632 1.839V56a3 3 0 01-3 3H5a3 3 0 01-3-3v-9.63a3.025 3.025 0 01.632-1.839 1 1 0 00-1.584-1.222A5.04 5.04 0 000 46.37V56a5.006 5.006 0 005 5h50a5.006 5.006 0 005-5v-9.63a5.044 5.044 0 00-1.05-3.064zM15 18c0-8.284 6.716-15 15-15s15 6.716 15 15c0 8.284-6.716 15-15 15-8.28-.01-14.99-6.72-15-15z"/><path d="M16.76 31.32a1 1 0 00-1.4.2L4.2 46.4A1 1 0 005 48h12.764a.994.994 0 01.894.553l1.895 3.789A2.983 2.983 0 0023.236 54h13.528a2.983 2.983 0 002.683-1.658l1.895-3.789a.994.994 0 01.894-.553H47a1 1 0 000-2h-4.764a2.983 2.983 0 00-2.683 1.658l-1.895 3.789a.994.994 0 01-.894.553H23.236a.994.994 0 01-.894-.553l-1.895-3.789A2.983 2.983 0 0017.764 46H7l9.96-13.28a1 1 0 00-.2-1.4zM39.947 13.105a1 1 0 00-1.342.448l-.665 1.331a9 9 0 00-15.354-2.646 1 1 0 101.536 1.281 7 7 0 0112.161 2.754l-2.336-1.168a1 1 0 10-.894 1.79l4 2a1 1 0 001.342-.448l2-4a1 1 0 00-.448-1.342zM35.878 22.481a7 7 0 01-12.161-2.754l2.336 1.173a1 1 0 00.894-1.79l-4-2a1 1 0 00-1.342.448l-2 4a1 1 0 001.79.894l.665-1.331a9 9 0 0015.354 2.646 1 1 0 00-1.536-1.281z"/></g></g></svg>';
			$html[] = '<h2>No Icon Found!</h2>';
			$html[] = '</div>';
		}

		$this->app->setHeader('status', 200, true);
		$this->app->sendHeaders();
		echo new JsonResponse(['html' => implode("\n", $html), 'total' => count($icons)]);
		$this->app->close();
	}
}