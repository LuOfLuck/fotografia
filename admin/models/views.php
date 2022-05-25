<?php
    include("models.php");
    include("security.php");
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
                        header("location: ../perfil.php");
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
    function createdAlbum(){
        if(isset($_POST["titulo"]) and isset($_POST["descripcion"])){
            $titulo = $_POST["titulo"];
            $descripcion = $_POST["descripcion"];
            $tituloLen = strlen($titulo);
            $descripcionLen = strlen($descripcion);
            if(($tituloLen > 5 and $tituloLen < 50) and ($descripcionLen >= 8 and $descripcionLen <= 3000) ){
                global $tableAlbum;
                /*
                    tengo sueño aca tiene que retornar un json 
                    ya que estos son rutas ajax.
                    no se si deberia hacer un archivo aparte 
                    teoria se puede usar en el mismo
                    LUCAS NO TE OLVIDES DE LO QUE 
                    TENES QUE HACER ACA POR FAVOR 
                if($res = $tableAlbum->add($titulo, $descripcion){
                    echo "album agregado";
                }else{
                    echo "album no agregado";
                }
                */
            }
        }
    }

    if($security->violationVal()){
        if(isset($_POST['CSRFToken'])) {
            if($security->valToken($_POST['CSRFToken'])){
                if(isset($_POST["login"])){
                   login();
                } 
                if(isset($_POST["crearAlbum"])){
                    CreatedAlbum();
                }
            } 
        }else{
            if(isset($_GET["logout"])){
                logout();
            }
        }
        $security->violationSum();
    }else{
        $_SESSION["message"]="Formulario no validado: <br> Hemos detectado una actividad sospechosa";
        header("location: ../index.php");
        exit();
    }
    
    


    /*
    ainaudi: experience
    $res= $tableUser->addUser("Lucas123", "lucas@mail.com", "12345678");
    echo ($res)?"usuario creado":"usuario no creado";
    */
?>