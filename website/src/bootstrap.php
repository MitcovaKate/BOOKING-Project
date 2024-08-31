<?
// initialisation of the main app parts
require_once './vendor/autoload.php';
#twig config
$loader = new \Twig\Loader\FilesystemLoader('./templates');
$twig = new \Twig\Environment($loader, [
// 'cache' => '/path/to/compilation_cache',
]);
// DB init + config
$pdo=new PDO("mysql:host=booking_mariadb;dbname=booking;port:3306","booking","booking");