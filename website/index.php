<? 
require_once './src/bootstrap.php';
require_once './src/model.php';
require_once './src/view.php';


// $tours=[
//     ['title'=>'Expensive Tour','price'=>'100Euro'],
//     ['title'=>'Cheap Tour','price'=>'10Euro'],
//     ['title'=>'Optimal Tour','price'=>'50Euro']
// ];
$tours=getALLTours();
$title='Our Fall Tours';
renderHome($title,$tours);

