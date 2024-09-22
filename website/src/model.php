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

//     // Connect to the database (assuming MySQL PDO)
//     // ... (replace with your database connection code if necessary)

//     // Prepare and execute the query
    $stmt = $pdo->query("SELECT * FROM $table");

//     // Fetch all rows as an associative array
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

     return $data;
}


//  HW3 

class Money {
    private int $value ;
    private string $currency;

    public function __construct(int $value , string $currency) {
        $this->setvalue ($value );
        $this->setCurrency($currency); 

    }

    public function setvalue (int $value ): void {
        $this->value  = min(max($value , PHP_INT_MIN), PHP_INT_MAX);
    }

    public function getvalue (): int {
        return $this->value ;
    }

    public function setCurrency(string $currency): void {
        $allowedCurrencies = ['EUR', 'MDL', 'USD'];
        if (empty($currency) || !in_array($currency, $allowedCurrencies)) {
            throw new InvalidArgumentException('Invalid currency. Allowed currencies are: ' . implode(', ', $allowedCurrencies));
        }
        $this->currency = $currency;
    }

    public function getCurrency(): string {
        return $this->currency;
    }
}
// tour model

class Tour {
    public int $id;
    public string $title;
    public  Money $price; 

    public function __construct(int $id, string $title, Money $price) {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
    }

    public function save() {
        global $pdo;
        $sql = 'INSERT INTO tours VALUES(?,?,?)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$this->id, $this->title, $this->price->getvalue()]); 
    }

    // HW 4
    public function delete() {
        global $pdo;
        $sql = 'DELETE FROM tours WHERE id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$this->id]);
    }
    public static function getAll(){
       global $pdo;
       $stmt=$pdo->query('SELECT * FROM tours');
       $tours_result=$stmt->fetchAll(PDO::FETCH_ASSOC);
       $tours=[];

       //loop
       //manual hydration
       foreach($tours_result as $tour_data){
        $tours[]=new Tour($tour_data['id'],$tour_data['title'],$tour_data['price']);
       }
       return $tours;
    }
}


$tours=Tour::getAll();
