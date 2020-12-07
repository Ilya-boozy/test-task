<?php

namespace App\Http\Controllers;

use App\Order;
use App\Services\DatabaseService;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function mainPage()
    {
        return view('index');
    }

    public function orderRestore()
    {
        return view('order_list', ['order_array' => Order::onlyTrashed()->get(), 'restore' => true]);
    }

    public function orderRestorePost(Request $request,DatabaseService $database_service)
    {
        foreach ($request->request as $key => $value){
            if (strripos($key,"CheckBox") !== false) {
                $database_service->restoreFromDBById(intval($value));
            }
        }
        return redirect("/order-restore",302);
    }
}
