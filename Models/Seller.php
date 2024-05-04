<?php
require_once '../../online_shipping/Controllers/DBcontroller.php';
require_once '../../online_shipping/Controllers/Editor.php';
$dbController = new DBController();
$dbController->openConnection();
$edit = new Editor();
class Seller extends User
{

    public function register($role)
    {
        $db = new DBController;
        if ($db->openConnection()) {
            $query = "insert into users values ('','$this->name','$this->email','$this->password','$this->phone','$role','active')";
            $result = $db->insert($query);
            if ($result != false) {
                session_start();
                $_SESSION["userid"] = $result;
                $_SESSION["username"] = $this->name;
                $_SESSION["userrole"] = $role;
                $db->closeConnection();
                return true;
            } else {
                $_SESSION["errMsg"] = "Somthing went wrong... try again later";
                $db->closeConnection();
                return false;
            }
        } else {
            echo "Error in Database Connection";
            return false;
        }
    }

    public function addProduct($productName, $price, $category, $brand, $image, $description, $sellerid, $roll)
    {
        $db = new DBController;
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
        $db = new DBController;
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
    public function updateProduct($feild, $productId, $newValue)
    {
        $e = new Editor;
        switch ($feild) {
            case "pname":
                $e->editProductName($productId, $newValue);
                break;
            case "price":
                $e->editProductPrice($productId, $newValue);
                break;
            case "categroy":
                $e->editProductCategory($productId, $newValue);
                break;
            case "description":
                $e->editProductDescription($productId, $newValue);
                break;
            case "image":
                $e->editProductImage($productId, $newValue);
                break;
            case "brand":
                $e->editProductBrand($productId, $newValue);
                break;
            case "rate":
                $e->editProductRate($productId, $newValue);
                break;
            case "roll":
                $e->editProductRoll($productId, $newValue);
                break;
        }
    }
    public function updateProfile($feild, $productId, $newValue)
    {
        $e = new Editor;
        switch ($feild) {
            case "usernamename":
                $e->editProfileName($productId, $newValue);
                break;
            case "email":
                $e->editProfileEmail($productId, $newValue);
                break;
            case "password":
                $e->editProfilePassword($productId, $newValue);
                break;
            case "phone":
                $e->editProfilePhone($productId, $newValue);
                break;
            case "role":
                $e->editProfileRole($productId, $newValue);
                break;
        }
    }
    public function replayComments()
    {
    }
}


class User
{
    protected $id;
    protected $name;
    protected $email;
    protected $password;
    protected $phone;
    protected $role;

    public function setname($name)
    {
        $this->name = $name;
    }
    public function setemail($email)
    {
        $this->email = $email;
    }
    public function setpassword($pass)
    {
        $this->password = $pass;
    }
    public function setphone($phone)
    {
        $this->phone = $phone;
    }
    public function getname()
    {
        return $this->name;
    }
    public function getemail()
    {
        return $this->email;
    }
    public function getpassword()
    {
        return $this->password;
    }
    public function getphone()
    {
        return $this->phone;
    }
    public function setid($id)
    {
        $this->phone = $id;
    }
    public function getid()
    {
        return $this->id;
    }
    public function setrole($role)
    {
        $this->phone = $role;
    }
    public function getrole()
    {
        return $this->role;
    }


    public function login()
    {
        $db = new DBcontroller;
        if ($db->openConnection()) {
            $query = "select userid ,username ,password , role from users where username = '$this->name'";
            $result = $db->select($query);
            if ($result != false) {
                if ($result[0]["password"] == $this->password) {
                    $query = "update users set loginstatus = 'active' where username = '$this->name'";
                    $db->insert($query);
                    session_start();
                    $_SESSION["userid"] = $result['userid'];
                    $_SESSION["username"] = $result['username'];
                    $_SESSION["userrole"] = $result['role'];
                    $db->closeConnection();
                    return true;
                } else {
                    echo "<div class=\"alert alert-danger alert-dismissible py-3\">
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                Error :password is worng </div>";
                    $db->closeConnection();
                    return false;
                }
            } else {
                echo "<div class=\"alert alert-danger alert-dismissible py-3\">
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        Error :user not found </div>";
                $db->closeConnection();
                return false;
            }
        } else {
            echo "<div class=\"alert alert-danger alert-dismissible py-3\">
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
            Error : Database Connection</div>";
            return false;
        }
    }

    public function logout()
    {
        $db = new DBcontroller;
        if ($db->openConnection()) {
            $query = "update users set loginstatus = 'disactive' where username = '$this->name'";
            $db->insert($query);
        } else {
            echo "<div class=\"alert alert-danger alert-dismissible py-3\">
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
            Error : Database Connection</div>";
            return false;
        }
    }
}
