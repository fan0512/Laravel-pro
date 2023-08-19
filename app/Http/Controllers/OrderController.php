<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders =Order::all();
        return view('google-bar-chart',['orders'=>$orders]);
    }
}
