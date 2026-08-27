<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Helpers\ApiHelper;

class VehicleSupplierController extends Controller
{
    public function view($id)
    {
        if (!session()->has('token')) {
            return redirect('/');
        }

        $permissions = session('permissions', []);
        if (!in_array('vehicle_supplier.read', $permissions)) {
            abort(404);
        }

        $response = ApiHelper::get('/vehicle-supplier/' . $id);
        if (!$response['status']) {
            abort(404);
        }

        $data = $response['data'];

        return view('pages.vehicle_supplier.vehicle_supplier_view', [
            'title' => 'View Vehicle Supplier',
            'result' => $data
        ]);
    }
    public function read(Request $request)
    {
        if (!session()->has('token')) {
            return redirect('/');
        }
        $permissions = session('permissions', []);
        if (!in_array('vehicle_supplier.read', $permissions)) {
            abort(404);
        }

        $params = $request->all();
        // $params['per_page'] = $request->per_page ?? 1;

        $data = ApiHelper::get('/vehicle-supplier', $params);

        return view('pages.vehicle_supplier.vehicle_supplier_read', [
            'title' => 'Vehicle Supplier',
            'route' => 'vehicle-supplier/read',
            'result' => $data['data'] ?? [],
            'data_state' => $data['data_state'],
            'pagination' => $data['pagination'] ?? [],
        ]);

    }
}


