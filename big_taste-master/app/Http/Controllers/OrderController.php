<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    function addNewOrder(Request $request)
    {

        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'products' => 'required',
                    'address' => 'required|string',
                    'latitude' => '',
                    'longitude' => '',
                    'total' => 'required',
                    'payment_method' => 'required|string',
                    'delivery_method' => 'required|string',
                    'delivery_instruction' => '',
                ]
            );

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 400);
            }

            $order = Order::create([
                'user_id' => Auth::id(),
                'address' => $request->address,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'amount' => $request->total,
                'payment_method' => $request->payment_method,
                'delivery_method' => $request->delivery_method,
                'delivery_instruction' => $request->delivery_instruction,
            ]);

            foreach ($request->products as $product) {
                OrderDetails::create([
                    'order_id' => $order->id,
                    'product_id' => $product['id'],
                    'quantity' => $product['quantity'],
                    'price' => $product['price'] * $product['quantity']
                ]);
            }

            return response()->json([
                'status' => true,
                'msg' => 'New order added successfully'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'msg' => $e->getMessage()
            ]);
        }
    }

    public function getAllOrders()
    {
        $orders = Order::all();

        return response()->json($orders);
    }

    public function getOrder($id)
    {
        $order = Order::findOrFail($id);

        return response()->json($order);
    }
}
