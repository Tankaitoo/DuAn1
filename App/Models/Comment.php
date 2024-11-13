<?php

namespace App\Models;

class Comment extends BaseModel
{
    protected $table = 'comments';
    protected $id = 'id';

    public function getAllComment()
    {
        return $this->getAll();
    }
    public function getOneComment($id)
    {
        return $this->getOne($id);
    }

    public function createComment($data)
    {
        return $this->create($data);
    }
    public function updateComment($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteComment($id)
    {
        return $this->delete($id);
    }
    public function getAllCommentByStatus()
    {
        return $this->getAllByStatus();
    }

    public function getOneCommentByName($name){
        return $this->getOneByName($name);
    }

    public function getAllCommentJoinAndUser()
    {
        $result = [];
        try {
            $sql = "SELECT comments.*, products.name 
            AS product_name, users.username 
            FROM comments 
            INNER JOIN products 
            ON comments.produced_id=products.id 
            INNER JOIN users 
            ON comments.user_id=users.id;";
            
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    public function getOneCommentJoinProductAndUser(int $id)
    {

        $result = [];
        try {
            $sql = "SELECT comments.*, products.name 
            AS product_name, users.username 
            FROM comments 
            INNER JOIN products 
            ON comments.produced_id=products.id 
            INNER JOIN users 
            ON comments.user_id=users.id
            WHERE comments.id=?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            $stmt->bind_param('i', $id);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị chi tiết dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    public function get5CommentNewestByProductAndStatus(int $id)
    {
        $result = [];
        try {
            $sql = "SELECT comments.*,users.username, users.name, users.avatar
            FROM comments 
            INNER JOIN users 
            ON comments.user_id=users.id 
            WHERE comments.produced_id=?
            AND comments.status=" . self::STATUS_ENABLE . "
            ORDER BY date DESC LIMIT 5;";

            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            $stmt->bind_param('i', $id);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị chi tiết dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }
    public function countTotalComment(){
        return $this->countTotal();
    }
}
