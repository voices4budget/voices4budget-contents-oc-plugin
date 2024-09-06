<?php namespace Voices4budget\Contents\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVoices4budgetContentsStakeholders extends Migration
{
    public function up()
    {
        Schema::table('voices4budget_contents_stakeholders', function($table)
        {
            $table->string('country_id', 2)->after('role');
        });
    }
    
    public function down()
    {
        Schema::table('voices4budget_contents_stakeholders', function($table)
        {
            $table->dropColumn('country_id');
        });
    }
}