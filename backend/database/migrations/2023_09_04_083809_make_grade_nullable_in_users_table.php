<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('grade')->nullable()->change();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('gender')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('grade')->change();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('gender')->change();
        });
    }
    
};
