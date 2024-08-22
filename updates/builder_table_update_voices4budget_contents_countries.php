<?php namespace Voices4budget\Contents\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVoices4budgetContentsCountries extends Migration
{
    public function up()
    {
        Schema::table('voices4budget_contents_countries', function($table)
        {
            $table->integer('is_default')->unsigned()->default(0)->after('name');
        });
    }
    
    public function down()
    {
        Schema::table('voices4budget_contents_countries', function($table)
        {
            $table->dropColumn('is_default');
        });
    }
}
