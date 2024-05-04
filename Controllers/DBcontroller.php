<?php



class DBcontroller
{
    private $dbHost = "localhost";
    private $dbUser = "root";
    private $dbPassword = "";
    private $dbName = "epay";
    private $connection;

    public function getConnection()
    {
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
        $result = $this->connection->query($qry);
        if (!$result) {
            echo "Error : " . mysqli_error($this->connection);
            return false;
        } else {
            return $this->connection->insert_id;
        }
    }

    public function select($qry)
    {
        $result = $this->connection->query($qry);
        if (!$result) {
            echo "<div class=\"alert alert-danger alert-dismissible py-3\">
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
            Error :" . mysqli_error($this->connection) . "</div>";
            return false;
        } else {
            return  $result->fetch_all(MYSQLI_ASSOC);
        }
    }

    public function delete($qry)
    {
        $result = $this->connection->query($qry);
        if (!$result) {
            echo "Error : " . mysqli_error($this->connection);
            return false;
        } else {
            return $result;
        }
    }

    public function update($qry)
    {
        $result = $this->connection->query($qry);
        if (!$result) {
            echo "<div class=\"alert alert-danger alert-dismissible py-3\">
                  <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                  Error : " . mysqli_error($this->connection) . "</div>";
            return false;
        } else {
            return $result;
        }
    }
}
