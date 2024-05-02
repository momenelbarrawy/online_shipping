<?php

class DBcontroller
{
    private $dbHost = "localhost";
    private $dbUser = "root";
    private $dbPassword = "";
    private $dbName = "ebay";
    private $connection;

    public function getConnection(){
        return $this->connection;
    }


    public function openConnection()
    {
        $this->connection = new mysqli($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
        if ($this->connection->connect_error) {
            echo " Error in Connection : " . $this->connection->connect_error;
            return false;
        } else {
            return true;
        }
    }

    public function closeConnection()
    {
        if ($this->connection) {
            $this->connection->close();
        }
    }

    public function insert($qry)
    {
        $result=$this->connection->query($qry);
        if(!$result)
        {
            echo "Error : ".mysqli_error($this->connection);
            return false;
        }
        else
        {
            return $this->connection->insert_id;
        }

    }
}
