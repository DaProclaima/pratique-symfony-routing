<?php

use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Loader\AnnotationDirectoryLoader;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

require __DIR__. '/../vendor/autoload.php';

$classLoader =  require __DIR__ . '/../vendor/autoload.php';
\Doctrine\Common\Annotations\AnnotationRegistry::registerLoader([$classLoader, 'loadClass']);

$loader = new AnnotationDirectoryLoader(
    new FileLocator(__DIR__. '/../src/Controller'),
    new \App\Loader\CustomAnnotationClassLoader(new \Doctrine\Common\Annotations\AnnotationReader())
);
$collection = $loader->load(__DIR__ . '/../src/Controller');

$matcher = new UrlMatcher($collection, new RequestContext('', $_SERVER['REQUEST_METHOD']));
$generator = new UrlGenerator($collection, new RequestContext());
$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
