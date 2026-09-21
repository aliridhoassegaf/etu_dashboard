<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Helpers\ApiHelper;

class AssignmentController extends Controller
{

    public function create(Request $request)
    {
        if (!session()->has('token')) {
            return redirect('/');
        }

        $permissions = session('permissions', []);
        if (!in_array('assignment.read', $permissions)) {
            abort(404);
        }

        $vehicle = ApiHelper::get('/vehicle',[
            "status"=>1
        ]);
        $user = ApiHelper::get('/user',[
            "status_step"=>11
        ]);
        $assignmentStatus = ApiHelper::get('/assignment-status',[
            "status"=>1
        ]);
        $companyVehicleRentalPeriod = ApiHelper::get('/company-vehicle-rental-period',[
            "with_sort"=>1
        ]);

        return view('pages.assignment.assignment_create', [
            'title' => 'Create Assignment',
            'route' => 'assignment-create',
            'vehicle' => $vehicle['data'] ?? [],
            'user' => $user['data'] ?? [],
            'companyVehicleRentalPeriod' => $companyVehicleRentalPeriod['data'] ?? [],
            'assignmentStatus' => $assignmentStatus['data'] ?? [],
        ]);
    }

    public function view($id)
    {
        if (!session()->has('token')) {
            return redirect('/');
        }

        $permissions = session('permissions', []);
        if (!in_array('assignment.read', $permissions)) {
            abort(404);
        }

        $response = ApiHelper::get('/assignment/' . $id);
        if (!$response['status']) {
            abort(404);
        }

        $data = $response['data'];

        return view('pages.assignment.assignment_view', [
            'title' => 'View Assignment',
            'route' => 'assignment/view',
            'result' => $data
        ]);
    }

    public function read(Request $request)
    {
        if (!session()->has('token')) {
            return redirect('/');
        }
        $permissions = session('permissions', []);
        if (!in_array('assignment.read', $permissions)) {
            abort(404);
        }

        $params = $request->all();
        // $params['per_page'] = $request->per_page ?? 1;

        $data = ApiHelper::get('/assignment', $params);

        $vehicle = ApiHelper::get('/vehicle');
        $user = ApiHelper::get('/user');
        $assignmentStatus = ApiHelper::get('/assignment-status',[
            "status"=>1
        ]);
        $companyVehicleRentalPeriod = ApiHelper::get('/company-vehicle-rental-period',[
            "with_sort"=>1
        ]);
        return view('pages.assignment.assignment_read', [
            'title' => 'Assignment',
            'route' => 'assignment/read',
            'result' => $data['data'] ?? [],
            'data_state' => $data['data_state'],
            'pagination' => $data['pagination'] ?? [],
            'vehicle' => $vehicle['data'] ?? [],
            'user' => $user['data'] ?? [],
            'companyVehicleRentalPeriod' => $companyVehicleRentalPeriod['data'] ?? [],
            'assignmentStatus' => $assignmentStatus['data'] ?? [],
        ]);

    }
}


