<?php namespace Voices4budget\Contents\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVoices4budgetContentsAreas extends Migration
{
    public function up()
    {
        Schema::table('voices4budget_contents_areas', function($table)
        {
            $table->integer('sort_order')->default(0)->after('parent_id');
        });
    }
    
    public function down()
    {
        Schema::table('voices4budget_contents_areas', function($table)
        {
            $table->dropColumn('sort_order');
        });
    }
}
