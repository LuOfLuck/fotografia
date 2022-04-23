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

    if($security->violationVal()){
        if(isset($_POST['CSRFToken'])) {
            if($security->valToken($_POST['CSRFToken'])){
                if(isset($_POST["login"])){
                   login();
                } 
            } 
        }else if((isset($_GET['CSRFToken']))){
            if($security->valToken($_GET['CSRFToken'])){
                if(isset($_GET["logout"])){
                    $_SESSION["active"] = false;
                    header("location: ../index.php");
                }
            }
        }
        $security->violationSum();
        echo "aca";
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