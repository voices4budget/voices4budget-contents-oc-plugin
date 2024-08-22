<?php namespace Voices4budget\Contents\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVoices4budgetContentsVotingSessions extends Migration
{
    public function up()
    {
        Schema::table('voices4budget_contents_voting_sessions', function($table)
        {
            $table->boolean('is_active')->default(0)->after('description');
        });
    }
    
    public function down()
    {
        Schema::table('voices4budget_contents_voting_sessions', function($table)
        {
            $table->dropColumn('is_active');
        });
    }
}
