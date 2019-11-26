<?php 

Class Utility
{

	/**
	 *
	 * Redirect url
	 *
	 * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
	 * @param string $url
	 *
	 */
	public function redirect($uri)
	{
		header('Location: ' . $uri);
		exit;
	}

	/**
	 *
	 * Output json data
	 *
	 * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
	 * @param array $data
	 *
	 */
	public function outputJson($data)
	{

		header("Content-type: application/json; charset=utf-8");
		echo json_encode($data);
		exit;
	}

	/**
	 *
	 * Get Website Link
	 *
	 * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
	 * @return string 
	 *
	 */
	public function getLink()
	{

		$http = 'https';
		if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on') {
			$http = 'http';
		}

		return sprintf('%s://%s%s', $http, $_SERVER['HTTP_HOST'], str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
	}

	/**
	 *
	 * PHP Version
	 *
	 * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
	 * @return string 
	 *
	 */
	public function phpVersion()
	{
		return PHP_VERSION;
	}

	/**
	 *
	 * Browser Language
	 *
	 * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
	 * @return string 
	 *
	 */
	public function browserLanguage()
	{

		$language = explode(';', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
		$language = explode(',', $language[0]);
		$language = explode('-', $language[0]);
		return $language[0];
	}

	/**
	 *
	 * Get Language
	 *
	 * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
	 * @return string 
	 *
	 */
	public function getLanguage()
	{
		if (isset($_COOKIE['lang'])) {
			return $_COOKIE['lang'];
		}
		
		return $this->browserLanguage();
	}


}