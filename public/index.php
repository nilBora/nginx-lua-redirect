<?php
require "./../vendor/autoload.php";

require "local.php";

$db = new PDO(
    $CONFIG['db']['dsn'],
    $CONFIG['db']['user'],
    $CONFIG['db']['password']
);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$db->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);


$res = $db->query('SET NAMES utf8');

$dataAccessObject = \Jtrw\DAO\DataAccessObject::factory($db);
$rep = new \Jtrw\Redirect\Domain\Repository\RedirectRepository($dataAccessObject);

$rep->get('x1');
//Redirect logic
echo $_SERVER['REQUEST_URI'];
echo "PONG";