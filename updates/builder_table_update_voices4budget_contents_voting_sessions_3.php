<?php namespace Voices4budget\Contents\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVoices4budgetContentsVotingSessions3 extends Migration
{
    public function up()
    {
        Schema::table('voices4budget_contents_voting_sessions', function($table)
        {
            $table->string('country_id', 2)->nullable(false)->unsigned(false)->default(null)->comment(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('voices4budget_contents_voting_sessions', function($table)
        {
            $table->integer('country_id')->nullable(false)->unsigned()->default(null)->comment(null)->change();
        });
    }
}
