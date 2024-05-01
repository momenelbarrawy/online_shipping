<?php
require_once("User.php");
require_once("../../Controllers/DBcontroller.php");
class Buyer extends User
{
    
    private $adress;
    public function setadress($adress)
    {
        $this->adress = $adress;
    }
    public function getadress()
    {
        return $this->adress;
    }

    public function register($role)
    {
        $db=new DBController;
        if($db->openConnection()){
            $query="insert into users values ('','$this->name','$this->email','$this->password','$this->phone','$role','active')";
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

    public function addComment()
    {
    }
    public function manageAccount()
    {
    }
    public function makeOrder()
    {
    }
    public function search()
    {
    }
}
