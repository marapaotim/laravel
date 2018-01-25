<?php
require_once('../smarty_template/libs/Smarty.class.php');
class Config{
	private $config;  
	private $smartyTemp;

	private $dbHost;
    private $dbUsername;
    private $dbPassword;
    private $dbName;

	function __construct()
 	{
		$this->config = array();  
		$this->smartyTemp = new Smarty();

		$this->dbHost = 'localhost';
		$this->dbUsername = 'root';
		$this->dbPassword = '';
		$this->dbName = 'guestbook';
 	}

 	public function dataConfig(){ 
		$this->smartyTemp->caching = 0;
		//$this->smartyTemp->force_compile = true; 
		$this->config['BASE_DIR'] = 'tpl';  
		$this->config['BASE_URL'] = 'tpl_c'; 
		$this->smartyTemp->template_dir = $this->config['BASE_DIR'];
		$this->smartyTemp->compile_dir  = $this->config['BASE_URL'];
		//$this->smartyTemp->setCacheDir("../".$this->config['BASE_URL']);  
		return $this->smartyTemp;
 	}

 	public function dBase(){
 		$conn = new PDO("mysql:host=".$this->dbHost.";dbname=".$this->dbName, $this->dbUsername, $this->dbPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
 	}
}