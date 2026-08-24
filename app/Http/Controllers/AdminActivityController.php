<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Helpers\ApiHelper;

class AdminActivityController extends Controller
{
    public function read(Request $request)
    {
        if (!session()->has('token')) {
            return redirect('/');
        }
        $permissions = session('permissions', []);
        if (!in_array('admin_activity.read', $permissions)) {
            abort(404);
        }

        $params = $request->all();
        // $params['per_page'] = $request->per_page ?? 1;

        $data = ApiHelper::get('/admin-activity', $params);

        $admin = ApiHelper::get('/admin');

        return view('pages.admin_activity.admin_activity_read', [
            'title' => 'Admin Activities',
            'route' => 'admin-activity/read',
            'result' => $data['data'] ?? [],
            'data_state' => $data['data_state'],
            'pagination' => $data['pagination'] ?? [],
            'admin' => $admin['data'] ?? [],
        ]);

    }
}


