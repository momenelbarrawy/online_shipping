<?php
require_once '../../Controllers/DBcontroller.php';
require_once("User.php");
class Admin extends User
{

    public function veiw_users()
    {
        $db = new DBcontroller;
        if ($db->openConnection()) {
            $query = "select userid,username,email ,role from users";
            $result = $db->select($query);
            if ($result != false) {
                return $result;
            }
        } else {
            echo "<div class=\"alert alert-danger alert-dismissible py-3\">
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
            Error : Database Connection</div>";
            return false;
        }
    }

    public function veiw_user()
    {
        $db = new DBcontroller;
        $id = $this->getid();
        if ($db->openConnection()) {
            $query = "select userid,username,email ,role from users where userid = '$id'";
            $result = $db->select($query);
            if ($result != false) {
                return $result;
            }
        } else {
            echo "<div class=\"alert alert-danger alert-dismissible py-3\">
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
            Error : Database Connection</div>";
            return false;
        }
    }

    public function veiw_buyers()
    {
        $db = new DBcontroller;
        if ($db->openConnection()) {
            $query = "select * from users where role = 'buyer'";
            $result = $db->select($query);
            if ($result != false) {
            }
        } else {
            echo "<div class=\"alert alert-danger alert-dismissible py-3\">
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
            Error : Database Connection</div>";
            return false;
        }
    }
    public function veiw_sellers()
    {
        $db = new DBcontroller;
        if ($db->openConnection()) {
            $query = "select * from users where role = 'seller'";
            $result = $db->select($query);
            if ($result != false) {
            }
        } else {
            echo "<div class=\"alert alert-danger alert-dismissible py-3\">
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
            Error : Database Connection</div>";
            return false;
        }
    }
    public function delete_users($id)
    {
        $db = new DBcontroller;
        if ($db->openConnection()) {
            $query = "delete from users where userid = '$id'";
            $result = $db->delete($query);
            if ($result != false) {
            }
        } else {
            echo "<div class=\"alert alert-danger alert-dismissible py-3\">
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
            Error : Database Connection</div>";
            return false;
        }
    }

    public function update_user()
    {
        $db = new DBcontroller;
        $id = $this->getid();
        $name = $this->getname();
        $email = $this->getemail();
        $role = $this->getrole();
        if ($db->openConnection()) {
            $query = "UPDATE users SET username = '$name', email = '$email', role = '$role' WHERE userid = '$id'";
            $result = $db->update($query);
            if ($result) {
                return true;
            }
        } else {
            echo "<div class=\"alert alert-danger alert-dismissible py-3\">
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                Error : Database Connection</div>";
            return false;
        }
    }
    public function showProfits()
    {
    }
}
