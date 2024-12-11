<?php

namespace App\Models;

use App\Helpers\NotificationHelper;

class OrderDetail extends BaseModel
{
    protected $table = 'order_details';
    protected $id = 'id';

    public function getAllOrder()
    {
        return $this->getAll();
    }

    public function getOrderDetailById($id)
    {
        // join thêm bản product để lấy thông tin sản phẩm
        $sql = "SELECT od.*, p.name as product_name, p.price as product_price, p.image as product_image FROM $this->table od JOIN products p ON od.product_id = p.id WHERE od.order_id = ?";
        $conn = $this->_conn->MySQLi();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

    }

    public function createOrderDetail($data)
    {
        $sql = "INSERT INTO $this->table (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)";
        $conn = $this->_conn->MySQLi();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('iiid', $data['order_id'], $data['product_id'], $data['quantity'], $data['price']);
        $stmt->execute();
        return $stmt->insert_id;
    }

}