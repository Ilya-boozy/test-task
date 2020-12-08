<?php

namespace App\Services;

use App\Order;
use Illuminate\Support\Str;

class DatabaseService
{
    protected $order_model;

    public function __construct(Order $order)
    {
        $this->order_model = $order;
    }

    public function addRecordToDB($dataForDB, $id = null)
    {
        $dataForDB["slug"] = Str::slug($dataForDB["title"]);
        $data              = $dataForDB->validate(["title" => "required", "description" => "required", "slug" => "required"]);
        if (!($id === null)) {
            $this->order_model->where('id', $id)->update($data);
        } else {
            $this->order_model->create($data);
        }

        return true;
    }

    public function deleteRecordFromDB($id)
    {
        $this->order_model->destroy($id);
    }

    public function restoreFromDBById($id)
    {
        Order::onlyTrashed()->where('id', $id)->restore();
    }
}