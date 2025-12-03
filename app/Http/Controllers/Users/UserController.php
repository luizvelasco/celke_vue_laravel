<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()  
    {   
        // Recuperar os registros do banco de dados
        $users = User::orderBy('id', 'DESC')->paginate(10);

        // Enviar os dados diretamente para a View
        return Inertia::render('users/Index', [
            'users' => $users
        ]);
    }

    public function show(User $user)
    {
        // Enviar os dados diretamente para a View
        return Inertia::render('users/Show', [
            'user' => $user
        ]);
    }
}
