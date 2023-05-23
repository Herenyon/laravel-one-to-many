<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('db_auth.portfs', function (Blueprint $table) {
            $table->string('image')->nullable()->after('repo_title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('db_auth.portfs', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
};
