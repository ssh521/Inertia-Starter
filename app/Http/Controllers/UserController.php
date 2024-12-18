<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
class UserController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->search;

        return Inertia::render('User/Index', [
            'users' => User::when($request->search, function ($query) use ($request) {
                return $query
                    ->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%');
            })->paginate(perPage: 15)->withQueryString(),
            'searchTerm' => $request->search,
        ]);
    }

    public function show(User $user)
    {
        return Inertia::render('User/Show', [
            'user' => $user,
        ]);
    }   

    public function edit(User $user)
    {
        return Inertia::render('User/Edit', [
            'user' => $user,
        ]);
    }
}
