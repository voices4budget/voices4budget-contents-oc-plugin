<?php namespace Voices4budget\Contents\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVoices4budgetContentsComments extends Migration
{
    public function up()
    {
        Schema::table('voices4budget_contents_comments', function($table)
        {
            $table->integer('voting_session_id')->unsigned()->after('user_id');
        });
    }
    
    public function down()
    {
        Schema::table('voices4budget_contents_comments', function($table)
        {
            $table->dropColumn('voting_session_id');
        });
    }
}