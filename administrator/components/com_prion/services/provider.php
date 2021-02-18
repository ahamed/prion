<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_prion
 *
 * @copyright   (C) Sajeeb Ahamed, <dark07web@gmail.com>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die('Restricted direct access!');

use Joomla\CMS\Dispatcher\ComponentDispatcherFactoryInterface;
use Joomla\CMS\Extension\ComponentInterface;
use Joomla\CMS\Extension\Service\Provider\ComponentDispatcherFactory;
use Joomla\CMS\Extension\Service\Provider\MVCFactory;
use Joomla\CMS\HTML\Registry;
use Joomla\CMS\MVC\Factory\MVCFactoryInterface;
use Joomla\Component\Prion\Administrator\Extension\PrionComponent;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;

/**
 * The prion service provider.
 *
 * @since  1.0.0
 */
return new class implements ServiceProviderInterface
{
	/**
	 * Registers the service provider with a DI container.
	 *
	 * @param   Container  $container  The DI container.
	 *
	 * @return  void
	 *
	 * @since   1.0.0
	 */
	public function register(Container $container)
	{

		$container->registerServiceProvider(new MVCFactory('\\Joomla\\Component\\Prion'));
		$container->registerServiceProvider(new ComponentDispatcherFactory('\\Joomla\\Component\\Prion'));

		$container->set(
			ComponentInterface::class,
			function (Container $container)
			{
				$component = new PrionComponent($container->get(ComponentDispatcherFactoryInterface::class));

				$component->setRegistry($container->get(Registry::class));
				$component->setMVCFactory($container->get(MVCFactoryInterface::class));

				return $component;
			}
		);
	}
};
