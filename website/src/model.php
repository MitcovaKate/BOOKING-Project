<?

// function getALLTours(){
//     global $pdo;
//     //conect to db / fetch data / only mysgl pdo
//     //$stmt - statement
// $stmt =$pdo->query('SELECT * FROM tours');
// $tours=$stmt->fetch(PDO::FETCH_ASSOC);
// return $tours;
// }

// function getALLReviews(){
//     global $pdo;
//     //conect to db / fetch data / only mysgl pdo
//     //$stmt - statement
// $stmt =$pdo->query('SELECT * FROM reviews');
// $reviews=$stmt->fetch(PDO::FETCH_ASSOC);
// return $reviews;
// }

//HW2
function getAllData($table) {
    global $pdo;

    // Connect to the database (assuming MySQL PDO)
    // ... (replace with your database connection code if necessary)

    // Prepare and execute the query
    $stmt = $pdo->query("SELECT * FROM $table");

    // Fetch all rows as an associative array
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $data;
}

// Usage:
