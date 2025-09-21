<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table      = 'categories';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'estatus', 'created_at'];

    public function getCategories()
    {
        return $this->where('estatus', 1)
            ->findAll();
    }
}
