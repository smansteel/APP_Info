class Route
{
public static $validRoutes = array();

public static function setRoute($route, $function)
{
self::$validRoutes[] = $route;

if (isset($_GET['url'])) {
if ($_GET['url'] == $route) {
$function->__invoke();
}
}
}
}


public static function CreateView($viewName)
{
Navbar::CreateView("navbar");
require_once("./Views/$viewName/index.php");
}

Route::setRoute(
'index.php',
function () {
Home::CreateView('Home');
}
);