<?php

namespace App\Contracts;

interface ProductServiceInterface
{
    
    public function create($data);

    public function read($id);

    public function update($id, $data);

    public function delete($id);

    public function list(?int $limit);
}