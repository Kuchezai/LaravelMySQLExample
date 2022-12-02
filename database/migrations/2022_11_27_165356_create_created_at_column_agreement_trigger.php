<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(
            'CREATE DEFINER = CURRENT_USER TRIGGER `laravel`.`agreements_BEFORE_INSERT` BEFORE INSERT ON `agreements` FOR EACH ROW
            BEGIN
        SET NEW.created_at = NOW();
            END'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP TRIGGER `agreements_BEFORE_INSERT`");
    }
};
