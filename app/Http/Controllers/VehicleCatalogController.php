<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Helpers\ApiHelper;

class VehicleCatalogController extends Controller
{
    public function view($id)
    {
        if (!session()->has('token')) {
            return redirect('/');
        }

        $permissions = session('permissions', []);
        if (!in_array('vehicle_catalog.read', $permissions)) {
            abort(404);
        }

        $response = ApiHelper::get('/vehicle-catalog/' . $id);
        if (!$response['status']) {
            abort(404);
        }

        $data = $response['data'];

        return view('pages.vehicle_catalog.vehicle_catalog_view', [
            'title' => 'View Vehicle Catalog',
            'result' => $data
        ]);
    }
    public function read(Request $request)
    {
        if (!session()->has('token')) {
            return redirect('/');
        }
        $permissions = session('permissions', []);
        if (!in_array('vehicle_catalog.read', $permissions)) {
            abort(404);
        }

        $params = $request->all();
        // $params['per_page'] = $request->per_page ?? 1;

        $data = ApiHelper::get('/vehicle-catalog', $params);

        return view('pages.vehicle_catalog.vehicle_catalog_read', [
            'title' => 'Vehicle Catalog',
            'route' => 'vehicle-catalog/read',
            'result' => $data['data'] ?? [],
            'data_state' => $data['data_state'],
            'pagination' => $data['pagination'] ?? [],
        ]);

    }
}


