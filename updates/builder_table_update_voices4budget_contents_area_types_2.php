<?php namespace Voices4budget\Contents\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVoices4budgetContentsAreaTypes2 extends Migration
{
    public function up()
    {
        Schema::table('voices4budget_contents_area_types', function($table)
        {
            $table->string('parent_id')->nullable()->unsigned(false)->default(null)->comment(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('voices4budget_contents_area_types', function($table)
        {
            $table->integer('parent_id')->nullable()->unsigned()->default(null)->comment(null)->change();
        });
    }
}
