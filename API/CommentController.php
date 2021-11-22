<?php

require_once 'model/CommentModel.php';
require_once 'view/CommentView.php';

class CommentController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new CommentModel;
        $this->view = new CommentView;
    }

    public function getComments($params = [])
    {
        if (empty($params)) {
            $comments = $this->model->getComments();
            $this->view->response($comments, 200);
        } else {
            $comment = $this->model->getComment($params[":ID"]);
            $this->view->response($comment, 200);
        }
    }

    public function test()
    {
        echo "hi";
    }
}
