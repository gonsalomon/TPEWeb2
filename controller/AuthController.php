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

    //IMPORTANTE no tocar esto, funciona perfecto, armado con el ayudante
    function showLogin()
    {
        $this->view->showLogin();
    }

    function auth ()
    {
        $user = $_POST['userID'];
        $pass = $_POST['passID'];
        
        if(isset($_POST['register']))
        {
            $userDB = $this->register($user,$pass);
        }
        else
        {
            $userDB = $this->model->getUser($user);
            if($userDB)
            {
                if (!password_verify($pass, $userDB->pass))
                {
                    $userDB = null;
                }
            }
        }
        if($userDB)
        {
            session_start();
            $_SESSION['ID_USER'] = $userDB->id;
            $_SESSION['USERNAME'] = $userDB->username;
            header('Location: admin');
        } else {
            $this->view->showLogin("Login incorrecto");
        }
    }
    //esto tampoco
    function register($user,$pass)
    {
        if((!empty($user)) && (!empty($pass)))
        {
            $userDB = $this->model->getUser($user);
            if($userDB==null){
                $hash = password_hash($pass, PASSWORD_BCRYPT);
                $this->model->addUser($user, $hash);
                return $this->model->getUser($user);
            }else{
              echo "Usuario ya existente";
            }
         }else{
           echo "Llenar todos los campos";
         }
    }

    function checkLoggedIn(){
        session_start();
        if (isset($_SESSION['USERNAME']))
        {
            header('Location: admin');
        }
        else
        {
            header('Location: home');
        }
        return true;
    }
}