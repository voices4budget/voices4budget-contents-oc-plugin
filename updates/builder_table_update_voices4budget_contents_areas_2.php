<?php namespace Voices4budget\Contents\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVoices4budgetContentsAreas2 extends Migration
{
    public function up()
    {
        Schema::table('voices4budget_contents_areas', function($table)
        {
            $table->string('country_id', 2)->after('name');
        });
    }
    
    public function down()
    {
        Schema::table('voices4budget_contents_areas', function($table)
        {
            $table->dropColumn('country_id');
        });
    }
}
