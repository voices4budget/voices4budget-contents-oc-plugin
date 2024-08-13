<?php namespace Voices4Budget\Contents\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * RemovePasswordFromRainlabUsersTable Migration
 *
 * @link https://docs.octobercms.com/3.x/extend/database/structure.html
 */
return new class extends Migration
{
    /**
     * up builds the migration
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->string('country_id', 2)->after('notes');
        });
    }

    /**
     * down reverses the migration
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn(['country_id']);
        });
    }
};