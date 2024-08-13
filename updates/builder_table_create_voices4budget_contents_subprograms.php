<?php namespace Voices4budget\Contents\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateVoices4budgetContentsSubprograms extends Migration
{
    public function up()
    {
        Schema::create('voices4budget_contents_subprograms', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('title');
            $table->string('slug');
            $table->text('goal');
            $table->text('description');
            $table->integer('sort_order')->unsigned()->default(0);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('voices4budget_contents_subprograms');
    }
}
