<?php namespace Voices4budget\Contents\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVoices4budgetContentsSubprograms2 extends Migration
{
    public function up()
    {
        Schema::table('voices4budget_contents_subprograms', function($table)
        {
            $table->string('letter_index', 1)->after('description');
        });
    }
    
    public function down()
    {
        Schema::table('voices4budget_contents_subprograms', function($table)
        {
            $table->dropColumn('letter_index');
        });
    }
}
