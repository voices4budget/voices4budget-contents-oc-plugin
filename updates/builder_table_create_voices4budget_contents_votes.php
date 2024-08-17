<?php namespace Voices4budget\Contents\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateVoices4budgetContentsVotes extends Migration
{
    public function up()
    {
        Schema::create('voices4budget_contents_votes', function($table)
        {
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('voting_session_id')->unsigned();
            $table->integer('program_id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('voices4budget_contents_votes');
    }
}
