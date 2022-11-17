<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //新增category_id的欄位,無號數bigInt資料類型,可允許空值
            $table->unsignedBigInteger('category_id')->nullable();
            //設定關聯外部鍵,參照category的id,刪除時相關文章也會刪除
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //先移除外部鍵(加陣列[])再移除欄位
			$table->dropForeign(['category_id']);
			$table->dropColumn('category_id');
        });
    }
}
