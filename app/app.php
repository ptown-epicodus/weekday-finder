<?php
date_default_timezone_set('America/Los_Angeles');

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/WeekdayFinder.php';

$app = new Silex\Application();
$app->register(new Silex\Provider\TwigServiceProvider(), [ 'twig.path' => __DIR__ . '/../views/']);

$app->get('/', function() use ($app) {
    return $app['twig']->render('home.html.twig');
});

$app->post('/compute', function() use ($app) {
    $date = explode('-', $_POST['date']);
    $calculator = new WeekdayFinder;
    $result = $calculator->weekday(intval($date[0]), intval($date[1]), intval($date[2]));

    return $app['twig']->render('result.html.twig', [ 'result' => $result ]);
});

return $app;
?>
