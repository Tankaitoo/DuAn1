<?php

namespace App\Models;

use App\Helpers\NotificationHelper;

class Order extends BaseModel
{
    protected $table = 'orders';
    protected $id = 'id';

    public function getAllOrder()
    {
        return $this->getAll();
    }

    public function createOrder($data)
    {
        $sql = "INSERT INTO $this->table (name, address, phone, payment_method, total, user_id) VALUES (?, ?, ?, ?, ?, ?)";
        $conn = $this->_conn->MySQLi();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssi', $data['name'], $data['address'], $data['phone'], $data['payment_method'], $data['total'], $data['user_id']);
        $stmt->execute();
        return $stmt->insert_id;
    }

}