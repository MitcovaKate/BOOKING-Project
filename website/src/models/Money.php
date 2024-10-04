
<?
namespace Student\Booking\models;
class Money extends Model {
    private int $id;
    private int $amount ;
    private string $currency;

    public function __construct(int $id=0, int $amount, string $currency) {
        $this->id=$id;
        $this->setvalue ($amount);
        $this->setCurrency($currency); 

    }

    public function setvalue (int $amount): void {
        $this->amount  = min(max($amount, PHP_INT_MIN), PHP_INT_MAX);
    }

    public function getvalue (): int {
        return $this->amount ;
    }

    public function setCurrency(string $currency): void {
        $allowedCurrencies = ['EUR', 'MDL', 'USD'];
        if (empty($currency) || !in_array($currency, $allowedCurrencies)) {
            throw new \InvalidArgumentException('Invalid currency. Allowed currencies are: ' . implode(', ', $allowedCurrencies));
        }
        $this->currency = $currency;
    }

    public function getCurrency(): string {
        return $this->currency;
    }

    public function save() :void{
        $sql = 'INSERT INTO money VALUES(?,?,?)';
        $stmt = static::$pdo->prepare($sql);
        $stmt->execute([$this->id, $this->amount, $this->currency]); 
    }
    public static function getOneMoney(int $id): ?Money {
        $stmt=static::$pdo->prepare('SELECT * FROM money WHERE id =?');
        $stmt->execute([$id]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\Student\Booking\models\Money');
        $money=$stmt->fetch();
       
        return $money;
    }
    }
