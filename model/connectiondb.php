<?php 


class Connect{

    private  $con=null;

        public function __construct()
        {
            
            try{
                require "Constants.php";
                $this->con=new PDO("mysql:host=".$host.";dbname=".$databaseName,$username,$password);
                $this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);    
            }catch(PDOException $e)
            {
                die($e->getMessage());
            }
        }

        public function put($req)
        {
        return $this->con->exec($req);
        }

        public function getAll($req)
        {
        return ($this->con->query($req))->fetchAll();
        }

        public function count($email,$password)
        {
        return ($this->con->query("select * from user where email = '$email' and password = '$password'"))->rowCount();
        }

        public function getImage($email){
            return ($this->con->query("select image from user where email = '$email' "))->fetchColumn();
        }

        public function getID($email){
            return ($this->con->query("select IDutilisateur from user where email = '$email' "))->fetchColumn();
        }

        public function emailInUse($email){
            $count = ($this->con->query("select * from user where email = '$email'"))->rowCount();
            if($count != 0 ){
                return false ;
            }else{
                return true ;
        }
    }
}


?>