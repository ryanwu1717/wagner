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


class ViewMiddleware
{
	private $conn;
	function __construct($db){
		$this->conn = $db;
	}
    public function __invoke($request, $response, $next)
    {
    	if(isset($_SESSION['id'])){
    		$user = new User($this->conn);
	    	$name = $user->getName();
    		$viewParam = array();
	    	if(count($name)==1){
	    		// var_dump($name[0]['name']);
	    		$viewParam['name'] = $name[0]['name'];
	    	}
    		$request = $request->withAttribute('viewParam', $viewParam);
        	$response = $next($request, $response);
    	}
    	else{
			return $response->withRedirect('/login', 301);
    	}
        return $response;
    }
}


$app->group('', function () use ($app) {
	$app->group('', function () use ($app) {
		$app->get('/', function (Request $request, Response $response, array $args) {
			return $response->withRedirect('/home', 301);
		});
		$app->get('/home', function (Request $request, Response $response, array $args) {
			$viewParam = $request->getAttribute('viewParam');
			return $this->view->render($response, '/index.php',$viewParam);
		});
		$app->get('/function', function (Request $request, Response $response, array $args) {
			$viewParam = $request->getAttribute('viewParam');
			return $this->view->render($response, '/function.php',$viewParam);
		});
		$app->get('/handMade', function (Request $request, Response $response, array $args) {
			$viewParam = $request->getAttribute('viewParam');
			return $this->view->render($response, '/handMade.php',$viewParam);
		});
		$app->get('/autoMade', function (Request $request, Response $response, array $args) {
			$viewParam = $request->getAttribute('viewParam');
			return $this->view->render($response, '/autoMade.php',$viewParam);
		});
		$app->get('/testPaperManage', function (Request $request, Response $response, array $args) {
			$viewParam = $request->getAttribute('viewParam');
			return $this->view->render($response, '/testPaperManage.php',$viewParam);
		});
		$app->get('/makeTest', function (Request $request, Response $response, array $args) {
			$viewParam = $request->getAttribute('viewParam');
			return $this->view->render($response, '/makeTest.php',$viewParam);
		});
		$app->get('/upload', function (Request $request, Response $response, array $args) {
			$viewParam = $request->getAttribute('viewParam');
			return $this->view->render($response, '/upload.php',$viewParam);
		});
		$app->get('/table', function (Request $request, Response $response, array $args) {
			$viewParam = $request->getAttribute('viewParam');
			return $this->view->render($response, '/table.php',$viewParam);
		});
		$app->get('/userGuide', function (Request $request, Response $response, array $args) {
			$viewParam = $request->getAttribute('viewParam');
			return $this->view->render($response, '/userGuide.php',$viewParam);
		});
		$app->get('/limit', function (Request $request, Response $response, array $args) {
			$viewParam = $request->getAttribute('viewParam');
			return $this->view->render($response, '/limit.php',$viewParam);
		});
	})->add('ViewMiddleware');
	$app->get('/login', function (Request $request, Response $response, array $args) {
		session_destroy();
		session_start();
		return $this->view->render($response, '/login.php', []);
	});
	$app->get('/register', function (Request $request, Response $response, array $args) {
		
		return $this->view->render($response, '/register.php', []);
	});
	$app->get('/verification', function (Request $request, Response $response, array $args) {
		
		return $this->view->render($response, '/verification.php', []);
	});
});

$app->group('/user', function () use ($app) {
	$app->get('/id/{type}', function (Request $request, Response $response, array $args) {
	    $user = new User($this->db);
	    $result = $user->getID($args['type']);
	    $response = $response->withHeader('Content-type', 'application/json' );
		$response = $response->withJson($result);
		// echo $response;
	    return $response;
	});

	$app->get('/name', function (Request $request, Response $response, array $args) {
	    $user = new User($this->db);
	    $result = $user->getName();
	    $response = $response->withHeader('Content-type', 'application/json' );
		$response = $response->withJson($result);
		// echo $response;
	    return $response;
	});
	$app->delete('/{id}', function (Request $request, Response $response, array $args) {
	    $user = new User($this->db);
	    $result = $user->deleteUser($args['id']);
	    $response = $response->withHeader('Content-type', 'application/json' );
		$response = $response->withJson($result);
		// echo $response;
	    return $response;
	});

	$app->post('/login', function (Request $request, Response $response, array $args) {
	    $user = new User($this->db);
	    $result = $user->login();
	    $response = $response->withHeader('Content-type', 'application/json' );
		$response = $response->withJson($result);
		// echo $response;
	    return $response;
	});
	$app->patch('/changePassword', function (Request $request, Response $response, array $args) {
	    $user = new User($this->db);
	    $result = $user->changePassword();
	    $response = $response->withHeader('Content-type', 'application/json' );
		$response = $response->withJson($result);
		// echo $response;
	    return $response;
	});
	$app->patch('/logout', function (Request $request, Response $response, array $args) {
	    return $response;
	});

	$app->get('/function', function (Request $request, Response $response, array $args) {
	    $user = new User($this->db);
	    $result = $user->getFunction();
	    $response = $response->withHeader('Content-type', 'application/json' );
		$response = $response->withJson($result);
		// echo $response;
	    return $response;
	});

	$app->get('/getTable', function (Request $request, Response $response, array $args) {
	    $user = new User($this->db);
	    $result = $user->getInfo();
	    $response = $response->withHeader('Content-type', 'application/json' );
		$response = $response->withJson($result);
		// echo $response;
	    return $response;
	});
	$app->get('/profile/{id}', function (Request $request, Response $response, array $args) {
	    $user = new User($this->db);
	    $result = $user->getProfile($args['id']);
	    $response = $response->withHeader('Content-type', 'application/json' );
		$response = $response->withJson($result);
		// echo $response;
	    return $response;
	});
	$app->get('/info/{id}', function (Request $request, Response $response, array $args) {
	    $user = new User($this->db);
	    $result = $user->getInfo($args['id']);
	    $response = $response->withHeader('Content-type', 'application/json' );
		$response = $response->withJson($result);
		// echo $response;
	    return $response;
	});
	$app->group('/verificationPic', function () use ($app) {
		$app->get('', function (Request $request, Response $response, array $args) {
		    $user = new User($this->db);
		    $result = $user->getVerificationPic();
		    
			 $file = __DIR__  . "/aaa.png";
		    if (!file_exists($file)) {
		        die("file:$file");
		    }
		    $image = file_get_contents($file);
		    if ($image === false) {
		        die("error getting image");
		    }
		    $response->write($image);
		    return $response->withHeader('Content-Type', 'image/png');
		});
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
		$app->patch('', function (Request $request, Response $response, array $args) {
		    $user = new User($this->db);
		    $result = $user->modify();
		    $response = $response->withHeader('Content-type', 'application/json' );
			$response = $response->withJson($result);
			// echo $response;
		    return $response;
		});
		$app->post('/check', function (Request $request, Response $response, array $args) {
		    $user = new User($this->db);
		    $result = $user->testcheckRegister();
		    $response = $response->withHeader('Content-type', 'application/json' );
			$response = $response->withJson($result);
			// echo $response;
		    return $response;
		});
	});
});
$app->group('/file', function () use ($app) {
	$app->post('/question', function (Request $request, Response $response, array $args) {
		$file = new File($this->db);
		$result = $file->uploadQuestion($this->upload_directory,$request->getUploadedFiles());
	    $response = $response->withHeader('Content-type', 'application/json' );
		$response = $response->withJson($result);
	    return $response;
	});
});

$app->group('/permission', function () use ($app) {
	$app->get('', function (Request $request, Response $response, array $args) {
	    $permission = new Permission($this->db);
	    $result = $permission->getPermission($args['type']);
	    $response = $response->withHeader('Content-type', 'application/json' );
		$response = $response->withJson($result);
		// echo $response;
	    return $response;
	});
});

$app->group('/test', function () use ($app) {
	$app->post('', function (Request $request, Response $response, array $args) {
	    $test = new Test($this->db);
	    $result = $test->addTest();
	    $response = $response->withHeader('Content-type', 'application/json' );
		$response = $response->withJson($result);
		// echo $response;
	    return $response;
	});
	$app->get('/unit/{chapterID}', function (Request $request, Response $response, array $args) {
	    $test = new Test($this->db);
	    $result = $test->getUnit($args['chapterID']);
	    $response = $response->withHeader('Content-type', 'application/json' );
		$response = $response->withJson($result);
		// echo $response;
	    return $response;
	});
	$app->patch('/selectunit', function (Request $request, Response $response, array $args) {
	    $test = new Test($this->db);
	    $result = $test->getselectUnit();
	    $response = $response->withHeader('Content-type', 'application/json' );
		$response = $response->withJson($result);
		// echo $response;
	    return $response;
	});
	$app->get('/chapter/{bookID}', function (Request $request, Response $response, array $args) {
	    $test = new Test($this->db);
	    $result = $test->getChapter($args['bookID']);
	    $response = $response->withHeader('Content-type', 'application/json' );
		$response = $response->withJson($result);
		// echo $response;
	    return $response;
	});
	$app->get('/book', function (Request $request, Response $response, array $args) {
	    $test = new Test($this->db);
	    $result = $test->getBook();
	    $response = $response->withHeader('Content-type', 'application/json' );
		$response = $response->withJson($result);
		// echo $response;
	    return $response;
	});
	$app->post('/checkSecondPage', function (Request $request, Response $response, array $args) {
	    $test = new Test($this->db);
	    $result = $test->checkSecondPage();
	    $response = $response->withHeader('Content-type', 'application/json' );
		$response = $response->withJson($result);
		// echo $response;
	    return $response;
	});
	$app->post('/checkQuestion', function (Request $request, Response $response, array $args) {
	    $test = new Test($this->db);
	    $result = $test->checkQuestion();
	    $response = $response->withHeader('Content-type', 'application/json' );
		$response = $response->withJson($result);
		// echo $response;
	    return $response;
	});
});
$app->group('/question', function () use ($app) {
	$app->get('/{unitID}/{source}', function (Request $request, Response $response, array $args) {
	    $question = new Question($this->db);
	    $result = $question->getQuestion($args['unitID'],$args['source']);
	    $response = $response->withHeader('Content-type', 'application/json' );
		$response = $response->withJson($result);
		// echo $response;
	    return $response;
	});
});
$app->group('/file', function () use ($app) {
	$app->get('/excel', function (Request $request, Response $response, array $args) {
		// require_once('../../Library/PHPExcel-1.8/Classes/PHPExcel/IOFactory.php');

	    $file = new File($this->db);
	    $result = $file->excel_read();
	    $response = $response->withHeader('Content-type', 'application/json' );
		$response = $response->withJson($result);
		// echo $response;
	    return $response;
	});
	$app->get('/example', function (Request $request, Response $response, array $args) {
		$file = './../file/example.xlsx';

		if (file_exists($file)) {
		    header('Content-Description: File Transfer');
		    header('Content-Type: application/octet-stream');
		    header('Content-Disposition: attachment;filename="'.basename($file).'"');
		    header('Expires: 0');
		    header('Cache-Control: must-revalidate');
		    header('Pragma: public');
		    header('Content-Length: ' . filesize($file));
		    readfile($file);
		    exit;
		}
	});
});
$app->run();
?>