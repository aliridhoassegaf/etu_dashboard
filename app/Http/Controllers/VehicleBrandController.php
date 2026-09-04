<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Helpers\ApiHelper;

class VehicleBrandController extends Controller
{
    public function view($id)
    {
        if (!session()->has('token')) {
            return redirect('/');
        }

        $permissions = session('permissions', []);
        if (!in_array('vehicle_brand.read', $permissions)) {
            abort(404);
        }

        $response = ApiHelper::get('/vehicle-brand/' . $id);
        if (!$response['status']) {
            abort(404);
        }

        $data = $response['data'];

        return view('pages.vehicle_brand.vehicle_brand_view', [
            'title' => 'View Vehicle Brand',
            'route' => 'vehicle-brand/view',
            'result' => $data
        ]);
    }
    public function read(Request $request)
    {
        if (!session()->has('token')) {
            return redirect('/');
        }
        $permissions = session('permissions', []);
        if (!in_array('vehicle_brand.read', $permissions)) {
            abort(404);
        }

        $params = $request->all();
        // $params['per_page'] = $request->per_page ?? 1;

        $data = ApiHelper::get('/vehicle-brand', $params);

        return view('pages.vehicle_brand.vehicle_brand_read', [
            'title' => 'Vehicle Brands',
            'route' => 'vehicle-brand/read',
            'result' => $data['data'] ?? [],
            'data_state' => $data['data_state'],
            'pagination' => $data['pagination'] ?? [],
        ]);

    }
}


