<?php
    $dbPassword = "admin";
    $dbUser = "PHPFundamentals";
    $dbServer = "localhost";
    $dbName = "php_fundamentals";

    $connection = new mysqli($dbServer, $dbUser, $dbPassword, $dbName);

    if($connection->connect_errno){
        exit("Database Connection Failed. Reason: ".$connection->connect_error);
    }

    //$query = "DELETE FROM Author WHERE id = 4";
    //$query = "UPDATE Author SET pen_name = 'Adrian Vega' WHERE id = 1";
    //$query = "INSERT INTO Author(first_name, last_name, pen_name) VALUES('Alejandro','Vega', 'Ale M. Vega')";
    //echo "Nowly Created Author Id: ".$connection->insert_id; get current ID

    $tempFirstName = "Adrian Antonio";
    $query = "SELECT * FROM Author WHERE first_name = ?";
    $statementObj = $connection->prepare($query);

    $statementObj->bind_param("s", $tempFirstName);
    $statementObj->execute();

    $statementObj->bind_result($id,$firstname, $lastname, $penname);
    $statementObj->store_result();
    
    if($statementObj->num_rows > 0)
    {
        while($statementObj->fetch())
        {
            echo $id." ".$firstname." ".$lastname." (".$penname.")";
        }
    }

    $statementObj->close();
    $connection->close();
?>