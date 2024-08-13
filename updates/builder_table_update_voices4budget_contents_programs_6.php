<?php namespace Voices4budget\Contents\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVoices4budgetContentsPrograms6 extends Migration
{
    public function up()
    {
        Schema::table('voices4budget_contents_programs', function($table)
        {
            $table->integer('voting_session_id')->unsigned()->after('letter_index');
        });
    }
    
    public function down()
    {
        Schema::table('voices4budget_contents_programs', function($table)
        {
            $table->dropColumn('voting_session_id');
        });
    }
}
