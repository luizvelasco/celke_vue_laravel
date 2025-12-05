<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    // Listar os usuários
    public function index()  
    {   
        // Recuperar os registros do banco de dados
        $users = User::orderBy('id', 'DESC')->paginate(10);

        // Enviar os dados diretamente para a View
        return Inertia::render('users/Index', [
            'users' => $users
        ]);
    }

    // Visualizar os detalhes do usuário
    public function show(User $user)
    {
        // Enviar os dados diretamente para a View
        return Inertia::render('users/Show', [
            'user' => $user
        ]);
    }

    // Carregar o formulário cadastrar usuário
    public function create()
    {
        return Inertia::render('users/Create');
    }
}
