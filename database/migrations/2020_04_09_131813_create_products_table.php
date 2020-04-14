<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateProductsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
       Schema::create('Search', function (Blueprint $table) {
           $table->increments('id');
           $table->timestamps();
           $table->string('Title');
           $table->string('Name');
           $table->string('City');
           $table->string('Description');
       });
   }
   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
       Schema::dropIfExists('Search');
   }
}