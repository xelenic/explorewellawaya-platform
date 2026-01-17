<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users' => User::count(),
            'total_roles' => Role::count(),
            'total_permissions' => Permission::count(),
            'admin_users' => User::role('admin')->count(),
        ];

        $recent_users = User::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_users'));
    }
}
