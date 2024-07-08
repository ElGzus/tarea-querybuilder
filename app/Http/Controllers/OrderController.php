<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use App\Models\Order;

class OrderController extends Controller
{
// punto 1
    public function insertData()
    {
        DB::table('users')->insert([
            ['name' => 'juan perez', 'email' => 'juanito@gmail.com'],
            ['name' => 'marvin navarro', 'email' => 'mvin@gmail.com'],
            ['name' => 'david sibrian', 'email' => 'deivids@gmail.com'],
            ['name' => 'marcos rodelman', 'email' => 'rodelmarcos@gmail.com'],
            ['name' => 'fernando castro', 'email' => 'fkstro@gmail.com'],
        ]);

        DB::table('orders')->insert([
            ['user_id' => 1, 'product' => 'procesador', 'quantity' => 3, 'total' => 600],
            ['user_id' => 2, 'product' => 'monitor', 'quantity' => 2, 'total' => 150],
            ['user_id' => 3, 'product' => 'tarjeta grafica', 'quantity' => 4, 'total' => 900],
            ['user_id' => 4, 'product' => 'teclado', 'quantity' => 1, 'total' => 50],
            ['user_id' => 5, 'product' => 'raton', 'quantity' => 3, 'total' => 75],
        ]);

        return "Data inserted successfully.";
    }

// punto 2
public function getOrdersByUserId()
{
    $orders = DB::table('orders')
                ->where('user_id', 2)
                ->get();
    
    return $orders;
}

//punto 3


public function getDetailedOrders()
{
    $detailedOrders = DB::table('orders')
                        ->join('users', 'orders.user_id', '=', 'users.id')
                        ->select('orders.*', 'users.name', 'users.email')
                        ->get();
    
    return $detailedOrders;
}

//punto 4


public function getOrdersInRange()
{
    $ordersInRange = DB::table('orders')
                       ->whereBetween('total', [100, 250])
                       ->get();
    
    return $ordersInRange;
}


//punto 5

public function getUsersByName()
{
    $users = DB::table('users')
               ->where('name', 'like', 'R%')
               ->get();
    
    return $users;
}

//punto 6

public function getTotalOrdersByUserId()
{
    $totalOrders = DB::table('orders')
                     ->where('user_id', 5)
                     ->count();
    
    return $totalOrders;
}

//punto 7

public function getOrdersWithUserInfo()
{
    $ordersWithUserInfo = DB::table('orders')
                            ->join('users', 'orders.user_id', '=', 'users.id')
                            ->select('orders.*', 'users.name', 'users.email')
                            ->orderBy('orders.total', 'desc')
                            ->get();
    
    return $ordersWithUserInfo;
}

//punto 8

public function getTotalSum()
{
    $totalSum = DB::table('orders')
                  ->sum('total');
    
    return $totalSum;
}

//punto 9

public function getCheapestOrder()
{
    $cheapestOrder = DB::table('orders')
                       ->join('users', 'orders.user_id', '=', 'users.id')
                       ->select('orders.*', 'users.name')
                       ->orderBy('orders.total', 'asc')
                       ->first();
    
    return $cheapestOrder;
}

//punto 10

public function getGroupedOrders()
{
    $groupedOrders = DB::table('orders')
                       ->join('users', 'orders.user_id', '=', 'users.id')
                       ->select('users.name', 'orders.product', 'orders.quantity', 'orders.total')
                       ->groupBy('users.id')
                       ->get();
    
    return $groupedOrders;
}
}
