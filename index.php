<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', true);

require_once('vendor/autoload.php');
require_once('UKM/sql.class.php');


$app = new Silex\Application(); 
$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/twig',
));


$url = new StdClass;
$url->base 		= 'http://'. $_SERVER['HTTP_HOST'].'/';
$url->create 	= $url->base.'/';
$url->send 		= $url->base.'send/';
$url->sent		= $url->base.'sendt/';
$url->print		= $url->base.'print/';

$TWIG = array('url' => $url);

$app->get('/', function() use($app, $TWIG) {
	return $app['twig']->render( 'frontpage.twig.html', $TWIG );
});

$app->get('/nasjonalt-fagseminar/', function() use($app, $TWIG) {
	return $app['twig']->render( 'fagseminar.twig.html', $TWIG );
});

$app->get('/demo2014/', function() use($app, $TWIG) {
return $app['twig']->render( 'demo2014.twig.html', $TWIG );
});

$app->get('/tronderjam/', function() use($app, $TWIG) {
return $app['twig']->render( 'tronderjam.twig.html', $TWIG );
});


$app->run();
