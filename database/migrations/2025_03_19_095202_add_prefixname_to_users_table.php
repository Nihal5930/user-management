<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('prefixname')->nullable()->after('email');
            $table->string('firstname')->nullable()->after('email');
            $table->string('lastname')->nullable()->after('email');
            $table->string('photo')->nullable()->after('email');
            $table->string('middlename')->nullable()->after('email');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('prefixname');
        });
    }
};