<?php

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/testip', function () {
    $ipr=0;
//    $respons=Http::withoutVerifying()->get('https://api.iplegit.com/full',[
//     'ip'=>"161.176.52.192",
//     ]);
    
    $clientIP = request()->ip();
           $respons=Http::withoutVerifying()->get('https://api.iplegit.com/full',[
            'ip'=>$clientIP ,
            ]);    
    dd($respons->body());

});




Route::get('exemplePost',function()
{
    $response=Http::withoutVerifying()->post('https://jsonplaceholder.typicode.com/posts',[
        'userId'=>123,
    ]);
   dd($response->json());
});




    //generat url payement

Route::get('exemplepayement',function()
{
    $response=Http::withoutVerifying()->post('https://restpilot.paylink.sa/api/auth',[    
            "apiId"=> "APP_ID_1123453311",
            "persistToken"=> false,
            "secretKey"=> "0662abb5-13c7-38ab-cd12-236e58f43766"
    ]);
    
    $data=$response->json();
    $id_token="Bearer ".$data["id_token"];
    // dd($id_token);

    // url("findexist/".transactionNo);
    $response=Http::withoutVerifying()->withHeaders([
        "Authorization"=> $id_token,
        "Content-Type"=> "application/json" ,
        "accept" =>"application/json"
    ])
    ->post('https://restpilot.paylink.sa/api/addInvoice',[
        "amount"=> 5,
        "callBackUrl"=> url("/"),
        "clientEmail"=> "myclient@email.com",
        "clientMobile"=> "0509200900",
        "clientName"=> "Zaid Matooq",
        "note"=> "This invoice is for VIP client.",
        "orderNumber"=> "MERCHANT-ANY-UNIQUE-ORDER-NUMBER-123123123",
    ]);
    $data=$response->json();
   dd($response->json());
   return view('welcome')->with('data',$data);
});



    //verification de peyement
Route::get('findexist/{transactionNo}',function($transactionNo)
{
        $response=Http::withoutVerifying()->post('https://restpilot.paylink.sa/api/auth',[    
            "apiId"=> "APP_ID_1123453311",
            "persistToken"=> false,
            "secretKey"=> "0662abb5-13c7-38ab-cd12-236e58f43766"
        ]);

        $data=$response->json();
        
        $id_token="Bearer ".$data["id_token"];
            $url='https://restpilot.paylink.sa/api/getInvoice/'.$transactionNo;
        $response=Http::withoutVerifying()->withHeaders([
            "Authorization"=> $id_token,
            "Content-Type"=> "application/json" ,
            "accept" =>"application/json"
        ])
        ->get($url);
        
        dd($response->json());
});


