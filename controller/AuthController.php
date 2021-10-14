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

    function verificarLogin(){
        $user = $_POST["userID"];
        $pass = $_POST["passID"];
        $userFromDB = $this->model->getUser($user);
        if(isset($userFromDB)){
            if (password_verify($pass, $userFromDB[0]["pass"])){
                session_start();
                $_SESSION["user"] = $user;
                //$_SESSION["admin"] = $userFromDB[0]["admin"];
                //$_SESSION["id_usuario"] = $userFromDB[0]["id_usuario"];
                header("Location:".homeadmin);
            }else{
              $this->view->mostrarLogin("Contraseña incorrecta");
            }
        }else{
          $this->view->mostrarLogin("No existe el usuario");
        }
  
    }

    function register($user, $pass)
    {
        $this->model->addUser($user, $pass);
    }
}