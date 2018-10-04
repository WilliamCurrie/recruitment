<?php
set_time_limit(-1);
error_reporting(E_ERROR | E_USER_ERROR | E_PARSE | E_CORE_ERROR |E_COMPILE_ERROR | E_RECOVERABLE_ERROR);
ini_set("display_errors", 1);

use Zend\View\Renderer\PhpRenderer;
use Zend\View\Resolver;
use Zend\View\Model\ViewModel;

class recruitmentLoader
{

  protected $config = null;

  public function __construct()
  {
    $this->registerLoader();
    $this->setPhpRenderer();
  }

  public function registerLoader()
  {
    $fullPath = substr(__DIR__,0,strrpos(__DIR__, '/')+1);
    $this->fullPath = $fullPath;

    spl_autoload_register( function ($className)
    {
      $fullPath = substr(__DIR__,0,strrpos(__DIR__, '/')+1);

      $className = ltrim($className, '\\');
      $fileName  = 'lib/';
      $namespace = '';
      if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);

        $className = substr($className, $lastNsPos + 1);
        $namespace = explode("\\", $namespace);
        $fileName  .= str_replace('\\', DIRECTORY_SEPARATOR, $namespace[0].DIRECTORY_SEPARATOR);
      }
      $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
      require $fullPath.$fileName;
    });

    if (file_exists("{$fullPath}vendor/autoload.php")) {
      $loader = include "{$fullPath}vendor/autoload.php";
    }
  }

  public function setPhpRenderer()
  {
    $renderer = new PhpRenderer();

    $resolver = new Resolver\AggregateResolver();

    $renderer->setResolver($resolver);

    $map = new Resolver\TemplateMapResolver([
      'layout'      => __DIR__ . '/view/layout.phtml',
      'index/index' => __DIR__ . '/view/main/index/index.phtml',
    ]);
    $stack = new Resolver\TemplatePathStack([
      'script_paths' => [
        'view'
      ],
    ]);

// Attach resolvers to the aggregate:
    $resolver
      ->attach($map)    // this will be consulted first, and is the fastest lookup
      ->attach($stack)  // filesystem-based lookup
      ->attach(new Resolver\RelativeFallbackResolver($map)) // allow short template names
      ->attach(new Resolver\RelativeFallbackResolver($stack));

    $model    = new ViewModel();
    $model->setVariable('foo', 'bar');
// or
    $model = new ViewModel(['foo' => 'bar']);

    $model->setTemplate('index/index');
    $renderer->render($model);
  }

}