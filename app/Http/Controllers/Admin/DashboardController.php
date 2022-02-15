<?php

namespace App\Http\Controllers\Admin;

use Active;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\IsAdmin;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __contruct()
    {
        return $this->middleware([IsAdmin::class, Authenticate::class]);
    }

    public function index()
    {
        return view('admin.dashboard.index');
    }

    public function getActiveUser()
    {
        $users = Active::users()->get();
        
        return view('admin.users.index', ['users' => $users]);
    }
}
