<?php
require __DIR__ . '/vendor/autoload.php';

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$resource = fopen("php://stdout", "w");
$handler = new StreamHandler($resource, Level::Info);

$logger = new Logger('log');
$logger->setTimezone(new DateTimeZone('JST'));
$logger->pushHandler($handler);

$logger->debug("デバッグ", []);
$logger->info("インフォ", ["name" => "taro"]);
$logger->notice("💁‍♂️", [1, 2, 3]);
$logger->warning("🚨");
$logger->error("🏥");
