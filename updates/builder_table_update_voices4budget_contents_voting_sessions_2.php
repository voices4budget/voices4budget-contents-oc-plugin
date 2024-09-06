<?php namespace Voices4budget\Contents\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVoices4budgetContentsVotingSessions2 extends Migration
{
    public function up()
    {
        Schema::table('voices4budget_contents_voting_sessions', function($table)
        {
            $table->integer('country_id')->unsigned()->after('is_active');
        });
    }
    
    public function down()
    {
        Schema::table('voices4budget_contents_voting_sessions', function($table)
        {
            $table->dropColumn('country_id');
        });
    }
}
