<?php

namespace App\Http\Controllers;

use App\Http\Requests\stripePaymentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;

class StripePaymentController extends Controller
{
    //stripePaymentFunction
    public function stripePost(stripePaymentRequest $request):\Illuminate\Http\JsonResponse
    {
        try{
            $stripe = new \Stripe\StripeClient(
                env('STRIPE_SECRET')
            );
            $result = $stripe->tokens->create([
                'card' => [
                    'number' => $request->number,
                    'exp_month' => $request->exp_month,
                    'exp_year' => $request->exp_year,
                    'cvc' => $request->cvc,
                ],
            ]);

            Stripe::setApiKey(env('STRIPE_SECRET'));
            $customer = $stripe->customers->create([
                'name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'source' => $result->id
            ]);

            $test = $stripe->sources->create([
                "type" => "card",
                "card" => [
                    'number' => $request->number,
                    'exp_month' => $request->exp_month,
                    'exp_year' => $request->exp_year,
                    'cvc' => $request->cvc,
                ],
                "currency" => "eur",
                "owner" => [
                    "email" => Auth::user()->email
                ]
            ]);
            $customer_id = $customer->id;
            $response = $stripe->charges->create([
                'amount' => $request->amount*100,
                'currency' => 'eur',
                'source' => $test->id,
                'description' => $request->description,
                'customer' => $customer->id
            ]);
            return response()->json([$response->status],201);


        }catch (\Throwable $th)
        {
            return response()->json([$th->getMessage()]);
        }
    }
}
