<? 
require_once './vendor/autoload.php';
#twig config
$loader = new \Twig\Loader\FilesystemLoader('./templates');
$twig = new \Twig\Environment($loader, [
// 'cache' => '/path/to/compilation_cache',
]);
$title='Booking Agency';
// $tours=[
//     ['title'=>'Expensive Tour','price'=>'100Euro'],
//     ['title'=>'Cheap Tour','price'=>'10Euro'],
//     ['title'=>'Optimal Tour','price'=>'50Euro']
// ];
$pdo=new PDO("mysql:host=booking_mariadb;dbname=booking;port:3306","booking","booking");

$stmt =$pdo->query('SELECT * FROM tours');
$tours=[];
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    $tours[]=$row;
}
$template = $twig->load('home.html.twig');

echo $template->render(['title' => $title,
                        'tours'=>$tours]);