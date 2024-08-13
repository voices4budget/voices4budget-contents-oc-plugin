<?php namespace Voices4budget\Contents\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVoices4budgetContentsCategories3 extends Migration
{
    public function up()
    {
        Schema::table('voices4budget_contents_categories', function($table)
        {
            $table->dropColumn('slug');
        });
    }
    
    public function down()
    {
        Schema::table('voices4budget_contents_categories', function($table)
        {
            $table->string('slug', 255);
        });
    }
}
