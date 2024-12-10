<?php

namespace App\Models;

class Product extends BaseModel
{
    protected $table = 'products';
    protected $id = 'id';

    // Lấy tất cả sản phẩm
    public function getAllProduct()
    {
        return $this->getAll();
    }

    // Lấy một sản phẩm theo ID
    public function getOneProduct($id)
    {
        return $this->getOne($id);
    }

    // Thêm sản phẩm
    public function createProduct($data)
    {
        return $this->create($data);
    }

    // Cập nhật sản phẩm
    public function updateProduct($id, $data)
    {
        return $this->update($id, $data);
    }

    // Xóa sản phẩm
    public function deleteProduct($id)
    {
        return $this->delete($id);
    }
    public function getProductsByPage(int $page, int $limit)
{
    $offset = ($page - 1) * $limit;
    return $this->getPaginatedProducts($offset, $limit);
}

public function countAllProducts()
{
    return $this->countTotalProducts();
}


    // Lấy tất cả sản phẩm có trạng thái `ENABLE`
    public function getAllProductByStatus()
    {
        $result = [];
        try {
            $sql = "SELECT products.* 
                    FROM products 
                    INNER JOIN categories 
                    ON products.category_id = categories.id 
                    WHERE products.status = " . self::STATUS_ENABLE . "
                    AND categories.status = " . self::STATUS_ENABLE;

            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    // Lấy sản phẩm theo tên
    public function getOneProductByName($name)
    {
        return $this->getOneByName($name);
    }

    // Lấy tất cả sản phẩm kèm thông tin danh mục
    public function getAllProductJoinCategory()
    {
        $result = [];
        try {
            $sql = "SELECT products.*, categories.name AS category_name 
                    FROM products 
                    INNER JOIN categories 
                    ON products.category_id = categories.id;";
                    
            
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    // Lấy sản phẩm theo danh mục và trạng thái
    public function getAllProductByCategoryAndStatus(int $id)
    {
        $result = [];
        try {
            $sql = "SELECT products.*, categories.name AS category_name
                    FROM products 
                    INNER JOIN categories 
                    ON products.category_id = categories.id 
                    WHERE products.status = " . self::STATUS_ENABLE . "
                    AND categories.status = " . self::STATUS_ENABLE . " 
                    AND products.category_id = ?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $id);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    // Lấy một sản phẩm theo ID và trạng thái
    public function getOneProductByStatus(int $id)
    {
        $result = [];
        try {
            $sql = "SELECT products.*, categories.name AS category_name
                    FROM products 
                    INNER JOIN categories 
                    ON products.category_id = categories.id 
                    WHERE products.status = " . self::STATUS_ENABLE . "
                    AND categories.status = " . self::STATUS_ENABLE . " 
                    AND products.id = ?";
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

    // Đếm tổng sản phẩm
    public function countTotalProduct()
    {
        return $this->countTotal();
    }

    // Đếm sản phẩm theo danh mục
    public function countProductByCategory()
    {
        $result = [];
        try {
            $sql = "SELECT COUNT(*) AS count, categories.name 
                    FROM products 
                    INNER JOIN categories 
                    ON products.category_id = categories.id
                    GROUP BY products.category_id;";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    // Lấy sản phẩm với phân trang
    public function getPaginatedProducts(int $offset, int $limit)
    {
        $result = [];
        try {
            $sql = "SELECT products.*, categories.name AS category_name 
                    FROM products 
                    INNER JOIN categories 
                    ON products.category_id = categories.id 
                    LIMIT ?, ?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ii', $offset, $limit);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            return $result;
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị dữ liệu phân trang: ' . $th->getMessage());
            return $result;
        }
    }

    // Đếm tổng số sản phẩm
    public function countTotalProducts()
    {
        try {
            $sql = "SELECT COUNT(*) AS total FROM products";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_assoc()['total'];
        } catch (\Throwable $th) {
            error_log('Lỗi khi đếm sản phẩm: ' . $th->getMessage());
            return 0;
        }
    }
}
