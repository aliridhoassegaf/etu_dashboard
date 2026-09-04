<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Helpers\ApiHelper;

class VehicleModelController extends Controller
{
    public function view($id)
    {
        if (!session()->has('token')) {
            return redirect('/');
        }

        $permissions = session('permissions', []);
        if (!in_array('vehicle_model.read', $permissions)) {
            abort(404);
        }

        $response = ApiHelper::get('/vehicle-model/' . $id);
        if (!$response['status']) {
            abort(404);
        }

        $data = $response['data'];

        return view('pages.vehicle_model.vehicle_model_view', [
            'title' => 'View Vehicle Model',
            'route' => 'vehicle-model/view',
            'result' => $data,
        ]);
    }
    public function read(Request $request)
    {
        if (!session()->has('token')) {
            return redirect('/');
        }
        $permissions = session('permissions', []);
        if (!in_array('vehicle_model.read', $permissions)) {
            abort(404);
        }

        $params = $request->all();
        // $params['per_page'] = $request->per_page ?? 1;

        $data = ApiHelper::get('/vehicle-model', $params);

        $vehicleBrand = ApiHelper::get('/vehicle-brand');
        $vehicleFuel = ApiHelper::get('/vehicle-fuel');

        return view('pages.vehicle_model.vehicle_model_read', [
            'title' => 'Vehicle Models',
            'route' => 'vehicle-model/read',
            'result' => $data['data'] ?? [],
            'data_state' => $data['data_state'],
            'pagination' => $data['pagination'] ?? [],
            'vehicleBrand' => $vehicleBrand['data'] ?? [],
            'vehicleFuel' => $vehicleFuel['data'] ?? [],
        ]);

    }
}


