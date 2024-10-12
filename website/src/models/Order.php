<?
namespace Student\Booking\models;

enum OrderStates:string{
    case draft='';
    case booked='';
    case completed='';
    case canseled='';
    public function toString(): string{
return $this->value;
    }
};

class Order extends Model{

    public int $id;
    public OrderStates $state;
    public Money $cost;
    public Client $client;
    

    public function __construct(Client $client=null, Money $cost=null ,int $id=0){
        $this->id=$id;
        $this->client=$client;
        $this->cost=$cost;
        $this->state=OrderStates::draft;
    }
    public function save():void {
        $this->cost->save();
        $this->client->save();
        $sql = 'INSERT INTO orders VALUES(?,?,?,?)';
        $stmt = static::$pdo->prepare(query:$sql);
        $stmt->execute(params:[$this->id,$this->state->toString(), $this->cost->id, $this->client->id]); 
    }
}