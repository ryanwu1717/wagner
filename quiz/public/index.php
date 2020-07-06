<?php
session_start();
require __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../model/user.php';
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
// use Slim\Factory\AppFactory;
use Slim\Views\PhpRenderer;
$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];

$c = new \Slim\Container($configuration);
$app = new \Slim\App($c);

$container = $app->getContainer();


$container['view'] = function ($container) {
    return new PhpRenderer(__DIR__.'/../view');
};

$container['db'] = function ($container) {
	$dbhost = '127.0.0.1';
	// $dbport = '3306';
	$dbuser = 'root';
	$dbpasswd = '970314970314';
	$dbname = 'etest';
	$dsn = "mysql:host=".$dbhost.";dbname=".$dbname;
	try
	{

	    $conn = new \PDO($dsn,$dbuser,$dbpasswd);
	    $conn->exec("SET CHARACTER SET utf8");
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    //echo "Connected Successfully";
	}
	catch(PDOException $e)
	{
	    echo "Connection failed: ".$e->getMessage();
	}
	return $conn;
};

$container['notFoundHandler'] = function ($container) {
    return function ($request, $response) use ($container) {
        return $response->withStatus(404)
            ->withHeader('Content-Type', 'text/html')
            ->write('Page not found');
    };
};

$container['ViewMiddleware'] = function($container) {
    return new ViewMiddleware($container->db);
};
$container['upload_directory'] = __DIR__ . '/../uploads';


// class ViewMiddleware
// {
// 	private $conn;
// 	function __construct($db){
// 		$this->conn = $db;
// 	}
//     public function __invoke($request, $response, $next)
//     {
//     	if(isset($_SESSION['id'])){
//     		$user = new User($this->conn);
// 	    	$name = $user->getName();
//     		$viewParam = array();
// 	    	if(count($name)==1){
// 	    		$viewParam['name'] = $name[0]['staff_name'];
// 	    	}
//     		$request = $request->withAttribute('viewParam', $viewParam);
//         	$response = $next($request, $response);
//     	}
//     	else{
// 			return $response->withRedirect('/login', 301);
//     	}
//         return $response;
//     }
// }


$app->group('', function () use ($app) {
	$app->group('', function () use ($app) {
		$app->get('/', function (Request $request, Response $response, array $args) {
			return $response->withRedirect('/home', 301);
		});
		$app->get('/home', function (Request $request, Response $response, array $args) {
			// $viewParam = $request->getAttribute('viewParam');
			return $this->view->render($response, '/function.php',[]);
		});
		$app->get('/function', function (Request $request, Response $response, array $args) {
			// $viewParam = $request->getAttribute('viewParam');
			return $this->view->render($response, '/function.php',[]);
		});
		$app->get('/handMade', function (Request $request, Response $response, array $args) {
			// $viewParam = $request->getAttribute('viewParam');
			return $this->view->render($response, '/handMade.php',[]);
		});
		$app->get('/autoMade', function (Request $request, Response $response, array $args) {
			// $viewParam = $request->getAttribute('viewParam');
			return $this->view->render($response, '/autoMade.php',[]);
		});
		$app->get('/testPaperManage', function (Request $request, Response $response, array $args) {
			// $viewParam = $request->getAttribute('viewParam');
			return $this->view->render($response, '/testPaperManage.php',[]);
		});
		$app->get('/makeTest', function (Request $request, Response $response, array $args) {
			// $viewParam = $request->getAttribute('viewParam');
			return $this->view->render($response, '/makeTest.php',[]);
		});
		$app->get('/upload', function (Request $request, Response $response, array $args) {
			// $viewParam = $request->getAttribute('viewParam');
			return $this->view->render($response, '/upload.php',[]);
		});
	});
	$app->get('/login', function (Request $request, Response $response, array $args) {
		session_destroy();
		session_start();
		return $this->view->render($response, '/login.php', []);
	});
	$app->get('/register', function (Request $request, Response $response, array $args) {
		
		return $this->view->render($response, '/register.php', []);
	});
});
$app->group('/user', function () use ($app) {
	$app->post('/login', function (Request $request, Response $response, array $args) {
	    $user = new User($this->db);
	    $result = $user->login();
	    $response = $response->withHeader('Content-type', 'application/json' );
		$response = $response->withJson($result);
		// echo $response;
	    return $response;
	});
	$app->group('/register', function () use ($app) {
		$app->post('', function (Request $request, Response $response, array $args) {
		    $user = new User($this->db);
		    $result = $user->register();
		    $response = $response->withHeader('Content-type', 'application/json' );
			$response = $response->withJson($result);
			// echo $response;
		    return $response;
		});
		$app->post('/check', function (Request $request, Response $response, array $args) {
		    $staff = new Staff($this->db);
		    $result = $staff->testcheckRegister();
		    $response = $response->withHeader('Content-type', 'application/json' );
			$response = $response->withJson($result);
			// echo $response;
		    return $response;
		});
	});
});
$app->run();
?>