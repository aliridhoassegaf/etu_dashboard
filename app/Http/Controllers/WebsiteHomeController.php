<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Helpers\ApiHelper;

class WebsiteHomeController extends Controller
{
    public function view()
    {
        if (!session()->has('token')) {
            return redirect('/');
        }

        $permissions = session('permissions', []);
        if (!in_array('website_home.read', $permissions)) {
            abort(404);
        }

        $response = ApiHelper::get('/website-home/' . env("ID_WEBSITE_HOME"));
        if (!$response['status']) {
            abort(404);
        }

        $data = $response['data'];

        return view('pages.website_home.website_home_view', [
            'title' => 'Home',
            'result' => $data
        ]);
    }
}


