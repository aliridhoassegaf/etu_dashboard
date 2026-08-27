<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Helpers\ApiHelper;

class CompanyPoolController extends Controller
{

    public function view($id)
    {
        if (!session()->has('token')) {
            return redirect('/');
        }

        $permissions = session('permissions', []);
        if (!in_array('company_pool.read', $permissions)) {
            abort(404);
        }

        $response = ApiHelper::get('/company-pool/' . $id);
        if (!$response['status']) {
            abort(404);
        }

        $data = $response['data'];

        return view('pages.company_pool.company_pool_view', [
            'title' => 'View Company Pool',
            'result' => $data
        ]);
    }
    public function read(Request $request)
    {
        if (!session()->has('token')) {
            return redirect('/');
        }
        $permissions = session('permissions', []);
        if (!in_array('company_pool.read', $permissions)) {
            abort(404);
        }

        $params = $request->all();
        // $params['per_page'] = $request->per_page ?? 1;

        $data = ApiHelper::get('/company-pool', $params);

        return view('pages.company_pool.company_pool_read', [
            'title' => 'Company Pool',
            'route' => 'company-pool/read',
            'result' => $data['data'] ?? [],
            'data_state' => $data['data_state'],
            'pagination' => $data['pagination'] ?? [],
        ]);

    }
}


