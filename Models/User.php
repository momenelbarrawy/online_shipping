<?php

class User
{
    protected $id;
    protected $name;
    protected $email;
    protected $password;
    protected $phone;

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


    public function login()
    {
    }

    public function logout()
    {
    }
}
