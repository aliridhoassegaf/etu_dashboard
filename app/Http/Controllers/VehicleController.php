<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Helpers\ApiHelper;

class VehicleController extends Controller
{
    public function view($id)
    {
        if (!session()->has('token')) {
            return redirect('/');
        }

        $permissions = session('permissions', []);
        if (!in_array('vehicle.read', $permissions)) {
            abort(404);
        }

        $response = ApiHelper::get('/vehicle/' . $id);
        if (!$response['status']) {
            abort(404);
        }

        $data = $response['data'];

        return view('pages.vehicle.vehicle_view', [
            'title' => 'View Vehicle',
            'route' => 'vehicle/view',
            'result' => $data
        ]);
    }
    public function read(Request $request)
    {
        if (!session()->has('token')) {
            return redirect('/');
        }
        $permissions = session('permissions', []);
        if (!in_array('vehicle.read', $permissions)) {
            abort(404);
        }

        $params = $request->all();
        // $params['per_page'] = $request->per_page ?? 1;

        $data = ApiHelper::get('/vehicle', $params);

        $vehicleModel = ApiHelper::get('/vehicle-model');
        $vehicleBrand = ApiHelper::get('/vehicle-brand');
        $vehicleSupplier = ApiHelper::get('/vehicle-supplier');
        $vehicleColor = ApiHelper::get('/vehicle-color',[
            "with_sort"=>1
        ]);
        $vehicleStatus = ApiHelper::get('/vehicle-status',[
            "with_sort"=>1
        ]);
        $vehicleType = ApiHelper::get('/vehicle-type',[
            "with_sort"=>1
        ]);
        $companyPool = ApiHelper::get('/company-pool');

        return view('pages.vehicle.vehicle_read', [
            'title' => 'Vehicle',
            'route' => 'vehicle/read',
            'result' => $data['data'] ?? [],
            'data_state' => $data['data_state'],
            'pagination' => $data['pagination'] ?? [],
            'vehicleModel' => $vehicleModel['data'] ?? [],
            'vehicleBrand' => $vehicleBrand['data'] ?? [],
            'vehicleSupplier' => $vehicleSupplier['data'] ?? [],
            'vehicleColor' => $vehicleColor['data'] ?? [],
            'vehicleStatus' => $vehicleStatus['data'] ?? [],
            'vehicleType' => $vehicleType['data'] ?? [],
            'companyPool' => $companyPool['data'] ?? [],
        ]);

    }
}


