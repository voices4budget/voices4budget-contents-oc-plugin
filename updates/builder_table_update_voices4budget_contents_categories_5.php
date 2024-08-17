<?php namespace Voices4budget\Contents\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVoices4budgetContentsCategories5 extends Migration
{
    public function up()
    {
        Schema::table('voices4budget_contents_categories', function($table)
        {
            $table->integer('max_vote')->after('description');
        });
    }
    
    public function down()
    {
        Schema::table('voices4budget_contents_categories', function($table)
        {
            $table->dropColumn('max_vote');
        });
    }
}
