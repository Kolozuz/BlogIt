<?php
    session_start();
    
    //Variables de Sesion
    include '../Models/User.php';
    // $nombre = $_POST['username_login'];

    class UsersController extends User{

    //Funciones de Redireccionamiento (o de inclusion mejor dicho)
        public function RedirectIndex(){
            header('Location: ../Index.php');
        }

        public function RedirectStart(){

            $userinfo = $this->CheckUserFromDB();

            foreach ($userinfo as $user_u){}
            if(empty($_SESSION['username_login'])){
                session_destroy();

                die ('No has iniciado sesion');
                return;
            }

            else{
                // var_dump($userinfo);
                    echo '<script type="text/javascript">';
                    echo "alert('Sesion iniciada con exito')";
                    echo '</script>';
                include_once '../Views/Usuario/MyBlogs.php';
            }
            

        }
        
        public function RedirectLogin() {
            include_once '../Views/Usuario/Login.php';
        }

        public function RedirectSignUp() {
            include_once '../Views/Usuario/SignUp.php';
        }

        public function RedirectProfile() { 
            // $userscontroller = new UsersController();
            // $userscontroller->CheckUserFromDB();
            // $userinfo = $this->CheckUserFromDB();
            // return $userinfo;
            // foreach ($userinfo as $user_u){}
            // var_dump($userinfo);
            include_once '../Views/Usuario/Profile.php'; 
        }

        public function RedirectUpdate(){
            $id_u = $_GET['id'];
            $username_u = $_POST['username_update'];
            $email_u = $_POST['email_update'];
            $this->UpdateUser($id_u,$username_u,$email_u);

            $userinfo = $this->CheckUserForUpdate($email_u,$username_u);
            foreach ($userinfo as $user_u){}

            $this->RedirectProfile();
            // foreach($personas as $updateperson){}
            // session_reset();
            // $_SESSION['username_login'] = $updateperson->username_u;
            // $_SESSION['email_register'] = $updateperson->email_u;
        }

        public function RedirectDelete($id_u){
            $this->DeleteUser($id_u);
            echo '<script type="text/javascript">';
            echo "alert('Perfil Borrado')";
            echo '</script>';
            echo '<style>body{text-align:center; font-family: Ubuntu, sans-serif;}</style><span style="text-align:center;font-size: 50px; font-weight:bold;">Click ';
            echo '<a href="UsersController.php?action=index"> aqui </a> ';
            echo ' para volver al inicio</span>';
            $this->RedirectIndex();
        }

        public function RedirectConfig(){
            include_once '../Views/Usuario/ConfigUsuario.php'; 
        }

    //Funcion de Registro
        public function ListInformation($email_u,$username_u,$contrasenaencripted){
            
            $this->email_u = $email_u;
            $this->username_u = $username_u;
            $this->password_u = $contrasenaencripted;      
            $this->SaveUser();
            
            // $this->RedirectIndex();
            //
            // $userinfo = $this->CheckUsuarioFromDB();
            // foreach ($userinfo as $user_u){}
            // if
            // $_SESSION['username_register'] = $user_u->username_u;
            // $_SESSION['email_register'] = $user_u->email_u;
        }

    //Funcion de Inicio de Sesion
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

                    
                    header('Location: UsersController.php?action=start');
                    return $userinfo;
            }

            else{
                echo '
                    <link rel="stylesheet" href="../Public/Css/boot.css">
                    <link rel="stylesheet" href="../Public/Css/style.css"><br>';

                echo '<script type="text/javascript">';
                echo 'document.write("';
                echo "<div class='container-fluid bg-primario'>¿Eres nuevo en Blog-It? <br> Haz click";
                echo "<a class='btn bg-secundario shadow-sm' data-bs-toggle='modal' data-bs-target='#Registerpopup'>Aqui</a> para volver al index y registrarte </div>";
                echo '")</script>';
                // $this->RedirectIndex();
                   
            }


        }

        

        
    }

    //TOMAR ACTION PARA REDIRECCIONAR

    //StartPage
    if(isset($_GET['action']) && $_GET['action'] == 'start'){
        $userscontroller = new UsersController();
        $userscontroller->RedirectStart();
    }

    //Index
    if(isset($_GET['action']) && $_GET['action'] == 'index'){
        $userscontroller = new UsersController();
        $userscontroller->RedirectIndex();
    }

    //Perfil
    if(isset($_GET['action']) && $_GET['action'] == 'profile'){
        $userscontroller = new UsersController();
        $userscontroller->RedirectProfile();
    }

    //Configuracion
    if(isset($_GET['action']) && $_GET['action'] == 'config'){
        $userscontroller = new UsersController();
        $userscontroller->RedirectConfig();
    }

    //Registro
    if(isset($_GET['action']) && $_GET['action'] == 'signup'){
        $userscontroller = new UsersController();
        $userscontroller->RedirectSignUp();
    }

    //Inicio de Sesion
    if(isset($_GET['action']) && $_GET['action'] == 'login'){
        $userscontroller = new UsersController();
        $userscontroller->RedirectLogin();
    }

    //Cerrar Sesion
    // if(isset($_GET['action']) && $_GET['action'] == 'logout'){
    //     $userscontroller = new UsersController();
    //     $userscontroller->RedirectIndex($alert);
    // }

    //Eliminar Cuenta
    if(isset($_GET['action']) && $_GET['action'] == 'delete'){
        $userscontroller = new UsersController();
        $id_u = $_GET['id'];
        $userscontroller->RedirectDelete($id_u);
        session_destroy();
    }

    //Actualizar Cuenta
    if(isset($_GET['action']) && $_GET['action'] == 'update'){
        $userscontroller = new UsersController();
        $userscontroller->RedirectUpdate();
        // session_destroy();
    }

    //TOMAR DATOS DE REGISTRO DESDE EL FORMULARIO Y GUARDARLOS EN LA DB, ENCRIPTANDO LA CONTRASEÑA
    if(isset($_POST['action']) && $_POST['action'] == 'signup'){
        $userscontroller = new UsersController();
        $contrasenaencripted = password_hash($_POST['password_signup'],PASSWORD_ARGON2ID);
        $userscontroller->ListInformation($_POST['email_signup'], $_POST['username_signup'], $contrasenaencripted);
    }

    //COMPROBAR DATOS DE INICIO DE SESION
    if(isset($_POST['action']) && $_POST['action'] == 'login'){
        $userscontroller = new UsersController();
        $userscontroller->VerifyLogin($_POST['username_login'], $_POST['password_login']);
    }

?> 