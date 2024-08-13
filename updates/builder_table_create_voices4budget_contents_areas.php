<?php namespace Voices4budget\Contents\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateVoices4budgetContentsAreas extends Migration
{
    public function up()
    {
        Schema::create('voices4budget_contents_areas', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('area_type_id');
            $table->integer('parent_id')->nullable()->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('voices4budget_contents_areas');
    }
}
