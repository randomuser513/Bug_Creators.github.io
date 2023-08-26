<?php

class User {
    private $username;
    private $passwordHash;
    private $password; 
    private $email; 
    private $address; 



    function __construct($username, $passwordHash, $password, $email, $address) {
        $this->username = $username;
        $this->passwordHash = $passwordHash;
        $this->password = $password;
        $this->email = $email;
        $this->address = $address;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getPasswordHash(){
        return $this->passwordHash;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getAddress(){
        return $this->address;
    }

    public function setPasswordHash($hashed){
        $this->passwordHash = $hashed;
    }

}