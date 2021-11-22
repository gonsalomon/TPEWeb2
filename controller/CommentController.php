<?php

require_once './API/model/CommentModel.php';
require_once './API/view/CommentView.php';

class CommentController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new CommentModel;
        $this->view = new CommentView;
    }

    public function get($params = [])
    {
        if (empty($params)) {
            $comments = $this->model->getComments();
            $this->view->response($comments, 200);
        } else {
            $comment = $this->model->getComment($params[0]);
        }
    }
}
