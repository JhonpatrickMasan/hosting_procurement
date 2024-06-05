<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMissingColumnsToProcurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('procurements', function (Blueprint $table) {
            if (!Schema::hasColumn('procurements', 'category')) {
                $table->string('category')->nullable();
            }
            if (!Schema::hasColumn('procurements', 'status')) {
                $table->string('status')->nullable();
            }
            if (!Schema::hasColumn('procurements', 'source_funds')) {
                $table->string('source_funds')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('procurements', function (Blueprint $table) {
            if (Schema::hasColumn('procurements', 'category')) {
                $table->dropColumn('category');
            }
            if (Schema::hasColumn('procurements', 'status')) {
                $table->dropColumn('status');
            }
            if (Schema::hasColumn('procurements', 'source_funds')) {
                $table->dropColumn('source_funds');
            }
        });
    }
}
