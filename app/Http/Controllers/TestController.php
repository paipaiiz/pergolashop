<?php

namespace App\Http\Controllers;

use Dotenv\Result\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
    public function test(Request $request)
    {
        $supplyNumber = $request->supplyNumber;
        $response = Http::withHeaders([
            'Authorization' => 'Token TXCyBpCGF%Y~WzIYI*M!TRKXL%GMZ3C6H6JhQXZcANRtTIX1D%BtCnNMYYD5T7HJJ3P^V+S.KHK6WaBFH_K0WxB4PHXIMuQ%ISFR',
            'Content-Type' => 'application/json'
        ])->post('https://trackapi.thailandpost.co.th/post/api/v1/authenticate/token');
        $getResponse = Http::withHeaders([
            'Authorization' => 'Token ' . $response['token'],
            'Content-Type' => 'application/json'
        ])->post('https://trackapi.thailandpost.co.th/post/api/v1/track', [
            "status" => "all",
            "language" => "TH",
            "barcode" => [
                $supplyNumber
            ]
        ]);
        $supplyData = $getResponse['response']['items'][$supplyNumber];
        // foreach ($getResponse['response']['items']['$supplyNumber'] as $key => $item) {
        //     echo $item['status_description'] . '->';
        // }
        return $supplyData;
    }
}
