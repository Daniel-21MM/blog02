<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table      = 'posts';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title',
        'description',
        'img_url',
        'user_id',
        'categorie_id',
        'creation_date'
    ];

    public function createPost(array $data)
    {
        $this->insert($data);
        return $this->insertID();
    }

    public function getPosts()
    {
        return $this->select('posts.*, users.name as author, categories.name as category')
            ->join('users', 'users.id = posts.user_id', 'left')
            ->join('categories', 'categories.id = posts.categorie_id', 'left')
            ->orderBy('creation_date', 'ASC')
            ->findAll();
    }

    public function getPostById(int $id)
    {
        return $this->select('posts.*, users.name as author, categories.name as category')
            ->join('users', 'users.id = posts.user_id', 'left')
            ->join('categories', 'categories.id = posts.categorie_id', 'left')
            ->where('posts.id', $id)
            ->first();
    }
}
