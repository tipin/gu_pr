<?php

use Nette\Application\Routers\Route;


require LIBS_DIR . '/Nette/loader.php';


$configurator = new Nette\Config\Configurator;

$configurator->setDebugMode(\Nette\Config\Configurator::AUTO);
$configurator->enableDebugger(__DIR__ . '/../log');

$configurator->setTempDirectory(__DIR__ . '/../temp');
$configurator->createRobotLoader()
	->addDirectory(APP_DIR)
	->addDirectory(LIBS_DIR)
	->register();

$configurator->addConfig(__DIR__ . '/config.neon');
$container = $configurator->createContainer();

$container->router[] = new Route('index.php', 'Homepage:default', Route::ONE_WAY);
$container->router[] = new Route('admin/<presenter>/<action>/[<id>/]', array(
    'module' => 'Admin',
    'presenter' => 'Dashboard',
    'action' => 'default',
    'id' => NULL
));
$container->router[] = new Route('<presenter>/<action>/[<id>/]', array(
    'presenter' => array(
        Route::VALUE => 'Homepage',
        Route::FILTER_TABLE => array(
            'oblasti' => 'Area',
            'ucet' => 'Account'
        )
    ),
    'action' => array(
        Route::VALUE => 'default',
        Route::FILTER_TABLE => array(
            'seznam' => 'list',
            'detail' => 'view',
            'prihlaseni' => 'login',
            'registrace' => 'create'
        )
    ),
    'id' => array(
        Route::VALUE => NULL,
        Route::FILTER_TABLE => array(
            'skaly' => 'rock',
            'bouldery' => 'boulder',
            'umenle-steny' => 'wall'
        )
    )
));


$container->application->run();