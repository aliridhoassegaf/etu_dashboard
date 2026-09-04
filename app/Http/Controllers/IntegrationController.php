<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Helpers\ApiHelper;

class IntegrationController extends Controller
{
    public function read(Request $request)
    {
        if (!session()->has('token')) {
            return redirect('/');
        }
        $permissions = session('permissions', []);
        if (!in_array('integration.read', $permissions)) {
            abort(404);
        }

        return view('pages.integration.integration_read', [
            'title' => 'Integration',
            'route' => 'integration/read',
        ]);

    }
}


