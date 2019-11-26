<?php 

Class MainController
{

	public function __construct()
	{	
		$this->loadCore('Input', 'input');
		$this->loadCore('Utility', 'utility');
		$this->loadLibrary('Smarty', 'view');

		$this->view->setTemplateDir(VIEW_PATH . 'smarty/');
		$this->view->setCompileDir(VIEW_PATH . 'smarty_c/');
		$this->view->setCacheDir(VIEW_PATH . 'smarty_cache/');
		$this->view->assign(array(
			'site' => array(
				'url'     => $this->utility->getLink(),
				'version' => SYSTEM_VERSION
			)
		));
	}

	/**
	 *
	 * Register Service Class
	 *
	 * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
	 * @param string $serviceGlobalName
	 * @param string $serviceName
	 *
	 */
	protected function registerService($serviceGlobalName, $serviceName)
	{
		if (!class_exists($serviceGlobalName)) {
			throw new Exception("Cannot Load Service Class!");
		}
		$this->$serviceName = new $serviceGlobalName();
	}

	/**
	 *
	 * Load Language
	 *
	 * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
	 * @param string $libraryName
	 * @param string $libraryAsName
	 *
	 */
	public function loadLanguage($libraryName)
	{
		$this->loadExtended($libraryName, null, 'language');
	}

	/**
	 *
	 * Load Controller
	 *
	 * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
	 * @param string $libraryName
	 * @param string $libraryAsName
	 *
	 */
	public function loadController($libraryName, $libraryAsName)
	{
		$this->loadExtended($libraryName, $libraryAsName, 'controller');
	}


	/**
	 *
	 * Load Core
	 *
	 * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
	 * @param string $libraryName
	 * @param string $libraryAsName
	 *
	 */
	public function loadCore($libraryName, $libraryAsName)
	{
		$this->loadExtended($libraryName, $libraryAsName, 'core');
	}

	/**
	 *
	 * Load Library
	 *
	 * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
	 * @param string $libraryName
	 * @param string $libraryAsName
	 *
	 */
	public function loadLibrary($libraryFolderName, $libraryAsName, $libraryFileName = null)
	{
		$this->loadExtended(array('folder' => $libraryFolderName, 'file' => $libraryFileName), $libraryAsName);
	}

	/**
	 *
	 * Load Special Extended Library
	 *
	 * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
	 * @param string $libraryName
	 * @param string $libraryAsName
	 * @param string $type
	 *
	 */
	public function loadExtended($libraryName, $libraryAsName, $type = 'lib')
	{

		$libraryFolderName = $libraryName;
		$libraryFileName   = $libraryName;

		if (is_array($libraryName)) {
			$libraryFolderName = $libraryName['folder'];
			$libraryFileName   = $libraryName['file'] == null ? $libraryName['folder'] : $libraryName['file'];
		}

		switch ($type) 
		{
			case 'controller':
				
				if (!file_exists(CONTROLLER_PATH . $libraryName . '.php')) {
					throw new Exception("Cannot Load Controller!");
				}

				include_once CONTROLLER_PATH . $libraryName . '.php';
				$this->registerService($libraryName, $libraryAsName);

			break;

			case 'lib':

				if (!file_exists(LIB_PATH . $libraryFolderName . '/' . $libraryFileName . '.php')) {
					throw new Exception("Cannot Load Library!");
				}

				include_once LIB_PATH . $libraryFolderName . '/' . $libraryFileName .'.php';
				$this->registerService($libraryFileName, $libraryAsName);

			break;

			case 'core':
				
				if (!file_exists(CORE_PATH . $libraryName . '.php')) {
					throw new Exception("Cannot Load Core File!");
				}

				require_once CORE_PATH . $libraryName . '.php';
				$this->registerService($libraryName, $libraryAsName);

			break;

			case 'language':
				
				$language = $this->utility->getLanguage();
				$language = 'en';
				if (!file_exists(LANG_PATH . $language . '/' . $libraryName . '.php')) {
					throw new Exception("Cannot Load Language File!");
				}

				$response = require_once LANG_PATH . $language . '/' . $libraryName . '.php';

				$newLangList = array();
				foreach ($response as $key => $value) {
					$newLangList['lang'][$libraryName][$key] = $value;
				}

				$this->view->assign($newLangList);
				$this->lang = (object)$newLangList['lang'];

			break;
		}		
	}

}
