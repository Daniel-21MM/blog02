<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Login'
        ];

        return view('layouts/main_layout', $data)
            . view('auth/login_view');
    }

    public function store()
    {

        $email = $this->request->getPost('email');
        $pass  = $this->request->getPost('password');

        $validationRules = [
            'email'    => 'required|valid_email',
            'password' => 'required|min_length[6]'
        ];

        if (! $this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $userModel = new UserModel();
        $user = $userModel->login($email, $pass);

        if (!$user) {
            return redirect()->back()->withInput()->with('errors', ['email' => 'Credenciales incorrectas']);
        }

        if (!$user['estatus']) {
            return redirect()->back()->withInput()->with('errors', ['email' => 'Tu cuenta está inactiva.']);
        }

        session()->set([
            'isLoggedIn' => true,
            'userId'     => $user['id'],
            'userName'   => $user['name'],
            'userEmail'  => $user['email']
        ]);

        return redirect()->to('/home');
    }

    public function insertUser()
    {
        $userModel = new UserModel();

        $data = [
            'name'     => 'administrador',
            'email'    => 'administrador@correo.com',
            'password' => password_hash('admin1234*', PASSWORD_DEFAULT),
            'estatus'  => 1
        ];

        if ($userModel->insert($data)) {
            return "Usuario creado correctamente.";
        } else {
            return $userModel->errors();
        }
    }
}
