<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/PHPFundamentals/Model/Profile.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/PHPFundamentals/Model/LoginStatus.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/PHPFundamentals/DB/DBConnection.php';

    class ProfileRepository{
        private $connection;

        public function __construct()
        {
            $db = new DBConnection();
            $this->connection = $db->GetConnection();
        }

        public function login($username, $password){

            session_start();

            if($this->connection->errno){
                exit('Database Connection Failed. Reason: '.$this->connection->error);
            }

            $query = "SELECT * FROM tprofile WHERE username = ?";
            
            $statements = $this->connection->prepare($query);
            $statements->bind_param('s', $username);
            $statements->execute();

            $statements->bind_result($id, $username, $passwordHashed, $isAdmin);
            $statements->store_result();
            $loginStatus = LoginStatus::loginFailed('Username or password are incorrect');

            if($statements->num_rows > 0){
                while($statements->fetch()){
                    $profile = new Profile($username, $passwordHashed, $isAdmin, $id);
                    $_SESSION['id'] = $profile->id;
                    $_SESSION['username'] = $profile->username;
                    $_SESSION['isAdmin'] = $profile->isAdmin;
                }

                $isCorrectPassword = password_verify($password, $profile->password);

                if($isCorrectPassword){



                    $loginStatus = LoginStatus::loginSuccessful('Login sucessfull');
                }
            }

            $statements->close();
            $this->connection->close();

            return $loginStatus;
        }

        public function createProfile(Profile $profile){
            if($this->connection->errno){
                exit('Database Connection Failed. Reason: '.$this->connection->error);
            }

            $query = ($profile->isAdmin === 1)? "INSERT INTO tprofile (username, password, isAdmin) VALUES(?,?,?)":
                        "INSERT INTO tprofile (username, password) VALUES(?,?)";
            $statements = $this->connection->prepare($query);

            if($profile->isAdmin === 1){
                $statements->bind_param('ssi',$profile->username, $profile->password, $profile->isAdmin);
            }else{
                $statements->bind_param('ss',$profile->username, $profile->password);
            }

            $result = $statements->execute();
            $profileId = ($result == 1)? $this->connection->insert_id : -1;

            $statements->close();
            $this->connection->close();

            return $profileId;
        }
    }
?>