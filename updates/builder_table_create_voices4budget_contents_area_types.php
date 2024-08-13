<?php namespace Voices4budget\Contents\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateVoices4budgetContentsAreaTypes extends Migration
{
    public function up()
    {
        Schema::create('voices4budget_contents_area_types', function($table)
        {
            $table->string('id');
            $table->string('name');
            $table->text('description');
            $table->integer('sort_order')->default(0);
            $table->string('country_id', 2);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->primary(['id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('voices4budget_contents_area_types');
    }
}