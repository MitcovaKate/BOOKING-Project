<?
namespace Student\Booking\models;
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

//     // Connect to the database (assuming MySQL PDO)
//     // ... (replace with your database connection code if necessary)

//     // Prepare and execute the query
    $stmt = $pdo->query("SELECT * FROM $table");

//     // Fetch all rows as an associative array
    $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);

     return $data;
}





class Tour extends Model{
    public int $id;
    public string $title;
    public  Money $price; 

    public function __construct(int $id=0, string $title='', Money $price=0) {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
    }

    public function save() {
        $sql = 'INSERT INTO tours VALUES(?,?,?)';
        $stmt = static::$pdo->prepare($sql);
        $stmt->execute([$this->id, $this->title, $this->price->getvalue()]); 
    }

    // HW 4
    public function delete() {
        $sql = 'DELETE FROM tours WHERE id = ?';
        $stmt = static::$pdo->prepare($sql);
        $stmt->execute([$this->id]);
    }
    public static function getAll(){
       $stmt=static::$pdo->query('SELECT * FROM tours');
       $tours_result=$stmt->fetchAll(\PDO::FETCH_ASSOC);
       $tours=[];

       //loop
       //manual hydration
       foreach($tours_result as $tour_data){
        $tours[]=new Tour($tour_data['id'],$tour_data['title'],$tour_data['price']);
       }
       return $tours;
    }

    public static function getOne(int $id){
        $stmt=static::$pdo->prepare('SELECT * FROM product WHERE id =?');
        $stmt->execute([$id]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\Student\Booking\models\Tour');
        $tour=$stmt->fetch();
       
        return $tour;
    }
} 


$tours=Tour::getAll();
