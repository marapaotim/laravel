<?php 
require_once('config.php'); 
if(isset($_REQUEST['type']) && !empty($_REQUEST['type'])){
	$type = $_REQUEST['type'];
	switch ($type) {
		case "insert_update": 
		if(!isset($_REQUEST["id"])){$_REQUEST["id"] = 0;}
			$arrayUser = array(
					"add"	=> $_REQUEST["add"],
					"id"	=> $_REQUEST["id"],
					"name" => $_REQUEST["fname"],
					"email" => $_REQUEST["email"],
					"message" => $_REQUEST["message"]
			);
			//print_r("<pre>");print_r($arrayUser);print_r("</pre>");
			//exit(0);
			$insertUser = new Messages(); 
			$insertUser->insert_updateMessage($arrayUser); 
		break;
		case "delete":
			$deleteUser = new Messages(); 
			$deleteUser->deleteMessage($_REQUEST["id"]); 
		break;
		case "viewMessages":
			$pages = 0;
			$viewMessage = new Messages(); 
			$viewMessage->Messages_list(); 
		break;
		case "paginate":
			$pages = ($_REQUEST['pages']*10) - 10;
			$viewMessage = new Messages(); 
			$viewMessage->Messages_list($pages); 
		break;
	}
}
class Messages{
	private $Database;
	private $conn;
	private $arrayMessage;
	private $smartyConfig;  
	private $tpl_folder;
	function __construct()
 	{ 
		$this->Database = '';
		$this->conn = '';  
		$this->arrayMessage = array(); 
		$this->smartyConfig = new Config(); 
		//$this->tpl_folder = "/var/www/guestbook-tim/tpl/";
 	} 
	public function viewMessages(){     
		$this->conn = $this->smartyConfig->dBase();	
		//$sql = "SELECT `id`, `name`, `email`, `message` FROM `guestbook`.`tblguest` order by id desc limit $pages,10"; 
		$sql = "SELECT `id`, `name`, `email`, `message` FROM `guestbook`.`tblguest` order by id desc";
		$query = $this->conn->prepare($sql);    
		$query->execute(); 
		$arrayMessage = $query->fetchAll();  
	    return $arrayMessage;   
	}

	public function viewMessagePagination(){     
		$this->conn = $this->smartyConfig->dBase();
		$sql = "SELECT * FROM `guestbook`.`tblguest`"; 
		$query = $this->conn->prepare($sql);    
		$query->execute(); 
		return ceil($query->rowCount()/10);    
	}

	public function insert_updateMessage($dataUser){  
		$this->conn = $this->smartyConfig->dBase();  
		$sql = ""; 
		if($dataUser["add"] == "true") 
			$sql = "INSERT INTO `guestbook`.`tblguest`(`name`,`email`,`message`) VALUES (:name,:email,:message);";
		  
		else 
			$sql = "UPDATE `guestbook`.`tblguest` SET `name` = :name, `email` = :email, `message` = :message WHERE `id` = '".$dataUser["id"]."';"; 

		//echo $sql;
		//exit(0);
       $query = $this->conn->prepare($sql); 
       $query->bindParam(':name', $dataUser["name"]);
       $query->bindParam(':email', $dataUser["email"]);
       $query->bindParam(':message', $dataUser["message"]); 
       $query->execute();
       $arrayGuest = array(
		 		"name" => $dataUser["name"],
		 		"email" => $dataUser["email"],
		 		"message" => $dataUser["message"]
		); 
       //$this->sendEmail($arrayGuest);
	}

	public function deleteMessage($id){  
		$this->conn = $this->smartyConfig->dBase();  
		$sql = "DELETE FROM `guestbook`.`tblguest` WHERE id='".$id."';";  
       $query = $this->conn->prepare($sql);  
       $query->execute();  
	}

	public function Messages_list(){
		try{
		   $smarty = $this->smartyConfig->dataConfig();
	       $smarty->assign('people', $this->viewMessages()); 
	       $smarty->assign('to', $this->viewMessagePagination());
	       $smarty->display('../tpl/message_list.tpl');
	    }catch (Exception $e)
	    {
	    	echo 'Caught exception: ',  $e->getMessage(), "\n"; 
		} 
	}

	public function sendEmail($dataGuest)
	{
	   $msg = "New added data from Guestbook Application\nName: ".$dataGuest["name"]."\nEmail: ".$dataGuest["email"]."\nMessages: ".$dataGuest["message"]."\nUrl: http://guestbook-tim.linuxserv.space/index.php";
	   $headers = 'From: tim.marapao@oxi.ro' . "\r\n" .
    	'Reply-To: tim.marapao@oxi.ro' . "\r\n" .
    	'X-Mailer: PHP/' . phpversion();
	   $msg = wordwrap($msg,120);
	   mail("marapaotim@gmail.com,tim.marapao@oxi.ro,razvan@oxi.ro,gabriela.dan@bioelite.ro","Guestbook App",$msg, $headers); 
	}
}