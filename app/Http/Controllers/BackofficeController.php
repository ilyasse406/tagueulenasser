<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class BackofficeController extends Controller
{
    public function index()
    {
        $users = User::paginate(3);
        $roles = Role::all();
        $articles = Article::paginate(3);
        return view("backoffice", compact("users", "roles","articles"));
    }
}
