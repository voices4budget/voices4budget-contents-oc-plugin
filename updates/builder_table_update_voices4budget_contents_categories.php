<?php namespace Voices4budget\Contents\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVoices4budgetContentsCategories extends Migration
{
    public function up()
    {
        Schema::rename('voices4budget_contents_programs', 'voices4budget_contents_categories');
    }
    
    public function down()
    {
        Schema::rename('voices4budget_contents_categories', 'voices4budget_contents_programs');
    }
}
