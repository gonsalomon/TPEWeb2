<?php

class CommentModel
{
    private $db;
    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=mueble;charset=utf8', 'root', '');
    }

    function getComments($postID = null)
    {
        $sentencia = $this->db->prepare("SELECT * FROM comments WHERE mueble_id=?");
        $sentencia->execute(array($postID));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getComment($id)
    {
        $sentencia = $this->db->prepare("SELECT * FROM comments WHERE id=?");
        $sentencia->execute(array($id));
        $comment = $sentencia->fetch(PDO::FETCH_OBJ);

        return $comment;
    }

    public function addComment($text, $muebleId, $userMail, $puntaje)
    {
        
        $sentencia = $this->db->prepare("INSERT INTO comments(comment, mueble_id, user_mail, puntaje) VALUES(?, ?, ?, ?)");
        $sentencia->execute(array($text, $muebleId, $userMail, $puntaje));
    }

    public function delComment($id)
    {
        $s = $this->db->prepare("DELETE FROM comments WHERE id=?");
        $s->execute([$id]);
    }

    public function editComment($id, $text, $puntaje)
    {
        $s = $this->db->prepare("UPDATE comments SET comment = ?, puntaje = ? WHERE id=?");
        $s->execute(array($text, $puntaje, $id));
    }
}
