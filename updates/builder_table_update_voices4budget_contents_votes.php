<?php namespace Voices4budget\Contents\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVoices4budgetContentsVotes extends Migration
{
    public function up()
    {
        Schema::table('voices4budget_contents_votes', function($table)
        {
            $table->integer('category_id')->unsigned()->after('voting_session_id');
        });
    }
    
    public function down()
    {
        Schema::table('voices4budget_contents_votes', function($table)
        {
            $table->dropColumn('category_id');
        });
    }
}
