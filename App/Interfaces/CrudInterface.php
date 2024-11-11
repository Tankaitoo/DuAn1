<?php

namespace App\Interfaces;

interface CrudInterface
{

    /**
     * Phương thức getAll() dùng để lấy tất cả records
     * * @return array $record
     */
    public function getAll();

    /** 
     * Phương thức getOne() dùng để lấy một record
     * @param int $id
     * @return $record
     */
    public function getOne(int $id);

    /**
     * Phương thức create dùng để tạo mới dữ liệu
     * @return mixed
     */
    public function create(array $data);

    /**
     * Phương thức update dùng để cập nhật dữ liệu
     * @return 
     */
    public function update(int $id, array $data);

    /**
     * Phương thức delete dùng để xoá dữ liệu
     * @return 
     */
    public function delete(int $id): bool;
}
