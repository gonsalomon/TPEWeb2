<?php

class AuthHelper
{
    public function __construct()
    {
        
    }
    public function checkAdmin()
    {
        if(isset($_SESSION['ADMIN']))
        {
            if($_SESSION['ADMIN'])
            {
                return true;
            }
        }
        echo "Access Denied";
        return false;
    }
}