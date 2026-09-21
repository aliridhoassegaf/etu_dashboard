<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Helpers\ApiHelper;

class OverviewDriverController extends Controller
{

    public function read(Request $request)
    {
        if (!session()->has('token')) {
            return redirect('/');
        }

        $assignmentStatusTotal = ApiHelper::get('/assignment-status-total');

        $userRegisterTotal = ApiHelper::get('/user-register-total');

        return view('pages.overview_driver.overview_driver_read', [
            'title' => 'Overview Drivers',
            'route' => 'overview-driver',
            'assignmentStatusTotal' => $assignmentStatusTotal['data'] ?? [],
            'userRegisterTotal' => $userRegisterTotal['data'] ?? [],
        ]);
    }

    public function assignmentStatus(Request $request)
    {
        if (!session()->has('token')) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        $params = $request->all();

        $assignmentStatusTotal = ApiHelper::get(
            '/assignment-status-total',
            $params
        );

        return response()->json(
            $assignmentStatusTotal
        );
    }

    public function userRegister(Request $request)
    {
        if (!session()->has('token')) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        $params = $request->all();

        $userRegisterTotal = ApiHelper::get(
            '/user-register-total',
            $params
        );

        return response()->json(
            $userRegisterTotal
        );
    }
}


