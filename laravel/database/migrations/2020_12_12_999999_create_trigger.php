<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class createTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //  DB::unprepared("
        //     CREATE EXTENSION IF NOT EXISTS `uuid-ossp`;
        // ");
         
        DB::unprepared("
            CREATE OR REPLACE FUNCTION generate_uuid()
            RETURNS TRIGGER AS $$
            BEGIN
            IF NEW.uuid IS NULL THEN
                NEW.uuid = uuid_generate_v4();
            END IF;
            RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;
        ");
         
        DB::unprepared("
            CREATE TRIGGER before_insert_users
            BEFORE INSERT ON users
            FOR EACH ROW
            EXECUTE FUNCTION generate_uuid();
        ");


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         DB::unprepared('DROP TRIGGER `uuid`');
    }
}
