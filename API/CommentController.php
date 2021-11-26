<?php

require_once 'model/CommentModel.php';
require_once 'view/ApiView.php';
require_once 'ApiController.php';
require_once './helpers/AuthHelper.php';
require_once './helpers/AuthHelper.php';

class CommentController extends ApiController
{
    private $auth;

    public function __construct()
    {
        parent::__construct();
        $this->model = new CommentModel;
        $this->auth = new AuthHelper;
        // $this->model->editComment(29, "Hello!", 4);
    }

    public function getComments($params = [])
    {
        $id = $params[":ID"];
        if ($id) 
        {
            $comment = $this->model->getComments($params[":ID"]);
            $this->view->response($comment, 200);
        }

    }

    public function getComment($params = [])
    {
        $id = $params[":ID"];
        if ($id) 
        {
            $comment = $this->model->getComment($id);
            $this->view->response($comment, 200);
        }
    }

    public function addComment($params = [])
    {
        $data = $this->getInfo();
        $text = $data->comment;
        $muebleId = $data->mueble_id;
        $userMail = $data->user_mail;
        $puntaje = $data->puntaje;

        if ($puntaje > 5)
        {
            $puntaje = 5;
        }

        session_start();
        if ($_SESSION['USERNAME'])
        {
            $newComment = $this->model->addComment($text, $muebleId, $_SESSION['USERNAME'], $puntaje);
            if ($newComment)
            {
                $this->view->response($newComment, 200);
            }
        }
    }

    public function delComment($params = [])
    {
        $id = $params[":ID"];
        session_start();
        $comentario = $this->model->getComment($id);
        if ($this->auth->checkAdmin() && $comentario)
        {
            $this->model->delComment($id);
            $this->view->response("Comment deleted", 200);
        }
        else 
        {
            $this->view->response("Access denied", 405);
        }
    }

    public function editComment($params = [])
    {
        $id = $params[":ID"];
        $data = $this->getInfo();
        $text = $data->comment;
        $puntaje = $data->puntaje;

        session_start();

        $comentario = $this->model->getComment($id);
        
        if ($comentario)
        {
            if ($_SESSION['USERNAME'] == $comentario->user_mail)
            {
                $uComment = $this->model->editComment($id, $text, $puntaje);
                $this->view->response($uComment, 200);
            }
            else {
                $this->view->response("Access denied", 405);
            }
        }
        else {
            $this->view->response("Element does not exist", 404);
        }
    }
}
