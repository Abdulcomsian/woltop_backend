<?php

namespace App\Http\Controllers\ApiControllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    protected $service;

    public function __construct(OrderService $service)
    {
        $this->service = $service;
    }

    public function store(OrderRequest $request){
        try{
            $save = $this->service->store($request->validated());
            $products = [];
            if(isset($save->productOrder)){
                foreach($save->productOrder as $item){
                    if($item->product->product_type == "variable"){
                        $products[] = [
                            "sku" => $item->variable->sku,
                            "quantity" => $item->quantity,
                            "price_unit" => $item->variable->sale_price,
                        ];
                    }elseif($item->product->product_type == "simple"){
                        $products[] = [
                            "sku" => $item->product->sku,
                            "quantity" => $item->quantity,
                            "price_unit" => $item->product->sale_price,
                        ];
                    }
                }
            }

            // $array = [
            //     "customer" => [
            //         "name" => $save->address->name,
            //         "email" => $save->address->name,
            //         "mobile" => $save->address->name,
            //         "street" => $save->address->name,
            //         "city" => $save->address->name,
            //         "zip" => $save->address->name,
            //         "state" => $save->address->name,
            //         "country_code" => $save->address->name,
            //     ],
            //     "order_reference" => $save->order_id,
            //     "item" => [
            //         $products ?? null
            //     ]
            //     ];

            //     dd($array);
            $response = Http::post('https://test.wolpin.in/web/hook/1ac28f51-4518-4f0f-b59a-b2e09955508c', [
                "customer" => [
                    "name" => $save->address->name,
                    "email" => $save->address->email,
                    "mobile" => $save->address->phone_number,
                    "street" => $save->address->address,
                    "city" => $save->address->city,
                    "zip" => $save->address->pincode,
                    "state" => $save->address->state,
                    "country_code" => "IN",
                ],
                "order_reference" => $save->order_id,
                "item" => [
                    $products ?? null
                ]
            ]);

            // Check if the request was successful
            if ($response->successful()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data saved and webhook triggered successfully',
                    'order_id' => $save->order_id,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data saved but webhook request failed',
                    'error' => $response->body(),
                    'order_id' => $save->order_id,
                ]);
            }
            // return response()->json(['status' => true, "msg" => "Order Placed Successfully", "order_id" => $data->order_id], 200); 
        }catch(\Exception $e){
            return response()->json(['status' => false, "msg" => "Something went wrong", "error" => $e->getMessage(), "on line" => $e->getLine()], 500);
        }
    }

}
