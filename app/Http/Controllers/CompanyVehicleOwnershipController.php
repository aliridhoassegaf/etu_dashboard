<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Helpers\ApiHelper;

class CompanyVehicleOwnershipController extends Controller
{

    public function view($id)
    {
        if (!session()->has('token')) {
            return redirect('/');
        }

        $permissions = session('permissions', []);
        if (!in_array('company_vehicle_ownership.read', $permissions)) {
            abort(404);
        }

        $response = ApiHelper::get('/company-vehicle-ownership/' . $id);
        if (!$response['status']) {
            abort(404);
        }

        $data = $response['data'];

        return view('pages.company_vehicle_ownership.company_vehicle_ownership_view', [
            'title' => 'View Company Vehicle Ownership',
            'result' => $data
        ]);
    }
    public function read(Request $request)
    {
        if (!session()->has('token')) {
            return redirect('/');
        }
        $permissions = session('permissions', []);
        if (!in_array('company_vehicle_ownership.read', $permissions)) {
            abort(404);
        }

        $params = $request->all();
        // $params['per_page'] = $request->per_page ?? 1;

        $data = ApiHelper::get('/company-vehicle-ownership', $params);

        return view('pages.company_vehicle_ownership.company_vehicle_ownership_read', [
            'title' => 'Vehicle Ownership',
            'route' => 'company-vehicle-ownership/read',
            'result' => $data['data'] ?? [],
            'data_state' => $data['data_state'],
            'pagination' => $data['pagination'] ?? [],
        ]);

    }
}


