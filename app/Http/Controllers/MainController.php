<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function accessToken()
    {
        $access_token = Storage::disk('config')->get(config('app.ACCESS_TOKEN'));
        $v = Storage::disk('config')->get(config('app.FILE_V'));
        return view('access_token', compact('v', 'access_token'));
    }
    public function accessTokenStore(Request $request)
    {
        $data = $request->all();
        if (!$data['access_token'] || !$data['v']) {
            return redirect()->back();
        }
        Storage::disk('config')->put(config('app.ACCESS_TOKEN'), $data['access_token']);
        Storage::disk('config')->put(config('app.FILE_V'), $data['v']);
        return redirect()->route('access_token.index');
    }
    public function accaunt()
    {
        $access_token = Storage::disk('config')->get(config('app.ACCESS_TOKEN'));
        $v = Storage::disk('config')->get(config('app.FILE_V'));
        if ($access_token && $v) {
            $response = Http::get('https://api.vk.com/method/ads.getAccounts?access_token=' . $access_token . '&v=' . $v);
            $data = $response->json()['response'];
            // dd($data);
            // dd($response->json());
            return view('accaunt', compact('data'));
        }
        return redirect()->route('access_token.index');
    }
    public function company()
    {
        return view('company');
    }
    public function companyView(Request $request)
    {
        $data = $request->all();
        if ($data['client_id'] && $data['account_id']) {
            $access_token = Storage::disk('config')->get(config('app.ACCESS_TOKEN'));
            $v = Storage::disk('config')->get(config('app.FILE_V'));
            $response = Http::get('https://api.vk.com/method/ads.getCampaigns?access_token=' . $access_token . '&v=5' . $v . '&client_id=' . $data['client_id'] . '&include_deleted=1&account_id=' . $data['account_id']);
            $company = $response->json()['response'];
            return view('company', compact('data', 'company'));
        }
        return view('company');
    }
}
