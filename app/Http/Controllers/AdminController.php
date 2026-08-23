<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Helpers\ApiHelper;

class AdminController extends Controller
{
    public function login()
    {
        return view('pages.admin.admin_login', [
            'title' => 'Login',
            'route' => 'admin/login',
        ]);
    }

    public function loginProcess(Request $request)
    {
        $result = ApiHelper::post('/admin-login', [
            'email' => $request->email,
            'password' => $request->password,
        ], true);

        if (!$result['status']) {
            return back()->withInput()->with('error', $result['message']);
        }

        $token = $result['data']['token'];
        $admin = $result['data']['admin'];

        $permissions = collect($admin['access'])
            ->pluck('name')
            ->toArray();

        session([
            'token' => $token,
            'admin' => $admin,
            'permissions' => $permissions
        ]);

        if (in_array('admin.read', $permissions)) {
            return redirect('/admin');
        }

        return back();
    }

    public function read(Request $request)
    {
        if (!session()->has('token')) {
            return redirect('/');
        }
        $permissions = session('permissions', []);
        if (!in_array('admin.read', $permissions)) {
            abort(404);
        }

        $data = ApiHelper::get('/admin', $request->all());

        return view('pages.admin.admin_read', [
            'title' => 'Admin',
            'route' => 'admin/read',
            'result' => $data['data'] ?? [],
            'pagination' => $data['pagination'] ?? [],
        ]);

    }
}


