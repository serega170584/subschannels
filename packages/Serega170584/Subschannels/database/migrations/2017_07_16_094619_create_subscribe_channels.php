<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;
use Serega170584\Subschannels\Models\Subschannels;

/**
 * Class CreateSubscribeChannels
 */
class CreateSubscribeChannels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribe_channels', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 10);
        });

        Schema::create('subscribe_channels_to_users', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('subscribe_channel_id')->unsigned();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('subscribe_channel_id')
                ->references('id')->on('subscribe_channels')
                ->onDelete('cascade');
        });

        Subschannels::create([
            'name' => 'test 1',
        ]);

        Subschannels::create([
            'name' => 'test 2',
        ]);

        Subschannels::create([
            'name' => 'test 3',
        ]);

        Subschannels::create([
            'name' => 'test 4',
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscribe_channels_to_users');
        Schema::dropIfExists('subscribe_channels');
    }
}
