<?php

require_once "./helpers/AuthHelper.php";

abstract class Controller 
{
    private $auth;
    public function __construct()
    {
        $this->auth = new AuthHelper;
    }

    public function checkAdmin()
    {
        return $this->auth->checkAdmin();
    }
}