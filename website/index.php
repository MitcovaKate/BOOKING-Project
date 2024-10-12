<? 
require_once './src/bootstrap.php';
require_once './vendor/autoload.php';


// $tours=[
//     ['title'=>'Expensive Tour','price'=>'100Euro'],
//     ['title'=>'Cheap Tour','price'=>'10Euro'],
//     ['title'=>'Optimal Tour','price'=>'50Euro']
// ];


// $page=$_GET['page'] ?? 'home';

// if($page==='home'){

//   $tours=Tour::getAll();
//   $title='Our Fall Tours';
//   renderPage($title,'home',$tours);

// } else if ($page==='reviews'){

//     $reviews=getAllData('reviews');
//     $title='What people think';
//     renderPage($title,'reviews',$reviews);
// } else if($page==='test'){
//   $tour = new Tour(100, 'Super Tour from ORM', new Money( 10, 'MDL'));
//   $tour->save();
// }

// else{
//     renderPage('Page not found','404');
// }

use Student\Booking\models\Tour;
use Student\Booking\models\Money;
use Student\Booking\models\Client;
use Student\Booking\models\Order;
$page =$GET['page'] ?? 'home';
$tours= Tour::getAll();
$price=new Money(1,1000,'MDL');
$price->save();
$client=new Client(fullName:'Jon', contactEmail:'', contactPhone:'123234', id:10);
$client->save();
$cost=new Money(amount:10000,currency:'EUR');
$order=new Order(client:$client,cost:$cost,id:10);
$order->save();