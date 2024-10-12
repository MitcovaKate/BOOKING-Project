<?
namespace Student\Booking\models;

class Client extends Model{

    public int $id;
    public string $fullName;
    public string $contactEmail;
    public string $contactPhone;

    public function __construct(string $fullName, string $contactEmail, string $contactPhone, int $id=0){
        $this->id=$id;
        $this->fullName=$fullName;
        $this->contactEmail=$contactEmail;
        $this->contactEmail=$contactPhone;
    }
    public function save() {
        $sql = 'INSERT INTO clients VALUES(?,?,?,?)';
        $stmt = static::$pdo->prepare(query:$sql);
        $stmt->execute(params:[$this->id, $this->fullName, $this->contactEmail, $this->contactPhone]); 
    }
}