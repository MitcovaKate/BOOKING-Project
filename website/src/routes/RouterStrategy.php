<?

namespace Student\Booking\routes;

interface RouterStrategy {
    public function match(string $url):bool;
    public function execute();
}
