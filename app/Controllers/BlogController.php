<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\PostModel;

class BlogController extends BaseController
{
    public function index()
    {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getCategories();

        $data = [
            'title' => 'Create Post',
            'categories' => $categories
        ];

        return view('layouts/main_layout', $data)
            . view('partials/nav_view')
            . view('partials/header_view')
            . view('blog/create_blog_view')
            . view('partials/footer_view');
    }

    public function store()
    {
        $title = $this->request->getPost('title');
        $description = $this->request->getPost('description');
        $creation_date = $this->request->getPost('creation-date');
        $categorie_id = $this->request->getPost('categorie_id');

        $validationRules = [
            'title'         => 'required|min_length[3]',
            'description'   => 'required|min_length[10]',
            'creation-date' => 'required|valid_date',
            'categorie_id'  => 'required|integer',
            'img_url'       => 'uploaded[img_url]|is_image[img_url]|mime_in[img_url,image/jpg,image/jpeg,image/png,image/webp]|max_size[img_url,2048]'
        ];

        $validationMessages = [
            'title' => [
                'required'   => 'El título es obligatorio.',
                'min_length' => 'El título debe tener al menos 3 caracteres.'
            ],
            'description' => [
                'required'   => 'La descripción es obligatoria.',
                'min_length' => 'La descripción debe tener al menos 10 caracteres.'
            ],
            'creation-date' => [
                'required'   => 'La fecha de creación es obligatoria.',
                'valid_date' => 'La fecha no tiene un formato válido.'
            ],
            'categorie_id' => [
                'required' => 'Selecciona una categoría.',
                'integer'  => 'Categoría inválida.'
            ],
            'img_url' => [
                'uploaded'  => 'Debes subir una imagen.',
                'is_image'  => 'El archivo debe ser una imagen.',
                'mime_in'   => 'Solo se permiten imágenes JPG, JPEG, PNG o WEBP.',
                'max_size'  => 'La imagen no debe superar los 2MB.'
            ]
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $imgFile = $this->request->getFile('img_url');

        if ($imgFile->isValid() && !$imgFile->hasMoved()) {

            $newName = $imgFile->getRandomName();

            $uploadPath = FCPATH . 'img_posts';

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $imgFile->move($uploadPath, $newName);
            $img_url = 'img_posts/' . $newName;
        } else {
            $img_url = null;
        }

        $postModel = new PostModel();

        $newPostId = $postModel->createPost([
            'title'         => $title,
            'description'   => $description,
            'img_url'       => $img_url,
            'user_id'       => session('userId'),
            'categorie_id'  => $categorie_id,
            'creation_date' => $creation_date
        ]);

        if ($newPostId) {
            return redirect()->to('/home');
        } else {
            return redirect()->back()->withInput()->with('errors', ['No se pudo crear el post.']);
        }
    }

    public function edit($id)
    {
        $postModel = new PostModel();
        $categoryModel = new CategoryModel();

        $post = $postModel->getPostById($id);
        $categories = $categoryModel->getCategories();

        if (!$post) {
            return redirect()->to('/home');
        }

        $data = [
            'title' => 'Edit Post',
            'post' => $post,
            'categories' => $categories
        ];

        return view('layouts/main_layout', $data)
            . view('partials/nav_view')
            . view('partials/header_view')
            . view('blog/edit_blog_view')
            . view('partials/footer_view');
    }

    public function update()
    {
        $postModel = new PostModel();

        $id_post = $this->request->getPost('id');

        $validationRules = [
            'title'         => 'required|min_length[3]',
            'description'   => 'required|min_length[10]',
            'creation-date' => 'required|valid_date',
            'categorie_id'  => 'required|integer',
            'img_url'       => 'is_image[img_url]|mime_in[img_url,image/jpg,image/jpeg,image/png,image/webp]|max_size[img_url,2048]'
        ];

        $validationMessages = [
            'title' => [
                'required'   => 'El título es obligatorio.',
                'min_length' => 'El título debe tener al menos 3 caracteres.'
            ],
            'description' => [
                'required'   => 'La descripción es obligatoria.',
                'min_length' => 'La descripción debe tener al menos 10 caracteres.'
            ],
            'creation-date' => [
                'required'   => 'La fecha de creación es obligatoria.',
                'valid_date' => 'La fecha no tiene un formato válido.'
            ],
            'categorie_id' => [
                'required' => 'Selecciona una categoría.',
                'integer'  => 'Categoría inválida.'
            ],
            'img_url' => [
                'is_image' => 'El archivo debe ser una imagen.',
                'mime_in'  => 'Solo se permiten imágenes JPG, JPEG, PNG o WEBP.',
                'max_size' => 'La imagen no debe superar los 2MB.'
            ]
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $title = $this->request->getPost('title');
        $description = $this->request->getPost('description');
        $creation_date = $this->request->getPost('creation-date');
        $categorie_id = $this->request->getPost('categorie_id');

        $data = [
            'title'         => $title,
            'description'   => $description,
            'categorie_id'  => $categorie_id,
            'creation_date' => $creation_date
        ];


        $imgFile = $this->request->getFile('img_url');
        if ($imgFile && $imgFile->isValid() && !$imgFile->hasMoved()) {

            $newName = $imgFile->getRandomName();
            $uploadPath = FCPATH . 'img_posts/';

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $imgFile->move($uploadPath, $newName);
            $data['img_url'] = 'img_posts/' . $newName;


            $oldPost = $postModel->find($id_post);
            if (!empty($oldPost['img_url']) && file_exists(FCPATH . $oldPost['img_url'])) {
                unlink(FCPATH . $oldPost['img_url']);
            }
        }

        if ($postModel->update($id_post, $data)) {
            return redirect()->to('/home');
        } else {
            return redirect()->back()->withInput()->with('errors', ['No se pudo actualizar el post.']);
        }
    }

    public function delete($id)
    {

        $postModel = new PostModel();

        $post = $postModel->find($id);

        if (!$post) {
            return redirect()->to('/home');
        }

        if (!empty($post['img_url']) && file_exists(FCPATH . $post['img_url'])) {
            unlink(FCPATH . $post['img_url']);
        }

        if ($postModel->delete($id)) {
            return redirect()->to('/home');
        } else {
            return redirect()->to('/home')->with('errors', ['No se pudo eliminar el post.']);
        }
    }
}
