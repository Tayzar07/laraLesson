<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Northwind extends Controller
{
    public function list()
    {
        $list = DB::table('orders')
            ->join('customers', 'customers.CustomerID', '=', 'orders.customerID')
            ->join('shippers','shippers.ShipperID','=','orders.ShipperID')
            ->get();
            dd($list);
        return view('order',compact('list'));
    }
}
