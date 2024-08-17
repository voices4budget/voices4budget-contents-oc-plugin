<?php namespace Voices4budget\Contents\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateVoices4budgetContentsComments extends Migration
{
    public function up()
    {
        Schema::create('voices4budget_contents_comments', function($table)
        {
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('program_id')->unsigned();
            $table->text('comment');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('voices4budget_contents_comments');
    }
}
