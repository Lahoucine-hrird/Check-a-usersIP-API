<?php

use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Client\Response;
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

Route::get('/testip/{id}', function ($id) {
    // $ipr="161.176.52.192";
//    $respons=Http::withoutVerifying()->get('https://api.iplegit.com/full',[
//     'ip'=>"161.176.52.192",
//     ]);
    
    // $clientIP = request()->ip();
           $respons=Http::withoutVerifying()->get('https://api.iplegit.com/full',[
            'ip'=>$id ,
            ]);    
            $d=$respons->json();
            
            $data='
            <div class="section-title">
            <h2>Your result</h2>
          </div>
          
            <div class="col-lg-12 d-flex align-items-stretch">
            <div class="info">';

            $data.='<div class="address">
            <i class="icofont-focus"></i>
            
             <h4>IP Address is :</h4>
             <p>'.$d["ip"].'</p>
           </div>';

              $data.='<div class="address">
              <i class="icofont-megaphone"></i> 
               <h4>This is considered a:</h4>
                ';
                 if($d["bad"]=="true")
                 $data.='<p style="color:#d83636">Bad IP</p>';
                 else
                 $data.='<p style="color:#24b7a4">Good IP</p>';

                 $data.=' 
              </div>';

              
              $data.='<div class="address">
              <i class="icofont-navigation"></i>
               <h4>Country is :</h4>
                <p>'. $d["countryName"].'</p>
              </div>';

              $data.='<div class="address">
              <i class="icofont-tack-pin"></i>
               <h4>City is :</h4>
                <p>'. $d["city"].'</p>
              </div>';

              $data.='<div class="address">
              <i class="icofont-hard-disk"></i>
              <h4>Type :</h4>
               <p>'. $d["type"].'</p>
             </div>
             ';
              $data.='
            </div>';
            //  dd($d),$d["latitude"], $d["longitude"];
            return Response($data);


});




Route::get('/IpTest/{id}',function($userId)
{
    $response=Http::withoutVerifying()->post('https://api.iplegit.com/full',[
        'id'=>$userId,
    ]);
    return $response->body();
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


