<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_prion
 *
 * @copyright   (C) Sajeeb Ahamed, <dark07web@gmail.com>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */


namespace Joomla\Component\Prion\Administrator\Extension;

\defined('JPATH_PLATFORM') or die;


use Joomla\CMS\Component\Router\RouterServiceInterface;
use Joomla\CMS\Component\Router\RouterServiceTrait;
use Joomla\CMS\Extension\BootableExtensionInterface;
use Joomla\CMS\Extension\MVCComponent;
use Joomla\CMS\Form\Form;
use Joomla\CMS\HTML\HTMLRegistryAwareTrait;
use Joomla\Component\Prion\Administrator\Helper\PrionHelper;
use Psr\Container\ContainerInterface;


/**
 * Component class for com_prion
 *
 * @since  1.0.0
 */
class PrionComponent extends MVCComponent implements
	BootableExtensionInterface, RouterServiceInterface
{
	use RouterServiceTrait;
	use HTMLRegistryAwareTrait;

	/**
	 * Booting the extension. This is the function to set up the environment of the extension like
	 * registering new class loaders, etc.
	 *
	 * If required, some initial set up can be done from services of the container, eg.
	 * registering HTML services.
	 *
	 * @param   ContainerInterface  $container  The container
	 *
	 * @return  void
	 *
	 * @since   1.0.0
	 */
	public function boot(ContainerInterface $container)
	{
		// $this->getRegistry()->register('contentadministrator', new AdministratorService);
		// $this->getRegistry()->register('contenticon', new Icon($container->get(SiteApplication::class)));

		// The layout joomla.content.icons does need a general icon service
		// $this->getRegistry()->register('icon', $this->getRegistry()->getService('contenticon'));
	}

	/**
	 * Prepares the category form
	 *
	 * @param   Form          $form  The form to prepare
	 * @param   array|object  $data  The form data
	 *
	 * @return void
	 */
	public function prepareForm(Form $form, $data)
	{
		PrionHelper::onPrepareForm($form, $data);
	}
}