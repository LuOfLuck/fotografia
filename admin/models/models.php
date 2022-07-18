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
class TableAlbum{
	public $tableName;
    public $con;
    function __construct($tableName, $con){
        $this->tableName = $tableName;
        $this->con = $con;
    } 
    function add($titulo,$descripcion){
        try{
        	$Object = new DateTime();  
			$fecha = $Object->format("Y-m-d");  
			$sth = $this->con->prepare('
		        INSERT INTO album (titulo, descripcion, fecha) VALUES ( ? , ? , ? );
		    ');
		    $sth->bind_param("sss",$titulo, $descripcion, $fecha);
		    $sth->execute();
		    return true;
        }catch (Exception $e){
        	return false;
        }
	}  
	function delete($id){
		try{  
			$sth = $this->con->prepare('
		        DELETE FROM album where id=?;
		    ');
		    $sth->bind_param("i",$id);
		    $sth->execute();
		    return true;
        }catch (Exception $e){
        	return false;
        }
	}
	function update($titulo, $descripcion, $id){
		try{
			$sth = $this->con->prepare('
		        UPDATE album SET titulo=?, descripcion=? WHERE id=?;
		    ');
		    $sth->bind_param("ssi",$titulo,$descripcion,$id);
		    $sth->execute();
		    return true;
        }catch (Exception $e){
        	return false;
        }
	}
	function getAll(){
			//aca la verdad el 0 = ? (num = 0) es para que obtenga todo porque tengo paja de testear
		    $sth = $this->con->prepare('
		       SELECT id, titulo, descripcion, fecha FROM album WHERE 0 = ? 
		    ');
		    $num = 0;
		    $sth->bind_param("i",$num);
		    $sth->execute();
		    $sth->store_result();

			$sth->bind_result($a,$b,$c,$d);
			while ($sth->fetch()) {
			     $outArr[] = ['id' => $a, 'titulo' => $b, 'descripcion' => $c, 'fecha' => $d];
			}
			$sth->close();
			return $outArr;
	}
		
}
class TableFotos{
	public $tableName;
    public $con;
    function __construct($tableName, $con){
        $this->tableName = $tableName;
        $this->con = $con;
    } 
    function add($foto,$descripcion, $album){
        try{
        	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
			$limite_kb = 6384; //6 MB . algo
		 	if (isset($foto)){
		  	    if (in_array($foto['type'], $permitidos) && $foto['size'] <= $limite_kb * 1024){
		  	    	$nombreImg = $foto['name'];
		    		$ruta = $foto['tmp_name'];
		    		$directorio = "img/";
		    		$destino = $directorio . $nombreImg;
		    		$random = rand(0, 1000);
		    		if(!file_exists($destino )){
						if(move_uploaded_file($ruta, "img/" . $random . $nombreImg)){
							$dir =  $random . $nombreImg;
							$Object = new DateTime();  
							$fecha = $Object->format("Y-m-d h:i:s");
							$sth = $this->con->prepare('
						        INSERT INTO fotos (foto, descripcion, fecha, album) VALUES ( ? , ? , ? , ? );
						    ');
						    $sth->bind_param("sssi",$dir, $descripcion, $fecha, $album);
						    $sth->execute();
						    return true;
						}
					}
		  	    }
		 	}

        	
        }catch (Exception $e){
        	return false;
        }
	}  
	function delete($id){
		try{  
			$sth = $this->con->prepare('
		        DELETE FROM fotos where id=?;
		    ');
		    $sth->bind_param("i",$id);
		    $sth->execute();
		    return true;
        }catch (Exception $e){
        	return false;
        }
	}
	function update($descripcion, $id){
		try{
			$sth = $this->con->prepare('
		        UPDATE fotos SET descripcion=? WHERE id=?;
		    ');
		    $sth->bind_param("si",$descripcion,$id);
		    $sth->execute();
		    return true;
        }catch (Exception $e){
        	return false;
        }
	}
	function getForAlbum($idAlbum){
		try{
		    $sth = $this->con->prepare('
		       SELECT id, descripcion, foto FROM fotos WHERE album = ?
		    ');
		    $sth->bind_param("i",$idAlbum);
		    $sth->execute();
		    $sth->store_result();

			$sth->bind_result($a,$b, $c);
			$outArr = [];
			while ($sth->fetch()) {
			     $outArr[] = ['id' => $a, 'descripcion' => $b, 'srcFoto' => $c];
			}
			$sth->close();
			return $outArr;
		}
		catch (Exception $e){
        	return false;
        }  
	}
	function getAccordingTo($idAlbum){
		try{
		    $sth = $this->con->prepare('
		       SELECT id, foto, fecha FROM fotos WHERE album = ? 
		    ');
		    $sth->bind_param("ss",$username, $password);
		    $sth->execute();
			return $sth;
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
//		try{	
	$conexion = new Conexion("127.0.0.1:3307", "root", "", "fotografia");
	$con = $conexion->conexBd(); 
// }
// catch (Exception $e){
// 	$conexion = new Conexion("localhost", "u840927966_root", "iI3Uh1wZ#", "u840927966_fotografia");
// 	$con = $conexion->conexBd(); 
// }  
$tableUser = new TableUser("user", $con);
$tableAlbum = new TableAlbum("album", $con);
$tableFoto = new TableFotos("fotos", $con);

?>