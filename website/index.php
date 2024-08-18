<? 
require_once './vendor/autoload.php';
#twig config
$loader = new \Twig\Loader\FilesystemLoader('./templates');
$twig = new \Twig\Environment($loader, [
// 'cache' => '/path/to/compilation_cache',
]);
$title='Booking Agency';
$tours=[
    ['title'=>'Expensive Tour','price'=>'100Euro'],
    ['title'=>'Cheap Tour','price'=>'10Euro'],
    ['title'=>'Optimal Tour','price'=>'50Euro']
];
    
$template = $twig->load('home.twig.html');
echo $template->render(['title' => $title,
                        'tours'=>$tours]);