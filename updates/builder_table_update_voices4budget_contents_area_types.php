<?php namespace Voices4budget\Contents\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVoices4budgetContentsAreaTypes extends Migration
{
    public function up()
    {
        Schema::table('voices4budget_contents_area_types', function($table)
        {
            $table->integer('parent_id')->nullable()->unsigned()->after('id');
        });
    }
    
    public function down()
    {
        Schema::table('voices4budget_contents_area_types', function($table)
        {
            $table->dropColumn('parent_id');
        });
    }
}
