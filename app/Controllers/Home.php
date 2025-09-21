<?php

namespace App\Controllers;

use App\Models\PostModel;

class Home extends BaseController
{
    public function index()
    {
        $postModel = new PostModel();
        $posts = $postModel->getPosts();

        $data = [
            'title' => 'Home',
            'posts' => $posts
        ];

        return view('layouts/main_layout', $data)
            . view('partials/nav_view')
            . view('partials/header_view')
            . view('blog/blog_view', $data)
            . view('partials/footer_view');
    }
}
