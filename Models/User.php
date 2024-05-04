<?php
require_once '../../Controllers/DBcontroller.php';
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
        $this->id = $id;
    }
    public function getid()
    {
        return $this->id;
    }
    public function setrole($role)
    {
        $this->role = $role;
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
