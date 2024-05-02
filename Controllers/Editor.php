<?php
require_once("DBController.php");
$dbController = new DBController();
$dbController->openConnection();
class Editor
{
    private $db;


    public function editProductName($productId, $newProductName)
    {
        $db=new DBController;
        $db->openConnection();
        $sql = "UPDATE product SET pname= '$newProductName' WHERE pid=$productId";
    
        if ($db->getConnection()->query($sql) === TRUE) {
          
          echo "Record updated successfully";
        $db->getConnection()->close();
          
          return true;
        } else {
          echo "Error updating record: " . $this->db->connection->error;
        $db->getConnection()->close();
          
          return false;
        }
    }

    public function editProductPrice($productId, $newPrice)
    {
        $db=new DBController;
        $db->openConnection();
        $sql = "UPDATE product SET price= '$newPrice' WHERE pid=$productId";
    
        if ($db->getConnection()->query($sql) === TRUE) {
          
          echo "Record updated successfully";
        $db->getConnection()->close();
          
          return true;
        } else {
          echo "Error updating record: " . $this->db->connection->error;
        $db->getConnection()->close();
          
          return false;
        }
        
    }

    public function editProductCategory($productId, $newCategory)
    {
        $db=new DBController;
        $db->openConnection();
        $sql = "UPDATE product SET category= '$newCategory' WHERE pid=$productId";
    
        if ($db->getConnection()->query($sql) === TRUE) {
          
          echo "Record updated successfully";
        $db->getConnection()->close();
          
          return true;
        } else {
          echo "Error updating record: " . $this->db->connection->error;
        $db->getConnection()->close();
          
          return false;
        }
    }
    public function editProductBrand($productId, $newBrand)
    {
        $db=new DBController;
        $db->openConnection();
        $sql = "UPDATE product SET brand= '$newBrand' WHERE pid=$productId";
    
        if ($db->getConnection()->query($sql) === TRUE) {
          
          echo "Record updated successfully";
        $db->getConnection()->close();
          
          return true;
        } else {
          echo "Error updating record: " . $this->db->connection->error;
        $db->getConnection()->close();
          
          return false;
        }
    }
    public function editProductImage($productId, $newImage)
    {
        $db=new DBController;
        $db->openConnection();
        $sql = "UPDATE product SET image = '$newImage' WHERE pid=$productId";
    
        if ($db->getConnection()->query($sql) === TRUE) {
          
          echo "Record updated successfully";
        $db->getConnection()->close();
          
          return true;
        } else {
          echo "Error updating record: " . $this->db->connection->error;
        $db->getConnection()->close();
          
          return false;
        }
    }
    public function editProductDescription($productId, $newDescription)
    {
        $db=new DBController;
        $db->openConnection();
        $sql = "UPDATE product SET description = '$newDescription' WHERE pid=$productId";
    
        if ($db->getConnection()->query($sql) === TRUE) {
          
          echo "Record updated successfully";
        $db->getConnection()->close();
          
          return true;
        } else {
          echo "Error updating record: " . $this->db->connection->error;
        $db->getConnection()->close();
          
          return false;
        }
    }

    public function editProductRate($productId, $newRate)
    {
        $db=new DBController;
        $db->openConnection();
        $sql = "UPDATE product SET rate = '$newRate' WHERE pid=$productId";
    
        if ($db->getConnection()->query($sql) === TRUE) {
          
          echo "Record updated successfully";
        $db->getConnection()->close();
          
          return true;
        } else {
          echo "Error updating record: " . $this->db->connection->error;
        $db->getConnection()->close();
          
          return false;
        }
    }
    public function editProductRoll($productId, $newRoll)
    {
        $db=new DBController;
        $db->openConnection();
        $sql = "UPDATE product SET roll = '$newRoll' WHERE pid =$productId";
    
        if ($db->getConnection()->query($sql) === TRUE) {
          
          echo "Record updated successfully";
        $db->getConnection()->close();
          
          return true;
        } else {
          echo "Error updating record: " . $this->db->connection->error;
        $db->getConnection()->close();
          
          return false;
        }
    }

    public function editProfileName($profileId, $newName)
    {
        $db=new DBController;
        $db->openConnection();
        $sql = "UPDATE users SET username= '$newName' WHERE userid=$profileId";
    
        if ($db->getConnection()->query($sql) === TRUE) {
          
          echo "Record updated successfully";
        $db->getConnection()->close();
          
          return true;
        } else {
          echo "Error updating record: " . $this->db->connection->error;
        $db->getConnection()->close();
          
          return false;
        }
    }
    public function editProfileEmail($profileId, $newEmail)
    {
        $db=new DBController;
        $db->openConnection();
        $sql = "UPDATE users SET email= '$newEmail' WHERE userid=$profileId";
    
        if ($db->getConnection()->query($sql) === TRUE) {
          
          echo "Record updated successfully";
        $db->getConnection()->close();
          
          return true;
        } else {
          echo "Error updating record: " . $this->db->connection->error;
        $db->getConnection()->close();
          
          return false;
        }
    }
    public function editProfilePassword($profileId, $newPassword)
    {
        $db=new DBController;
        $db->openConnection();
        $sql = "UPDATE users SET password = '$newPassword' WHERE userid=$profileId";
    
        if ($db->getConnection()->query($sql) === TRUE) {
          
          echo "Record updated successfully";
        $db->getConnection()->close();
          
          return true;
        } else {
          echo "Error updating record: " . $this->db->connection->error;
        $db->getConnection()->close();
          
          return false;
        }
    }
    public function editProfilePhone($profileId, $newPhone)
    {
        $db=new DBController;
        $db->openConnection();
        $sql = "UPDATE users SET phone= '$newPhone' WHERE userid=$profileId";
    
        if ($db->getConnection()->query($sql) === TRUE) {
          
          echo "Record updated successfully";
        $db->getConnection()->close();
          
          return true;
        } else {
          echo "Error updating record: " . $this->db->connection->error;
        $db->getConnection()->close();
          
          return false;
        }
    }
    public function editProfileRole($profileId, $newRole)
    {$db=new DBController;
        $db->openConnection();
        $sql = "UPDATE users SET role= '$newRole' WHERE userid=$profileId";
    
        if ($db->getConnection()->query($sql) === TRUE) {
          
          echo "Record updated successfully";
        $db->getConnection()->close();
          
          return true;
        } else {
          echo "Error updating record: " . $this->db->connection->error;
        $db->getConnection()->close();
          
          return false;
        }
    }
}
