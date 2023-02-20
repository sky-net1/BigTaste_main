<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;

class TransactionController extends Controller
{
    public function verifyTransaction(Request $request)
    {
        Validator::make($request->all(), [
            'tx_ref' => ['required'],
        ])->validate();

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . $request->tx_ref,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer sk_test_79093b5ea21a6706678e0627d54f583da8f76301",
                "Cache-Control: no-cache",
            ),
        ));

        $response = curl_exec($curl);

        $response = json_decode($response, true);

        $amount = $response['data']['amount'];
        $email = $response['data']['customer']['email'];
        $tx_ref = $response['data']['reference'];

        $user = User::where('email', $email)->first();
        $user->transactions()->create([
            'amount' => $amount,
            'tx_ref' => $tx_ref
        ]);
        return response()->json($response);
    }
}
