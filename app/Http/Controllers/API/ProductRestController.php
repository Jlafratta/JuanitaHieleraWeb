<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Desktop;
use Illuminate\Http\Request;

class ProductRestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dsktp = Desktop::find(1);
        if($request->header('auth') == $dsktp->api_key){
            $products = Product::all();
            return $products->isEmpty() ? response()->json($products, 204) : response()->json($products, 200);
        }
        return response('', 401);
    }

}
