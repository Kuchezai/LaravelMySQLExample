<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        DB::unprepared(
            'CREATE DEFINER = CURRENT_USER TRIGGER `laravel`.`agreements_AFTER_INSERT` AFTER INSERT ON `agreements` FOR EACH ROW
            BEGIN
        INSERT INTO payments (a_id) VALUES (NEW.id);
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
        DB::unprepared("DROP TRIGGER `agreements_AFTER_INSERT`");
    }
};
