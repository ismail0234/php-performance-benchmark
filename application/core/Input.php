<?php 

Class Input
{

	public function post($var, $xss = false)
	{
		return $this->check($var, $xss, $_POST);
	}

	public function get($var, $xss = false)
	{
		return $this->check($var, $xss, $_GET);
	}

	public function file($var, $xss = false)
	{
		return $this->check($var, $xss, $_FILES);
	}

	public function cookie($var, $xss = false)
	{
		return $this->check($var, $xss, $_COOKIE);
	}	

	public function server($var, $xss = false)
	{	
		return $this->check($var, $xss, $_SERVER);
	}	

	private function check($var, $xss, $data)
	{

	    if(!isset($data[$var])){
	    	return null;
	    }

	    return $this->trimData($data[$var], $xss);
	}

	private function trimData($data,$xss = false)
	{

	    if($data === null){
	   	    return "";
	    }

	    if (is_array($data)) {
	    	return array_map('Input::trimData', $data);
	    }

    	$data = trim($data);
    	if($xss){
    		$data = htmlspecialchars($data);
    	}

    	return $data;
	}

}