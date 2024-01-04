<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UpdateEmptyUserIds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('users')
            ->where('id', '')
            ->orWhereNull('id')
            ->get()
            ->each(function ($user) {
                DB::table('users')
                    ->where('id', $user->id)
                    ->update(['id' => (string) Str::uuid()]);
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // No way to reverse this migration
    }
}
