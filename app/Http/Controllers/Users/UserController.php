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

    // Cadastrar o usuário no banco de dados
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ],
        [
            'name.required' => 'Campo nome é obrigatório',

            'email.required' => 'Campo e-mail é obrigatório',
            'email.email' => 'Necessário um e-mail válido',
            'email.required' => 'O e-mail já está cadastrado',

            'password.required' => 'Campo senha é obrigatório',
            'password.confirmed' => 'A confirmação de senha não corresponde',
            'password.min' => 'Campo com no mínimo :min caracteres!',
        ]);
        
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        return redirect()->route('users.show', ['user' => $user->id])->with('success', 'Usuário cadastrado com sucesso');
    }
}
