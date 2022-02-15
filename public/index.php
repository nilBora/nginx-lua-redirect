<?php
require "./../vendor/autoload.php";
use Jtrw\DAO\DataAccessObject;

$CONFIG['db']['dbname'] = '%dbname%';
$CONFIG['db']['host'] = 'localhost';
$CONFIG['db']['user'] = '%user%';
$CONFIG['db']['password'] = '%password';
$CONFIG['db']['dsn'] = "pgsql:dbname={$CONFIG['db']['dbname']};port=5432;host={$CONFIG['db']['host']}";

if (file_exists(__DIR__."/local.php")) {
    require_once __DIR__."/local.php";
}

$dataAccessObject = DataAccessObject::factory(new PDO(
    $CONFIG['db']['dsn'],
    $CONFIG['db']['user'],
    $CONFIG['db']['password']
));
$rep = new \Jtrw\Redirect\Domain\Repository\RedirectRepository($dataAccessObject);

$rep->get('x1');
//Redirect logic
echo $_SERVER['REQUEST_URI'];
echo "PONG";