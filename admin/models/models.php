<?php

class TableUser{
    public $tableName;
    public $con;
    function __construct($tableName, $con){
        $this->tableName = $tableName;
        $this->con = $con;
    }   
	function addUser($username,$email,$password){
        try{
			$sth = $this->con->prepare('
		        INSERT INTO user (username, email, password) VALUES ( ? , ? , ? );
		    ');
		    $sth->bind_param("sss",$username, $email, $password);
		    $sth->execute();
		    return true;
        }catch (Exception $e){
        	return false;
        }
	}
	function loginUser($username, $password){
		try{
		    $sth = $this->con->prepare('
		       SELECT username, email FROM user WHERE username = ? AND password = ?
		    ');
		    $sth->bind_param("ss",$username, $password);
		    $sth->execute();
			$sth->bind_result($username, $email);
			return ($sth->fetch())?array("username"=>$username,"email"=>$email):false;
		}
		catch (Exception $e){
        	return false;
        }  
	}
}
class Conexion{
	private $host;
	private $user;
	private $pass;
	private $bdname;
	function __construct($host, $user, $pass, $bdname){
		$this->host = $host;
		$this->user = $user;
		$this->pass = $pass;
		$this->bdname = $bdname;
	}
	function conexBd(){
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		$con = new mysqli($this->host, $this->user, $this->pass, $this->bdname);
		$con->set_charset('utf8mb4');
		return ($con) ? $con : false;
    }
}
$conexion = new Conexion("localhost:3307", "root", "", "fotografia");
$con = $conexion->conexBd(); 
$tableUser = new TableUser("user", $con);

?>