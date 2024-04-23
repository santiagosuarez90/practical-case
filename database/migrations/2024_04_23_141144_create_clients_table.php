<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->string('identification', 10)->primary();
            $table->string('name', 200);
            $table->string('last_name', 200);
            $table->string('cell_phone', 10);
            $table->string('gender', 6);
            $table->string('address', 100);
            $table->boolean('status')->default(false);

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable();
        });

        DB::table('clients')->insert(
            [
                ['identification' => '1719924878', 'name' => 'Andres', 'last_name' => 'Iza', 'cell_phone' => '0996312403', 'gender' => 'MALE', 'address' => 'LA TOLA', 'status' => true],
                ['identification' => '1719924860', 'name' => 'Kevin', 'last_name' => 'Maldonado', 'cell_phone' => '0996312403', 'gender' => 'MALE', 'address' => 'LA TOLA', 'status' => true],
                ['identification' => '1719924850', 'name' => 'Stefany', 'last_name' => 'Castro', 'cell_phone' => '0996312403', 'gender' => 'FEMALE', 'address' => 'LA TOLA', 'status' => true],
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
