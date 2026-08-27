<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Helpers\ApiHelper;

class AdminRoleController extends Controller
{
    public function view($id)
    {
        if (!session()->has('token')) {
            return redirect('/');
        }

        $permissions = session('permissions', []);
        if (!in_array('admin_role.read', $permissions)) {
            abort(404);
        }

        $response = ApiHelper::get('/admin-role/' . $id);
        if (!$response['status']) {
            abort(404);
        }

        $data = $response['data'];

        return view('pages.admin_role.admin_role_view', [
            'title' => 'View Admin Role',
            'result' => $data
        ]);
    }
    public function read(Request $request)
    {
        if (!session()->has('token')) {
            return redirect('/');
        }
        $permissions = session('permissions', []);
        if (!in_array('admin_role.read', $permissions)) {
            abort(404);
        }

        $params = $request->all();
        // $params['per_page'] = $request->per_page ?? 1;

        $data = ApiHelper::get('/admin-role', $params);

        return view('pages.admin_role.admin_role_read', [
            'title' => 'Admin Roles',
            'route' => 'admin-role/read',
            'result' => $data['data'] ?? [],
            'data_state' => $data['data_state'],
            'pagination' => $data['pagination'] ?? [],
        ]);

    }
}


