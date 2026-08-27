<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Helpers\ApiHelper;

class UserController extends Controller
{
    public function view($id)
    {
        if (!session()->has('token')) {
            return redirect('/');
        }

        $permissions = session('permissions', []);
        if (!in_array('user.read', $permissions)) {
            abort(404);
        }

        $response = ApiHelper::get('/user/' . $id);
        if (!$response['status']) {
            abort(404);
        }

        $data = $response['data'];

        return view('pages.user.user_view', [
            'title' => 'View User',
            'result' => $data
        ]);
    }
    public function read(Request $request)
    {
        if (!session()->has('token')) {
            return redirect('/');
        }
        $permissions = session('permissions', []);
        if (!in_array('user.read', $permissions)) {
            abort(404);
        }

        $params = $request->all();
        // $params['per_page'] = $request->per_page ?? 1;

        $data = ApiHelper::get('/user', $params);

        $userRoles = ApiHelper::get('/user-role');
        $userStatus = ApiHelper::get('/user-status',[
            "with_sort"=>1
        ]);

        return view('pages.user.user_read', [
            'title' => 'Driver Leads',
            'route' => 'user/read',
            'result' => $data['data'] ?? [],
            'data_state' => $data['data_state'],
            'pagination' => $data['pagination'] ?? [],
            'userRoles' => $userRoles['data'] ?? [],
            'userStatus' => $userStatus['data'] ?? [],
        ]);

    }
}


