<? 
require_once './src/bootstrap.php';



// $tours=[
//     ['title'=>'Expensive Tour','price'=>'100Euro'],
//     ['title'=>'Cheap Tour','price'=>'10Euro'],
//     ['title'=>'Optimal Tour','price'=>'50Euro']
// ];


$page=$_GET['page'] ?? 'home';

if($page==='home'){

  $tours=getAllData('tours');
  $title='Our Fall Tours';
  renderPage($title,'home',$tours);

} else if ($page==='reviews'){

    $reviews=getAllData('reviews');
    $title='What people think';
    renderPage($title,'reviews',$reviews);
} else{
    renderPage('Page not found','404');
}

