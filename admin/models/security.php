<?php
session_start();
class Security{
	function creartedToken(){
		if(function_exists('mcrypt_create_iv')){
			$token = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
		}else{
			$token = bin2hex(openssl_random_pseudo_bytes(32));
		}		
		return $token;
	}
	function valToken($token = ""){
        if(isset($_SESSION['CSRFToken'])){
            if(hash_equals($_SESSION['CSRFToken'], $token)){
            	$_SESSION['CSRFToken'] = null;
                return true;
            }
        }
        return false;
    }
    function violationSum(){
   		if(isset($_SESSION["violation"])){
			$_SESSION["violation"] += 1;
		}else{
			$_SESSION["violation"] = 1;
		}
		$_SESSION["message"] = "Solicitud no permitida";
    }
    function violationVal(){
    	if (isset($_SESSION["violation"])){
    		return ($_SESSION["violation"] < 10)?true:false;
    	}else{
    		$_SESSION["violation"] = 0;
    		return true;
    	}
    }
    function userActive(){
    	if(isset($_SESSION["active"])){
	        if(!$_SESSION["active"]){
	            header("Location: index.php");
	        }
    	}else{
    		header("Location: index.php");
    	}
	}      
	function userInactive(){
		if(isset($_SESSION["active"])){
        	if($_SESSION["active"]){
            	header("Location: perfil.php");
        	}
        }
	}   
}
$security = new Security();
?>