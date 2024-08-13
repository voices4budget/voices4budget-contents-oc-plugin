<?php namespace Voices4budget\Contents\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVoices4budgetContentsPrograms3 extends Migration
{
    public function up()
    {
        Schema::rename('voices4budget_contents_subprograms', 'voices4budget_contents_programs');
    }
    
    public function down()
    {
        Schema::rename('voices4budget_contents_programs', 'voices4budget_contents_subprograms');
    }
}
