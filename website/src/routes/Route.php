<?

namespace Student\Booking\routes;
use Student\Booking\routes\RouterStrategy;

class Route implements RouterStrategy {
    private string $path;
    public function __construct(string $path)
    {
       $this->path=$path; 
    } 
    public function match(string $url):bool{
        return false;
    }
    public function execute(){

    }
}
