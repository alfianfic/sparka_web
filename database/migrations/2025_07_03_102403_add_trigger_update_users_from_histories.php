<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTriggerUpdateUsersFromHistories extends Migration
{
    public function up(): void
    {
        DB::unprepared('
            CREATE TRIGGER trg_update_users_after_insert
            AFTER INSERT ON histories
            FOR EACH ROW
            BEGIN
                UPDATE users
                SET 
                    CO = (
                        SELECT CO FROM histories 
                        WHERE histories.user_id = NEW.user_id 
                        ORDER BY created_at DESC LIMIT 1
                    ),
                    FEV1 = (
                        SELECT FEV1 FROM histories 
                        WHERE histories.user_id = NEW.user_id 
                        ORDER BY created_at DESC LIMIT 1
                    ),
                    FVC = (
                        SELECT FVC FROM histories 
                        WHERE histories.user_id = NEW.user_id 
                        ORDER BY created_at DESC LIMIT 1
                    )
                WHERE id = NEW.user_id;
            END
        ');
    }

    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS trg_update_users_after_insert');
    }
}
