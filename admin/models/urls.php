<?php
    include("models.php");
    include("security.php");
    /* SESION */
    function login(){
        if( isset($_POST['username']) && isset($_POST['password'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            if( !( empty($username) and empty($password) ) ){
                $userLen = strlen($username);
                $passLen = strlen($password);
                if( ($userLen > 6 and $userLen < 30) and ($passLen >= 8 and $passLen <= 50) ) {
                    global $tableUser;
                    if($res = $tableUser->loginUser($username, $password)){
                        $_SESSION["active"] = true;
                        $_SESSION["username"] = $res["username"];
                        $_SESSION["email"] = $res["email"];
                        $_SESSION["loginIncorrect"] = 0;
                         header("location: ../../index.php");
                        exit();     
                    }else{
                        if(isset($_SESSION["loginIncorrect"])){
                            $_SESSION["loginIncorrect"]+=1;
                        }
                        else{
                            $_SESSION["loginIncorrect"] = 1;
                        }
                        $_SESSION["message"] = "Username Or password invalid";
                        header("location: ../index.php");
                        exit();
                    }
                }
            }
        }
        global $security;
        $security->violationSum(); //if the user edit the form se lo suma una infraccion
        header("location: ../index.php");
        exit();
    }
    function logout(){
        $_SESSION["active"] = false;
        header("location: ../index.php");
        exit();
    }
    /* TABLA ALBUM */
    function createdAlbum(){
        echo "aca 2";
        $jsonData = array();
        $jsonData["petition"] = false; 
        if(isset($_POST["titulo"]) and isset($_POST["descripcion"])){
            $titulo = $_POST["titulo"];
            $descripcion = $_POST["descripcion"];
            $tituloLen = strlen($titulo);
            $descripcionLen = strlen($descripcion);
            if(($tituloLen > 5 and $tituloLen < 50) and ($descripcionLen >= 8 and $descripcionLen <= 3000)){
                global $tableAlbum;
             
                if($res = $tableAlbum->add($titulo, $descripcion)){
                    $jsonData["status"] = 201; 
                    $jsonData["message"] = "Album agregado"; 
                    $jsonData["objeto"] = array(
                        "titulo" => $titulo,
                        "descripcion" => $descripcion,
                    );
                    $jsonData["petition"] = true; 
                  
                }else{
                    $jsonData["status"] = 503; 
                    $jsonData["message"] = "Album no agregado";                 
                }
            }else{
                $jsonData["status"] = 400; 
                $jsonData["message"] = "Campos invalidos"; 
            }
        }else{
            $jsonData["status"] = 401; 
            $jsonData["message"] = "No existen los campos"; 
        }
        echo json_encode($jsonData);
        header("location: ../../index.php");
        exit();
    }
    function deleteAlbum(){
        $jsonData = array();
        $jsonData["petition"] = false; 
        if(isset($_POST["id"])){
            global $tableAlbum;
            $id = $_POST["id"];
            $res = $tableAlbum->delete($id);
            if($res){
                $jsonData["petition"] = true; 
                $jsonData["status"] = 201; 
                $jsonData["message"] = "Album Eliminado con exito";      
            }else{
                 $jsonData["status"] = 503; 
                $jsonData["message"] = "Album no elimiado";      
            }
        }else{
            $jsonData["status"] = 401; 
            $jsonData["message"] = "No existen los campos"; 
        }
        echo json_encode($jsonData);
        exit();  
    }
    function updateAlbum(){
        $jsonData = array();
        $jsonData["petition"] = false; 
        if(isset($_POST["titulo"]) and isset($_POST["descripcion"]) and isset($_POST["id"])){
            $titulo = $_POST["titulo"];
            $descripcion = $_POST["descripcion"];
            $id = $_POST["id"];
            $tituloLen = strlen($titulo);
            $descripcionLen = strlen($descripcion);
            if(($tituloLen > 5 and $tituloLen < 50) and ($descripcionLen >= 8 and $descripcionLen <= 3000)){
                global $tableAlbum;
                $res = $tableAlbum->update($titulo, $descripcion, $id);
                if($res){
                    $jsonData["petition"] = true; 
                    $jsonData["status"] = 201; 
                    $jsonData["message"] = "Actualizado con exito"; 
                }else{
                    $jsonData["status"] = 503; 
                    $jsonData["message"] = "No se pudo editar, intente de nuevo mas tarde"; 
                }
            }
        }else{
            $jsonData["status"] = 401; 
            $jsonData["message"] = "No existen los campos"; 
        }
        echo json_encode($jsonData);
        exit(); 
    }
    /* TABLA IMG*/
    function addImg(){
        $jsonData = array();
        $jsonData["petition"] = false;
        if(isset($_FILES["img"]) and isset($_POST['album_id'])){   
            $img = $_FILES["img"];
            $album_id = $_POST['album_id'];
            foreach($_FILES['img']['tmp_name'] as $clave => $tmp_name){
                $name = $_FILES['img']['name'][$clave]; 
                $type = $_FILES['img']['type'][$clave]; 
                $size = $_FILES['img']['size'][$clave]; 
                $tmp_name = $_FILES["img"]['tmp_name'][$clave];
                $data= array(
                    "name" => $name,
                    "tmp_name" => $tmp_name,
                    "type"=> $type,
                    "size"=> $size,
                );
                global $tableFoto;
                $tableFoto->add($data,"", $album_id);
            }
            $jsonData["petition"] = true;
            $jsonData["status"] = 201; 
            $jsonData["message"] = "Imagen agregadas con exito"; 
        }else{
            $jsonData["status"] = 401; 
            $jsonData["message"] = "No existen los campos"; 
        }
        echo json_encode($jsonData);
        header("location: ../../index.php");
        exit(); 
    }
    function deleteImg(){
        $jsonData = array();
        $jsonData["petition"] = false;
        if(isset($_POST["id"])){
            global $tableFoto;
            $id = $_POST["id"];
            $res = $tableFoto->delete($id);
            if($res){
                
                $jsonData["petition"] = true;
                $jsonData["status"] = 201; 
                $jsonData["message"] = "Imagen agregada con exito";
                $urlImg = $_POST["urlImg"]; 
                if(!unlink("img/$urlImg")){
                    $jsonData["message"] = "La Imagen de formal local no se pudo borrar "; 
                }
                
            }else{
                $jsonData["status"] = 503; 
                $jsonData["message"] = "No se pudo borrar la imagen"; 
            }
        }else{
            $jsonData["status"] = 401; 
            $jsonData["message"] = "campos no validos"; 
        }
        echo json_encode($jsonData);
        exit(); 
    }
    function updateImg(){
        $jsonData = array();
        $jsonData["petition"] = false;
        if(isset($_POST["descripcion"]) and isset($_POST["id"])){
            $descripcion = $_POST["descripcion"];
            $id = $_POST["id"];
            $descripcionLen = strlen($descripcion);
            if($descripcionLen >= 8 and $descripcionLen <= 3000){
                global $tableFoto;
                $res = $tableFoto->update($descripcion, $id);
                if($res){
                    $jsonData["petition"] = true;
                    $jsonData["status"] = 201; 
                    $jsonData["message"] = "Imagen actualizada con exito"; 
                    $jsonData["objeto"] = array(
                            "descripcion" => $descripcion,
                    );
                }else{
                    $jsonData["status"] = 503; 
                    $jsonData["message"] = "Imagen no actualizada"; 
                }
            }else{
                 $jsonData["status"] = 201; 
                $jsonData["message"] = "Imagen actualizada con exito"; 
            }
        }
    }
    /* URL */
    $_SESSION["violation"] = 0; //comentar luego
    if($security->violationVal()){
    //    if(isset($_POST['CSRFToken'])) {
      //      if($security->valToken($_POST['CSRFToken'])){
                if(isset($_POST["login"])){
                   login();
                } 
                if(isset($_POST["crearAlbum"])){
                    createdAlbum();
                }  
                if(isset($_POST["deleteAlbum"])){
                    deleteAlbum();
                } 
                if(isset($_POST["updateAlbum"])){
                    updateAlbum();
                }
                if(isset($_POST['addImg'])){
                    addImg();
                }
                if(isset($_POST['deleteImg'])){
                    deleteImg();
                } 
                if(isset($_POST['updateImg'])){
                    updateImg();
                }
                echo "aca";
    //        } 
    //    }else{
            if(isset($_GET["logout"])){
                logout();
            }
    //    }
       // $security->violationSum();
    }else{
    //    $_SESSION["message"]="Formulario no validado: <br> Hemos detectado una actividad sospechosa";
        echo "emmmmm";
        header("location: ../../index.php");
        exit();
    }
?>