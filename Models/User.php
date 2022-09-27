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

    class User{
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
            return;
        }
        
        protected function CheckUserFromDB(){
        $connection = new Connection();
            $sql = "SELECT * FROM tbl_user WHERE username_u='$this->username_u'";

            $user = $connection->stm->prepare($sql); 
            $user->execute();
      
            $userobjeto = $user->fetchAll(PDO::FETCH_OBJ);
            if ($userobjeto){
                return $userobjeto;
            }
            else{
                var_dump($userobjeto);

                session_destroy();
                die ('No te encuentras registrado en Jujomi');
                // return $userobjeto;

            }
        }

        protected function UpdateUser($id_u,$username_u,$email_u){
            $connection = new Connection();
            
            $sql = "UPDATE user SET username_u='$username_u', email_u='$email_u' WHERE id_u = '$id_u'";

            $update = $connection->stm->prepare($sql);
            $update->execute();

            $personas = $update->fetchAll(PDO::FETCH_OBJ);
            
            return $personas;
        }

        protected function DeleteUsuario(){
            $connection = new Connection();
            // $userinfo = $this->CheckUsuarioFromDB();
            // foreach ($userinfo as $user_u){}
            
            $id_u = $_GET['id'];
            
            $sql = "DELETE FROM user WHERE id_u = '$id_u'";

            $delete = $connection->stm->prepare($sql);
            $delete->execute();

            
            return $delete;

            // $personas = $delete->fetchAll(PDO::FETCH_OBJ);
            // return $personas;
        }
    }
?>
