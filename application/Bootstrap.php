<?php

// use DI\Bridge\ZendFramework1\Dispatcher;
// use DI\ContainerBuilder;
use Doctrine\Common\Cache\ArrayCache;
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	/**
	 * Bootstrap:: Php-DI
	 * @return [type] [description]
	 */
	protected function _initContainer()
	{
						// $configuration = new Zend_Config($this->getOptions());

		    //     $builder = new ContainerBuilder();
		    //     // $builder->useAnnotations(false);
		    //     // $builder->useAutowiring(true);
		    //     // $builder->addDefinitions(APPLICATION_PATH . '/configs/config.php');
		    //     // $builder->addDefinitions(APPLICATION_PATH . '/configs/config.' . APPLICATION_ENV . '.php');
		    //     // $builder->addDefinitions(APPLICATION_PATH . '/configs/parameters.php');


		    //     if (APPLICATION_ENV === 'production') {
		    //         $cache = new MemcachedCache();
		    //         $memcached = new Memcached();
		    //         $memcached->addServer('localhost', 11211);
		    //         $cache->setMemcached($memcached);
		    //     } else {
		    //         $cache = new ArrayCache();
		    //     }
		    //     $cache->setNamespace('Application_');
		    //     // $builder->setDefinitionCache($cache);

		    //     $container = $builder->build();

		    //     $dispatcher = new \DI\Bridge\ZendFramework1\Dispatcher();
		    //     $dispatcher->setContainer($container);
		    //     Zend_Controller_Front::getInstance()->setDispatcher($dispatcher);
	}
	/**
	   * Bootstrap::_initRouterRewrites()
	   *
	   * @return void
	   */
	protected function _initRouting() {
		$config = new Zend_Config_Ini(APPLICATION_PATH . "/configs/routes.ini", "production");
		$router = new Zend_Controller_Router_Rewrite();
		$router->addConfig($config, "routes");
		Zend_Controller_Front::getInstance()->setRouter($router);
	}
}
