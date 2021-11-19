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
        if (!isset($_SESSION["USERNAME"])) {
            session_start();
        }
        if (!empty($_SESSION["USERNAME"])) {
            $this->smarty->assign('admin', $_SESSION["ADMIN"]);
            $this->smarty->assign('user', $_SESSION['USERNAME']);
            $this->smarty->assign('titulo', 'Lista de usuarios');
            $this->smarty->assign('users', $users);
            $this->smarty->display('templates/usersTable.tpl');
        }
        else
        {
            $this->smarty->assign('titulo', 'Lista de usuarios');
            $this->smarty->assign('users', $users);
            $this->smarty->display('templates/usersTable.tpl');
            $this->smarty->assign('admin', false);
            $this->smarty->assign('user', false);
        }
    }
}
