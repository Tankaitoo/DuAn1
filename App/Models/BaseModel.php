<?php

namespace App\Models;

use App\Helpers\NotificationHelper;
use App\Interfaces\CrudInterface;
use Exception;

abstract class BaseModel implements CrudInterface
{
    protected $_conn;

    protected $table;
    protected $id;

    const STATUS_ENABLE = 1;
    const STATUS_DISABLE = 0;


    public function __construct()
    {
        $this->_conn = new Database();
    }

    public function getAll()
    {
        $result = [];
        try {
            $sql = "SELECT * FROM $this->table";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }
    public function getOne(int $id)
    {
        $result = [];
        try {
            $sql = "SELECT * FROM $this->table WHERE $this->id=?";
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
    public function create(array $data)
    {
        // $sql ="INSERT INTO $this->table (name, description, status) VALUES ('category test', 'category test description', '1')";

        // $result = $this->_conn->connect()->query($sql);
        // return $result;

        try {
            $sql = "INSERT INTO $this->table (";
            foreach ($data as $key => $value) {
                $sql .= "$key, ";
            }
            // INSERT INTO $this->table (name, description, status, 
            $sql = rtrim($sql, ", ");
            // INSERT INTO $this->table (name, description, status
            $sql .=   " ) VALUES (";
            // INSERT INTO $this->table (name, description, status) VALUES (
            foreach ($data as $key => $value) {
                $sql .= "'$value', ";
            }

            // INSERT INTO $this->table (name, description, status) VALUES ('category test', 'category test description', '1', 
            $sql = rtrim($sql, ", ");
            // INSERT INTO $this->table (name, description, status) VALUES ('category test', 'category test description', '1'

            $sql .= ")";
            // INSERT INTO $this->table (name, description, status) VALUES ('category test', 'category test description', '1')

            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            return $stmt->execute();
        } catch (\Throwable $th) {
            error_log('Lỗi khi thêm dữ liệu: ' . $th->getMessage());
            return false;
        }
    }
    public function update(int $id, array $data)
    {
        try {
            $sql = "UPDATE $this->table SET ";
            foreach ($data as $key => $value) {
                $sql .= "$key = '$value', ";
            }
            $sql = rtrim($sql, ", ");

            $sql .= " WHERE $this->id=$id";

            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            return $stmt->execute();
        } catch (\Throwable $th) {
            error_log('Lỗi khi cập nhật dữ liệu: ', $th->getMessage());
            return false;
        }
    }
    public function delete(int $id): bool
    {
        try {
            $sql = "DELETE FROM $this->table WHERE $this->id=$id";

            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            // trả về số hàng dữ liệu bị ảnh hưởng
            return $stmt->affected_rows;
        } catch (\Throwable $th) {
            error_log('Lỗi khi xóa dữ liệu: ' . $th->getMessage());
            return false;
        }
    }

    public function getAllByStatus()
    {
        $sql = "SELECT * FROM $this->table WHERE status=" . self::STATUS_ENABLE;
        $result = $this->_conn->MySQLi()->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
