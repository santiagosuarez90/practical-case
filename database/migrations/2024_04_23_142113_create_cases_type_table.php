<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasesTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cases_type', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('description', 100);
            $table->boolean('status')->default(false);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable();
        });

        DB::table('cases_type')->insert(
            [
                ['name' => 'Juridico', 'description' => 'Juridico', 'status' => true],
                ['name' => 'Legal', 'description' => 'Legal', 'status' => true],
                ['name' => 'Familiar', 'description' => 'Familiar', 'status' => true],
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
        Schema::dropIfExists('cases_type');
    }
}
