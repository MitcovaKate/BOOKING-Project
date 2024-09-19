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
} else if($page==='test'){
  $tour =new Tour(100,'Super Tour from ORM',1000);
  $tour->save();
}

else{
    renderPage('Page not found','404');
}

