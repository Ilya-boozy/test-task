<?php

namespace App\Http\Controllers;

use App\Order;
use App\Services\DatabaseService;
use Illuminate\Http\Request;

class MainResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return view('order_list', ['order_array' => Order::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('order_form', ['from_resource_controller' => true]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, DatabaseService $database_service)
    {
        $database_service->addRecordToDB($request);

        return redirect("order/create",302,['status'=>'ok']);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view("show",compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('order_form', ['order'=>$order, 'from_resource_controller' => true]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, DatabaseService $database_service)
    {
        $database_service->addRecordToDB($request,$id);
        return redirect("order".$id,302,['status'=>'ok']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, DatabaseService $database_service)
    {
        $database_service->deleteRecordFromDB($id);
        return redirect("order",302,['status'=>'ok']);
    }
}