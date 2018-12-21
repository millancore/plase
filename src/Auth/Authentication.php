<?php

namespace Plase\Auth;

class Authentication
{
    private $login;
    private $tranKey;
    private $seed;
    private $additional;
    private $auth;

    public function __construct(String $login, String $tranKey)
    {
        $this->login = $login;
        $this->tranKey = $tranKey;
        $this->setSeed();
        $this->setAuth();
    }

    private function setAuth()
    {
        $this->auth = [
            'login' => $this->login,
            'tranKey' => sha1($this->seed.$this->tranKey, false),
            'seed' => $this->seed
        ];
    }
    
    private function setSeed()
    {
        $this->seed = date('c');
    }

    public function getAuth()
    {
        return $this->auth;
    }
        
}