<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyOrdersTableChangeIsShow extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->softDeletes();
            $table->dropColumn("is_show");
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropSoftDeletes();
            $table->boolean("is_show")->default(false)->after("description");
        });
    }
}