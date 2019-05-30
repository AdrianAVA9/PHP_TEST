<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/PHPFundamentals/Model/User.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/PHPFundamentals/DB/DBConnection.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/PHPFundamentals/Repository/ProfileRepository.php';

    class UserRepository{
        private $connection;

        public function __construct(){

            $obj = new DBConnection();
            $this->connection = $obj->GetConnection();
        }

        public function CreateUser(User $user){

            if($this->connection->connect_errno){
                exit("Database Connection Failed. Reason: ".$this->connection->connect_error);
            }

            $proRepository = new ProfileRepository();
            $profileId = $proRepository->createProfile(new Profile($user->username, $user->password, $user->isAdmin));

            $query = "INSERT INTO tuser (id,username, comments, color, gender) VALUES(?,?,?,?,?)";
            $statement = $this->connection->prepare($query);

            $statement->bind_param('issss',$profileId,$user->username, $user->comments, $user->color, $user->gender);
            $result = $statement->execute();

            $statement->close();
            $this->connection->close();

            return $result;
        }

    }
?>