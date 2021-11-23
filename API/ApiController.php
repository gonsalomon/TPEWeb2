<?php

require_once 'view/ApiView.php';

abstract class ApiController
{
    protected $model; // lo instancia el hijo
    protected $view;
    private $data;

    public function __construct()
    {
        $this->view = new ApiView();
        $this->data = file_get_contents("php://input");
    }

    function getInfo()
    {
        return json_decode($this->data);
    }
}