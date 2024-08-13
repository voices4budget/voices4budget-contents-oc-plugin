<?php namespace Voices4budget\Contents\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVoices4budgetContentsPrograms extends Migration
{
    public function up()
    {
        Schema::table('voices4budget_contents_programs', function($table)
        {
            $table->string('country_id', 2)->after('description');
        });
    }
    
    public function down()
    {
        Schema::table('voices4budget_contents_programs', function($table)
        {
            $table->dropColumn('country_id');
        });
    }
}
