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
            'CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `isDone`(IN agr_id INT)
BEGIN
	IF now() >=  (SELECT agreements.complete_by from agreements WHERE agreements.id = agr_id) AND (SELECT payments.status from payments WHERE payments.a_id = agr_id) = 1 THEN
		UPDATE shipments, agreements SET shipments.c_id = agreements.b_id WHERE shipments.id = agreements.sh_id AND agreements.id = agr_id;
	END IF;
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
        DB::unprepared("DROP PROCEDURE `laravel`.`isDone`;");
    }
};
