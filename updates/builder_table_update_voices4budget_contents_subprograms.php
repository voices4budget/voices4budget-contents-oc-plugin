<?php namespace Voices4budget\Contents\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVoices4budgetContentsSubprograms extends Migration
{
    public function up()
    {
        Schema::table('voices4budget_contents_subprograms', function($table)
        {
            $table->integer('program_id')->unsigned()->after('description');
        });
    }
    
    public function down()
    {
        Schema::table('voices4budget_contents_subprograms', function($table)
        {
            $table->dropColumn('program_id');
        });
    }
}
