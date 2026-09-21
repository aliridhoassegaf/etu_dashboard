<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Helpers\ApiHelper;

class AdminController extends Controller
{
    public function account_setting()
    {
        if (!session()->has('token')) {
            return redirect('/');
        }
        return view('pages.admin.admin_account_setting', [
            'title' => 'Account Settings',
            'route' => 'admin-account-setting',
        ]);
    }

    public function update_password_process(Request $request)
    {
        try {

            if (!session()->has('token')) {
                return redirect('/');
            }

            $response = Http::timeout(10)
                ->withHeaders([
                    'Authorization' => 'Bearer ' . session('token'),
                    'Accept' => 'application/json'
                ])
                ->asForm()
                ->put(env('API_URL') . '/admin-update-password', [
                    'current_password' => $request->current_password,
                    'new_password' => $request->new_password,
                    'confirm_new_password' => $request->confirm_new_password
                ]);

            if ($response->status() == 401) {
                session()->flush();
                return redirect('/')->with('error', 'Your session has expired. Please log in again');
            }

            $result = $response->json();

            if (!$result['status']) {
                return back()->with('error', $result['message']);
            }

            session()->forget(['token', 'admin', 'permissions']);

            return redirect('/')->with('success', $result['message']);

        } catch (\Exception $e) {

            \Log::error('Update Password Error', [
                'message' => $e->getMessage(),
            ]);

            return back()->with('error', 'Unable to connect to the API server');
        }
    }

    public function logout(Request $request)
    {
        try {
            $response = Http::withToken(session('token'))
                ->post(env('API_URL') . '/admin-logout');

            if ($response->successful()) {
                $result = $response->json();

                if (isset($result['message'])) {
                    $message = $result['message'];
                }
            }
        } catch (\Exception $e) {
            \Log::error('API LOGOUT ERROR', [
                'message' => $e->getMessage()
            ]);
        }

        $request->session()->flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', $message);
    }
    public function view($id)
    {
        if (!session()->has('token')) {
            return redirect('/');
        }

        $permissions = session('permissions', []);
        if (!in_array('admin.read', $permissions)) {
            abort(404);
        }

        $response = ApiHelper::get('/admin/' . $id);
        if (!$response['status']) {
            abort(404);
        }

        $data = $response['data'];

        return view('pages.admin.admin_view', [
            'title' => 'View Admin',
            'route' => 'admin/read',
            'result' => $data
        ]);
    }

    public function profile()
    {
        if (!session()->has('token')) {
            return redirect('/');
        }
        $id=session('admin')['id'];

        $response = ApiHelper::get('/admin/' . $id);

        if (!$response['status']) {
            abort(404);
        }

        $data = $response['data'];
        
        return view('pages.admin.admin_profile', [
            'title' => 'My Profile',
            'route' => 'admin-profile',
            'result' => $data
        ]);
    }

    public function login()
    {
        return view('pages.admin.admin_login', [
            'title' => 'Login',
            'route' => 'admin/login',
        ]);
    }

    public function login_process(Request $request)
    {
        $result = ApiHelper::post('/admin-login', [
            'email' => $request->email,
            'password' => $request->password,
        ], true);

        if (!$result['status']) {
            return back()->withInput()->with('error', $result['message']);
        }

        $token = $result['data']['token'];
        $admin = $result['data']['admin'];

        $permissions = collect($admin['access'])
            ->pluck('name')
            ->toArray();

        session([
            'token' => $token,
            'admin' => $admin,
            'permissions' => $permissions
        ]);

        if (in_array('overview_driver.read', $permissions)) {
            return redirect('/overview-driver');
        }

        return back();
    }

    public function read(Request $request)
    {
        if (!session()->has('token')) {
            return redirect('/');
        }
        $permissions = session('permissions', []);
        if (!in_array('admin.read', $permissions)) {
            abort(404);
        }

        $params = $request->all();
        // $params['per_page'] = $request->per_page ?? 1;

        $data = ApiHelper::get('/admin', $params);

        $adminRoles = ApiHelper::get('/admin-role');

        return view('pages.admin.admin_read', [
            'title' => 'Admin Users',
            'route' => 'admin/read',
            'result' => $data['data'] ?? [],
            'data_state' => $data['data_state'],
            'pagination' => $data['pagination'] ?? [],
            'adminRoles' => $adminRoles['data'] ?? [],
        ]);

    }
}


