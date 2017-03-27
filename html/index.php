<?php
declare(strict_types = 1);

require_once '../vendor/autoload.php';

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

$container = new ContainerBuilder();
$loader = new YamlFileLoader($container, new FileLocator(__DIR__ . DIRECTORY_SEPARATOR . '..'));
$loader->load('services.yml');


$logger = $container->get('log');

$logger->debug('Initialized dependency injection');

header('Content-type: text/plain');

$logger->debug('Sent Headers');

echo "Hello World!\n\n";

echo 'APP_LOG=' . (getenv('APP_LOG') ?? '__NULL__') . "\n";
echo 'LOG_LEVEL=' . (getenv('LOG_LEVEL') ?? '__NULL__') . "\n";

$logger->debug('Sent body');

$logger->info('Complete');
