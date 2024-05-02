<?php
require_once('../../controllers/DBcontroller.php');


class comment{
    private $commentId;
    private $commentText;
    private $commenter;


    public function setcommentText($comment)
    {
        $this->commentText= $comment;
    }
    public function getcommentText()
    {
        return $this->commentText;
    }
}
?>
