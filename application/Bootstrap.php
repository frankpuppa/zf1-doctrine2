<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
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
