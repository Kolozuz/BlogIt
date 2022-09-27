<?php
    session_start();
    
    //Variables de Sesion
    require '../Models/User.php';
    // $nombre = $_POST['username_login'];

    class UsuariosController extends User{

        public function RedirectStart(){
            // header('Location: ../Views/Usuario/CursosUsuario.php');
            $userinfo = $this->CheckUserFromDB();

            foreach ($userinfo as $user_u){}
            if(empty($_SESSION['username_login'])){

                session_destroy();
                die ('No has iniciado sesion');
                return;
            }

            else{
                // echo '<script type="text/javascript">';
                // echo "alert('Sesion iniciada con exito')";
                // echo '</script>';
                // var_dump($userinfo);
                include_once '../Views/Usuario/MyBlogs.php';
            }
            

        }
        
        public function RedirectLogin() {
            include_once '../Views/Usuario/Login.php';
        }

        public function RedirectSignUp() {
            include_once '../Views/Usuario/SignUp.php';
        }

        public function RedirectPerfil() {     
            include_once '../Views/Usuario/PerfilUsuario.php'; 
        }

        public function RedirectConfig(){
            include_once '../Views/Usuario/ConfigUsuario.php'; 
        }

        public function DeletePerfil(){
            $this->DeleteUsuario();
            echo '<script type="text/javascript">';
            echo "alert('Perfil Borrado')";
            echo '</script>';
            echo '<style>body{text-align:center; font-family: Ubuntu, sans-serif;}</style><span style="text-align:center;font-size: 50px; font-weight:bold;">Click ';
            echo '<a href="UsuariosController.php?action=index"> aqui </a> ';
            echo ' para volver al inicio</span>';

            // $this->Redir();
        }
        
        public function RedirectIndex(){
            header('Location: ../index.php');
        }

        public function Redirecthtml5(){
            include_once '../Views/Cursos/html5.php';
        }

        public function ListInformation($email_u,$username_u,$contrasenaencripted){
            
            $this->email_u = $email_u;
            $this->username_u = $username_u;
            $this->password_u = $contrasenaencripted;
            echo 'success';            
            $this->SaveUser();
            $this->RedirectIndex();
            // $userinfo = $this->CheckUsuarioFromDB();
            // foreach ($userinfo as $user_u){}
            // if
            // $_SESSION['username_register'] = $user_u->username_u;
            // $_SESSION['email_register'] = $user_u->email_u;
        }

        public function VerifyLogin($username_u,$password_u){
            // ini_set('display_errors', 0);
            // ini_set('display_startup_errors', 0);
            // error_reporting(-1);
            $this->username_u = $username_u;
            $this->password_u = $password_u;
            $userinfo = $this->CheckUserFromDB();

            foreach ($userinfo as $user_u){}
            if(password_verify($password_u, $user_u->password_u)){
                // echo 'Contraseña Correcta';

                $_SESSION['username_login'] = $user_u->username_u;
                $_SESSION['password_login'] = $user_u->password_u;
                
                    $_SESSION['id_register'] = $user_u->id_u;
                    $_SESSION['fecha_register'] = $user_u->creation_u;
                    $_SESSION['email_register'] = $user_u->email_u;

                    // header('Location: UsuariosController.php?action=start'); 
                    echo '<script type="text/javascript">';
                    echo "alert('Sesion iniciada con exito')";
                    echo '</script>';
                    $this->RedirectStart();
            }

            else{
                echo '
                    <link rel="stylesheet" href="../Public/Css/boot.css">
                    <link rel="stylesheet" href="../Public/Css/style.css"><br>';

                echo '<script type="text/javascript">';
                echo 'document.write("';
                echo "<div class='container-fluid bg-primario'>¿Eres nuevo en Jujomi? <br> Haz click";
                echo "<a class='btn bg-secundario shadow-sm' data-bs-toggle='modal' data-bs-target='#Registerpopup'>Aqui</a> para volver al index y registrarte </div>";
                echo '")</script>';
                // $this->RedirectIndex();
                   
            }


        }

        public function Update(){
            $id_u = $_POST['id_u'];
            $username_u = $_POST['username_update'];
            $email_u = $_POST['email_update'];
            $personas = $this->UpdateUser($id_u,$username_u,$email_u);

            header('Location: UsuariosController.php?action=perfil'); 

            // $this->RedirectPerfil();
            // foreach($personas as $updateperson){}
            // session_reset();
            // $_SESSION['username_login'] = $updateperson->username_u;
            // $_SESSION['email_register'] = $updateperson->email_u;

        }
        

        
    }

    //TOMAR ACTION PARA REDIRECCIONAR
    if(isset($_GET['action']) && $_GET['action'] == 'start'){
        $userscontroller = new UsuariosController();
        $userscontroller->RedirectStart();
    }
    
    //Index
    if(isset($_GET['action']) && $_GET['action'] == 'index'){
        $userscontroller = new UsuariosController();
        $userscontroller->RedirectIndex();
    }

    //Perfil
    if(isset($_GET['action']) && $_GET['action'] == 'perfil'){
        $userscontroller = new UsuariosController();
        $userscontroller->RedirectPerfil();
    }

    //Configuracion
    if(isset($_GET['action']) && $_GET['action'] == 'config'){
        $userscontroller = new UsuariosController();
        $userscontroller->RedirectConfig();
    }

    //Registro
    if(isset($_GET['action']) && $_GET['action'] == 'signup'){
        $userscontroller = new UsuariosController();
        $userscontroller->RedirectSignUp();
    }

    //Inicio de Sesion
    if(isset($_GET['action']) && $_GET['action'] == 'login'){
        $userscontroller = new UsuariosController();
        $userscontroller->RedirectLogin();
    }

    //Cerrar Sesion
    if(isset($_GET['action']) && $_GET['action'] == 'logout'){
        $userscontroller = new UsuariosController();
        $userscontroller->RedirectIndex($alert);
    }

    //Eliminar Cuenta
    if(isset($_GET['action']) && $_GET['action'] == 'delete'){
        $userscontroller = new UsuariosController();
        $userscontroller->DeletePerfil();
        session_destroy();
    }

    //Actualizar Cuenta
    if(isset($_GET['action']) && $_GET['action'] == 'update'){
        $userscontroller = new UsuariosController();
        $userscontroller->Update();
        // session_destroy();
    }

    //TOMAR DATOS DE REGISTRO DESDE EL FORMULARIO Y GUARDARLOS EN LA DB, ENCRIPTANDO LA CONTRASEÑA
    if(isset($_POST['action']) && $_POST['action'] == 'signup'){
        $userscontroller = new UsuariosController();
        $contrasenaencripted = password_hash($_POST['password_signup'],PASSWORD_ARGON2ID);
        $userscontroller->ListInformation($_POST['email_signup'], $_POST['username_signup'], $contrasenaencripted);
    }

    //COMPROBAR DATOS DE INICIO DE SESION
    if(isset($_POST['action']) && $_POST['action'] == 'login'){
        $userscontroller = new UsuariosController();
        $userscontroller->VerifyLogin($_POST['username_login'], $_POST['password_login']);
    }

    //COSAS QUE DEBEN ESTAR EN EL CURSOCONTROLLER
    if(isset($_GET['curso']) && $_GET['curso'] == 'html5'){
        $userscontroller = new UsuariosController();
        $userscontroller->Redirecthtml5();
    }

?> 