<?php namespace Voices4budget\Contents\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVoices4budgetContentsCategories2 extends Migration
{
    public function up()
    {
        Schema::table('voices4budget_contents_categories', function($table)
        {
            $table->integer('parent_id')->nullable()->unsigned()->after('country_id');
        });
    }
    
    public function down()
    {
        Schema::table('voices4budget_contents_categories', function($table)
        {
            $table->dropColumn('parent_id');
        });
    }
}
