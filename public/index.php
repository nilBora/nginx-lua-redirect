<?php
require "./../vendor/autoload.php";

use Jtrw\DAO\DataAccessObject;
use Jtrw\Redirect\Domain\Service\Redirect;
use Jtrw\Redirect\Domain\Repository\RedirectRepository;
use Cache\Adapter\Redis\RedisCachePool;

$CONFIG['db']['dbname'] = '%dbname%';
$CONFIG['db']['host'] = 'localhost';
$CONFIG['db']['user'] = '%user%';
$CONFIG['db']['password'] = '%password';
$CONFIG['db']['dsn'] = "pgsql:dbname={$CONFIG['db']['dbname']};port=5432;host={$CONFIG['db']['host']}";

if (file_exists(__DIR__."/local.php")) {
    require_once __DIR__."/local.php";
}

$client = new \Redis();
$client->connect('redis_redirect', 6379);
$pool = new Cache\Adapter\Redis\RedisCachePool($client);


try {
    $service = new Redirect($pool, new RedirectRepository(
        DataAccessObject::factory(new PDO(
            $CONFIG['db']['dsn'],
            $CONFIG['db']['user'],
            $CONFIG['db']['password']
        ))
    ));
    $url = str_replace("/", "", $_SERVER['REQUEST_URI']);
    
    $service->doRedirect($url);
} catch (Exception $exp) {
    //..add to log
}