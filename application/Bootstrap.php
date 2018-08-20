<?php

use DI\Bridge\ZendFramework1\Dispatcher;
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	/**
	 * Bootstrap:: Php-DI
	 * @return [type] [description]
	 */
	protected function _initContainer()
	{
		$builder = new \DI\ContainerBuilder();
		$builder->useAnnotations(true);
		$container = $builder->build();

		$dispatcher = new \DI\Bridge\ZendFramework1\Dispatcher();
		$dispatcher->setContainer($container);

		Zend_Controller_Front::getInstance()->setDispatcher($dispatcher);
	}
	/**
	   * Bootstrap::_initRouterRewrites()
	   *
	   * @return void
	   */
	protected function _initRouting() {
		$config = new Zend_Config_Ini(APPLICATION_PATH . "/configs/routes.ini", "production"	 );
		$router = new Zend_Controller_Router_Rewrite();
		$router->addConfig($config, "routes");
		Zend_Controller_Front::getInstance()->setRouter($router);
	}
}
