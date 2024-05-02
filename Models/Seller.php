<?php
require_once("../Controllers/DBcontroller.php");
require_once("../Controllers/EditProduct.php");
$dbController = new DBController();
$dbController->openConnection();
class Seller extends Editor
{
    private $dbController;
    private $name;
    private $email;

    private $password;
    private $phone;

    public function register($role,$name , $email , $password , $phone)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;

        $db=new DBController;
        if($db->openConnection()){
            $query="insert into users values ('','$name','$email','$password','$phone','$role','active')";
            $result=$db->insert($query);
            if($result!=false)
            {
                session_start();
                $_SESSION["userid"]=$result;
                $_SESSION["username"]=$this->name;
                $_SESSION["userrole"]=$role;
                $db->closeConnection();
                return true;
            }
            else
            {
                $_SESSION["errMsg"]="Somthing went wrong... try again later";
                $db->closeConnection();
                return false;
            }
        }
        else
        {
            echo "Error in Database Connection";
            return false;
        }
    }
    
    public function addProduct($productName, $price, $category, $brand, $image, $description, $sellerid, $roll)
    {
        $db=new DBController;
        $db->openConnection();
        if ($db->getConnection() === null) {
            echo "Database connection is not established.";
            return;
        }

        $sql = "INSERT INTO product (pname, price, category, brand, image, description, sellerid, roll) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $db->getConnection()->prepare($sql);

        $stmt->bind_param("sdsdssii", $productName, $price, $category, $brand, $image, $description, $sellerid, $roll);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Product added successfully.";
        } else {
            echo "Error adding product: " . $db->getConnection()->error;
        }

        $stmt->close();
    }   

    public function removeProduct($productId)
    {
        $db=new DBController;
        $db->openConnection();
        if ($db->getConnection() === null) {
            echo "Database connection is not established.";
            return;
        }

        $sql = "DELETE FROM product WHERE pid = ?";
        $stmt = $db->getConnection()->prepare($sql);

        $stmt->bind_param("i", $productId);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Product removed successfully.";
        } else {
            echo "Error removing product: " . $db->getConnection()->error;
        }

        $stmt->close();
    }
    public function replayComments(){}
}
