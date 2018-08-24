<?php
/**
 * Created by PhpStorm.
 * User: ivzhenko.volodymyr
 * Date: 29.03.2018
 * Time: 11:40
 */

namespace core;

use Klein\Klein;
use app\Route;
use Twig_Environment;

class App
{
    public static function run()
	{
        $klein = new Klein();
		$twig = self::initTwig();
        new Route($klein, $twig);

        $klein->onHttpError(function ($code, $router) {
            switch ($code) {
                case 404:
                    $router->response()->body(
                        'Y U so lost?!'
                    );
                    break;
                case 405:
                    $router->response()->body(
                        'You can\'t do that!'
                    );
                    break;
                default:
                    $router->response()->body(
                        'Oh no, a bad error happened that caused a '. $code
                    );
            }
        });;
        $klein->dispatch();
	}

    public static function initTwig()
    {
        $loader = new \Twig_Loader_Filesystem([
            ROOT . '/resources/views/'
        ]);
        $loader->addPath(ROOT . '/resources/views/components/', 'components');
        $loader->addPath(ROOT . '/resources/views/pages/', 'pages');
        $twig = new Twig_Environment($loader, [
            'debug' => true,
            'cache' => ROOT . '/storage/twig/cache/',
        ]);
        $twig->addExtension(new \Twig_Extension_Debug());
        return $twig;
    }
}