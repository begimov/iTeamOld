<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsInCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->string('city');
            $table->string('leader');
            $table->string('secretary');
            $table->string('contacts');
            $table->integer('learn_id');
            $table->date('date_start');
            $table->date('date_finish');
            $table->string('result_project');
            $table->string('review');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn([
                'city',
                'leader',
                'secretary',
                'contacts',
                'learn_id',
                'date_start',
                'date_finish',
                'result_project',
                'review'
            ]);
        });
    }
}
