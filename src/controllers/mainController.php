<?php
//If from PHPUnit
if(!$root){
  if ($_SERVER['DOCUMENT_ROOT']) {
      $root = realpath($_SERVER['DOCUMENT_ROOT']);
  } else {
      $root = './src';
  }
}

/*
* After route found send to control to connect to model and render page..
*/
//Include all models
require_once($root.'/models/parentModel.php');
//Include Controllers
require_once($root.'/controllers/customersController.php');
class controller{
  public $pageTitle;
  public $extendHeader;
  public function replacePageVars($vars = array(), $viewFile)
  {
    $fileHTML = file_get_contents('views/'.$viewFile.'.view.php');
    foreach($vars as $pageVariable)
    {
      $fileHTML = str_replace('{{'.$pageVariable['var'].'}}',$pageVariable['data'], $fileHTML);
    }
    //remove any further vars in template
    $fileHTML = preg_replace('/{{(.*)}}/', '', $fileHTML);
    return $fileHTML;
  }
  public function renderPage($vars = array(), $viewFile = '')
  {
    $pageVars = array();
    $pageVars[] = array('var' => 'pageTitle', 'data' => $this->pageTitle);
    $pageVars[] = array('var' => 'extendHeader', 'data' => '');
    $headerHTML = $this->replacePageVars($pageVars, 'header');
    $pageHTML = '';
    if($viewFile != ''){
      $pageHTML = $this->replacePageVars($vars, $viewFile);
    }
    //Page Content
    $footerHMTL = $this->replacePageVars(array(), 'footer');

    echo $headerHTML;
    echo $pageHTML;
    echo $footerHMTL;
  }
  public function home()
  {
    //Setup page data and display
    $this->renderPage(array(), 'home');
    //Test with forced view
  }
  public function notFound404()
  {
    $this->pageTitle = 'Page Not Found (404)';
    $this->renderPage(array(), '404');
  }
}
