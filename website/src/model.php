<?

function getALLTours(){
    global $pdo;
    //conect to db / fetch data / only mysgl pdo

    //$stmt - statement
$stmt =$pdo->query('SELECT * FROM tours');
$tours=$stmt->fetch(PDO::FETCH_ASSOC);
return $tours;
}