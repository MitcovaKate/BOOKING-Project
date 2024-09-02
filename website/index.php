<? 
require_once './src/bootstrap.php';



// $tours=[
//     ['title'=>'Expensive Tour','price'=>'100Euro'],
//     ['title'=>'Cheap Tour','price'=>'10Euro'],
//     ['title'=>'Optimal Tour','price'=>'50Euro']
// ];


$page=$_GET['page'] ?? 'home';

if($page==='home'){

  $tours=getALLTours();
  $title='Our Fall Tours';
  renderHome($title,$tours);

} else if ($page==='reviews'){

    $reviews=getALLReviews();
    $title='What people think';
    renderReviews($title,$reviews);
} else{
    render404();
}

