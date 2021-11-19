<?php
require_once './lib/smarty-3.1.39/libs/Smarty.class.php';

class AuthView
{
    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->assign('BASE_URL', BASE_URL);
    }

    /*function showLogin() {
        $this->smarty->assign('titulo', 'Iniciar Sesión');
        $this->smarty->display('templates/login.tpl');
    }*/

    function showUsers($users)
    {
        $this->smarty->assign('titulo', 'Lista de usuarios');
        $this->smarty->assign('users', $users);
        $this->smarty->display('templates/usersTable.tpl');
    }
}
