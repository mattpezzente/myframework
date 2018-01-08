<?

include 'bin/app.php';

class Router {
  public function __construct($urlPathParts, $config) {
    $this->App = new App($config);

    switch($urlPathParts[0]) {
      case 'home':
        $this->App->startApp($urlPathParts);
        break;
      case 'api':
        $this->App->startApp($urlPathParts);
        break;
      case 'helloworld':
        $this->App->startApp(array('navigation','buildNav',1));
        break;
      default:
        $this->App->startApp(array('navigation','buildNav',0));
        break;
    }
  }
}