<?php namespace Voices4budget\Contents\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVoices4budgetContentsPrograms4 extends Migration
{
    public function up()
    {
        Schema::table('voices4budget_contents_programs', function($table)
        {
            $table->renameColumn('program_id', 'category_id');
        });
    }
    
    public function down()
    {
        Schema::table('voices4budget_contents_programs', function($table)
        {
            $table->renameColumn('category_id', 'program_id');
        });
    }
}
