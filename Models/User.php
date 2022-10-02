<?php
    include '../Config/Connection.php';
    // include '../../Config/Connection.php';

    // $username = $_POST['username_login'];

    // $connection = new Connection();
    //         $sql = "SELECT * FROM user WHERE username_u = '$username'";

    //         $user = $connection->stm->prepare($sql); 
    //         $user->execute();
      
    //         $userobjeto = $user->fetchAll(PDO::FETCH_OBJ);
    //         return $userobjeto;

    class User {
        protected $id_u;
        protected $email_u;
        protected $username_u;
        protected $password_u;
        //Este model es el unico que se conecta a la db y guarda datos en ella
        
        public function SaveUser(){
            $connection = new Connection();
            $sql = "INSERT INTO tbl_user(email_u, username_u, password_u) VALUES (?,?,?)";
            
            $insert = $connection->stm->prepare($sql);
            $insert->bindParam(1,$this->email_u);
            $insert->bindParam(2,$this->username_u);
            $insert->bindParam(3,$this->password_u);
            $insert->execute();
            echo 'Success, your username is: ';      
            echo $this->username_u;
            return;
        }
        
        public function CheckUserFromDB(){
        $connection = new Connection();
        // $connection->__construct();
            $sql = "SELECT * FROM tbl_user WHERE username_u='$this->username_u'";

            $user = $connection->stm->prepare($sql); 
            $user->execute();
      
            $userobj = $user->fetchAll(PDO::FETCH_OBJ);
            // if ($userobj){
                // var_dump($userobj);
                return $userobj;
            // }
            // else{
            //     session_destroy();
            //     die ('No te encuentras registrado en Blog-It');
            //     // return $userobjeto;
            // }
        }
        public function CheckUserForUpdate(){
            $connection = new Connection();
            // $connection->__construct();
                $sql = "SELECT * FROM tbl_user WHERE username_u='$this->username_u'";
    
                $user = $connection->stm->prepare($sql); 
                $user->execute();
          
                $userobj = $user->fetchAll(PDO::FETCH_OBJ);
                // if ($userobj){
                    $email_u = func_get_arg(0);
                    $username_u = func_get_arg(1);
                    $_SESSION['email_register'] = $email_u;
                    $_SESSION['username_login'] = $username_u;
                    // var_dump($userobj);
                    return $userobj;
                // }
                // else{
                //     session_destroy();
                //     die ('No te encuentras registrado en Blog-It');
                //     // return $userobjeto;
                // }
            }

        //FUNCIONES PARA ACTUALIZAR DATOS
        public function UpdateUser($id_u,$username_u,$email_u){
            $connection = new Connection();
            
            $sql = "UPDATE tbl_user SET username_u='$username_u', email_u='$email_u' WHERE id_u = '$id_u'";

            $update = $connection->stm->prepare($sql);
            $update->execute();

            $personas = $update->fetchAll(PDO::FETCH_OBJ);
            echo '<script type="text/javascript">';
            echo "alert('Your info was succesfully updated')";
            echo '</script>';
            return $personas;

                

        }

        // public function updateEmailModel($id_u,$email_u){
        //     $connection = new Connection();
            
        //     $sql = "UPDATE tbl_user SET email_u='$email_u' WHERE id_u = '$id_u'";

        //     $update = $connection->stm->prepare($sql);
        //     $update->execute();

        //     $personas = $update->fetchAll(PDO::FETCH_OBJ);
            
        //     return $personas;
        // }

        // public function updateEmail($id_u,$email_u){
        //     $connection = new Connection();
            
        //     $sql = "UPDATE tbl_user SET email_u='$email_u' WHERE id_u = '$id_u'";

        //     $update = $connection->stm->prepare($sql);
        //     $update->execute();

        //     $personas = $update->fetchAll(PDO::FETCH_OBJ);
            
        //     return $personas;
        // }


        public function DeleteUser($id_u){
            $connection = new Connection();
            // $userinfo = $this->CheckUsuarioFromDB();
            // foreach ($userinfo as $user_u){}
            
            $id_u = $_GET['id'];
            
            $sql = "DELETE FROM user WHERE id_u = '$id_u'";

            $delete = $connection->stm->prepare($sql);
            $delete->execute();

            echo $id_u;
            return $delete;

            // $personas = $delete->fetchAll(PDO::FETCH_OBJ);
            // return $personas;
        }
    }
?>
