<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    public function up()
    {
        // Check if the suppliers table does not exist before creating it
        if (!Schema::hasTable('suppliers')) {
            Schema::create('suppliers', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->text('address');
                $table->string('phone_number');
                $table->timestamps();
            });
        }

        // Update the books table
        Schema::table('books', function (Blueprint $table) {
            // Check if the column does not exist before adding it
            if (!Schema::hasColumn('books', 'supplier_id')) {
                $table->unsignedBigInteger('supplier_id')->nullable()->after('category_id');
                $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('set null');
            }
        });
    }

    public function down()
    {
        // Reverse the changes to the books table
        Schema::table('books', function (Blueprint $table) {
            if (Schema::hasColumn('books', 'supplier_id')) {
                $table->dropForeign(['supplier_id']);
                $table->dropColumn('supplier_id');
            }
        });

        // Drop the suppliers table if it exists
        Schema::dropIfExists('suppliers');
    }
}
