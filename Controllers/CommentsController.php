<?php
require_once('../../Models/comment.php');

class CommentsController{

    protected $db;


    public function AddComment($comment, $commenterid, $productid){
        $this->db = new DBcontroller;
        if ($this->db->openConnection()) {
            $stmt = $this->db->getConnection()->prepare("INSERT INTO comments (commenttext, commenterid, productid)  VALUES (?, ?, ?)");
            if ($stmt) {
                $stmt->bind_param("sss", $comment, $commenterid, $productid);
                if ($stmt->execute()) {
                    return true;
                } else {
                    echo "Error executing statement: " . $stmt->error;
                    return false;
                }
                $stmt->close();
            } else {
                echo "Error preparing statement: " . $this->db->getConnection()->error;
            }
            $this->db->closeConnection();
        } else {
            echo "Error: Could not connect to the database";
        }
    }

    function getcommentsForProduct($productId) {
        $this->db = new DBcontroller;
        $comment = array();
        if ($this->db->openConnection()) {
        $query = "  SELECT comments.commentid,comments.commenttext, users.username,comments.commenterid
                    FROM comments 
                    INNER JOIN users ON comments.commenterid = users.userid 
                    WHERE comments.productid = ?";
        $stmt =  $this->db->getConnection()->prepare($query);
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $comment[] = $row;
        }
        $stmt->close();
        }
        return $comment;
    }
    public function updateComment($commentId, $newComment) {
        $this->db = new DBcontroller;
        if ($this->db->openConnection()) {
            $stmt = $this->db->getConnection()->prepare("UPDATE comments SET commenttext = ? WHERE commentId = ?");
            if ($stmt) {
                $stmt->bind_param("si", $newComment, $commentId);
                if ($stmt->execute()) {
                    return true;
                } else {
                    echo "Error executing statement: " . $stmt->error;
                    return false;
                }
                $stmt->close();
            } else {
                echo "Error preparing statement: " . $this->db->connection->error;
            }
            $this->db->closeConnection();
        } else {
            echo "Error: Could not connect to the database";
        }
    }
}
?>
