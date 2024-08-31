<?
function renderHome($title,$tours){
  global $twig; 
$template = $twig->load('home.html.twig');

echo $template->render(['title' => $title,
                        'tours'=>$tours]); 
}