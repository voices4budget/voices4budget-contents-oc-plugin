<?php namespace Voices4budget\Contents\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateVoices4budgetContentsVotingSessions extends Migration
{
    public function up()
    {
        Schema::create('voices4budget_contents_voting_sessions', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->text('description');
            $table->dateTime('starts_at');
            $table->dateTime('ends_at');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('voices4budget_contents_voting_sessions');
    }
}
