<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailsToBooksTable extends Migration
{
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->string('author')->nullable()->after('title');
            $table->integer('stock')->nullable()->after('description');
            $table->date('published_date')->nullable()->after('stock');
        });
    }

    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn(['author', 'stock', 'published_date']);
        });
    }
}

