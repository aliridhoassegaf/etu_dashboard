<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class ApiHelper
{

    public static function post($endpoint, $params = [], $useStaticToken = false)
    {
        try {

            $token = $useStaticToken
                ? env('TOKEN_STATIC')
                : session('token');

            $response = Http::timeout(10)
                ->withHeaders([
                    'Authorization' => 'Bearer ' . $token,
                    'Accept' => 'application/json'
                ])
                ->asForm()
                ->post(env('API_URL') . $endpoint, $params);

            if ($response->status() == 401 && !$useStaticToken) {
                session()->flush();

                return [
                    'status' => false,
                    'message' => 'Your session has expired. Please login again.',
                    'data' => [],
                    'unauthorized' => true
                ];
            }

            return $response->json();

        } catch (\Throwable $e) {

            \Log::error('API POST ERROR', [
                'endpoint' => $endpoint,
                'params' => $params,
                'message' => $e->getMessage()
            ]);

            return [
                'status' => false,
                'message' => 'Unable to connect to the API server',
                'data' => [],
            ];
        }
    }
    public static function get($endpoint, $params = [], $useStaticToken = false)
    {
        try {

            $token = $useStaticToken
                ? env('TOKEN_STATIC')
                : session('token');

            $response = Http::timeout(10)
                ->withHeaders([
                    'Authorization' => 'Bearer ' . $token,
                    'Accept' => 'application/json'
                ])
                ->get(env('API_URL') . $endpoint, $params);

            if ($response->status() == 401 && !$useStaticToken) {
                session()->flush();

                return [
                    'status' => false,
                    'message' => 'Your session has expired. Please login again.',
                    'data' => [],
                    'pagination' => [],
                    'unauthorized' => true
                ];
            }

            $response->throw();

            return $response->json();

        } catch (\Throwable $e) {

            \Log::error('API GET ERROR', [
                'endpoint' => $endpoint,
                'params' => $params,
                'message' => $e->getMessage()
            ]);

            return [
                'status' => false,
                'message' => 'Unable to connect to the API server',
                'data' => [],
                'pagination' => []
            ];
        }
    }

    public static function delete($endpoint)
    {
        try {

            $response = Http::timeout(10)
                ->withHeaders([
                    'Authorization' => 'Bearer ' . session('token'),
                    'Accept' => 'application/json'
                ])
                ->delete(env('API_URL') . $endpoint);

            if ($response->status() == 401) {
                session()->flush();

                return [
                    'status' => false,
                    'message' => 'Sesi Anda telah berakhir. Silakan login kembali.',
                    'unauthorized' => true
                ];
            }

            return $response->json();

        } catch (\Throwable $e) {

            \Log::error('API DELETE ERROR', [
                'endpoint' => $endpoint,
                'message' => $e->getMessage()
            ]);

            return [
                'status' => false,
                'message' => 'Unable to connect to the API server'
            ];
        }
    }

}