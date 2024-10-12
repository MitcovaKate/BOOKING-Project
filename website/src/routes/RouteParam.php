<?

namespace Student\Booking\routes;
use Student\Booking\routes\RouterStrategy;

class RouteParam implements RouterStrategy {
    private string $path;
    private string $pattern;
    private array $param=[];
    public function __construct(string $path)
    {
       $this->path=$path; 
       $this->pattern='\^\\' . preg_replace(pattern:'/{.*}/', replacement:'([0-9\-a-b]+)', subject: $path) . '/';
      
    } 
    public function match(string $url):bool{
        return preg_match(pattern:$this->pattern, subject:$url);
    }
    public function execute(){

    }
}
