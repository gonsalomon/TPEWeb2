<?php
require_once './view/AuthView.php';
require_once './model/AuthModel.php';

class AuthController
{
    private $model;
    private $view;

    function __construct()
    {
        $this->model = new AuthModel();
        $this->view = new AuthView();
    }

    function showLogin()
    {
        $this->view->showLogin();
    }

    function login ($username,$password)
    {
        $user = $this->model->seekUser($username);

        // encontró un user con el username que mandó, y tiene la misma contraseña
        if (!empty($user) && password_verify($password, $user->password)) {
            session_start();
            $_SESSION['ID_USER'] = $user->id;
            $_SESSION['USERNAME'] = $user->username;
            header('Location: admin');
        } else {
            $this->view->showLogin("Login incorrecto");
        }
    }

    function checkLoggedIn ()
    {
        session_start();
        if(!isset($_SESSION['ID_USER']))
        {
            header('Location: home');
        }else{
            return true;
        }
    }
}