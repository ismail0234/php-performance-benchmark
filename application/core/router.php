<?php 

Class MainRouter extends MainController
{

	/**
	 *
	 * Controller Name
	 *
	 * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
	 * @var string 
	 *
	 */
	private $controllerName = 'IndexController';

	/**
	 *
	 * Action Name
	 *
	 * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
	 * @var string 
	 *
	 */
	private $actionName = 'indexAction';
	/**
	 *
	 * View Name
	 *
	 * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
	 * @var string 
	 *
	 */
	private $viewName = 'index';

	/**
	 *
	 * Initalize MainController
	 *
	 * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
	 *
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 *
	 * Initialize MainRouter
	 *
	 * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
	 *
	 */
	public function main()
	{
		$this->getRouterParse($this->input->server("REQUEST_URI"));
		$this->loadController($this->controllerName, 'controller');
		call_user_func_array(array($this->controller, $this->actionName), array());
	}

	/**
	 *
	 * Get controller name and action name
	 *
	 * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
	 * @param string $requestUri
	 * @return array 
	 *
	 */
	public function getRouterParse($requestUri)
	{

		$requestUri = urldecode($requestUri);
		if (($questionPosition = strpos($requestUri, '?')) !== false) {
			$requestUri = substr($requestUri, 0, $questionPosition);
		}

		$counter     = 0;
		$newPageList = array();
		$pageList    = explode('/', $requestUri);
		$maxList     = count($pageList);
		unset($pageList[0]);

		if(empty($pageList[$maxList])){
			unset($pageList[$maxList]);
		}

		$minStart = count(explode( '/' , $this->input->server("SCRIPT_NAME"))) - 1;
		for ($i = 1; $i < $maxList; $i++)
		{ 
			$pageList[$i] = trim(preg_replace("/[^a-zA-Z0-9-]+/", "", $pageList[$i]));
			if(!empty($pageList[$i]) && $i >= $minStart){
				$newPageList[$counter++] = $pageList[$i];
			}
		}

		if (isset($newPageList[0])) {
			$this->controllerName = $newPageList[0] . 'Controller';
		}

		if (isset($newPageList[1])) {
			$this->actionName = $newPageList[1] . 'Action';
			$this->viewName   = $newPageList[1];
		}

		return array('controller' => $this->controllerName, 'action' => $this->actionName . 'Action');
	}


}

$router = new MainRouter();
$router->main();