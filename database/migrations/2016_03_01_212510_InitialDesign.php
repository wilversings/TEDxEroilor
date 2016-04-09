<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitialDesign extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table) {

			$table->increments('id');

            $table->enum('type', ['salon', 'youth', 'women']);

            $table->string("name_en");
            $table->string("location_en");
            $table->text("description_en");

            $table->string("name_ro");
            $table->string("location_ro");
            $table->text("description_ro");

            $table->datetime('datetime');
            
			$table->timestamps();

		});
        
        
        
        Schema::create('speakers', function (Blueprint $table) {

            $table->increments('id');

            $table->string('name');
            $table->text('link')->nullable();
            
            $table->text("description_ro");
            
            $table->text("description_en");
            
            $table->timestamps();

        });
        
        Schema::create('event_speaker', function (Blueprint $table) {
           
           $table->increments('id');
           
           $table->integer('event_id')->unsigned()->nullable();
           $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
           
           $table->integer('speaker_id')->unsigned()->nullable();
           $table->foreign('speaker_id')->references('id')->on('speakers')->onDelete('cascade');
           
        });
		
        Schema::create('teamMembers', function (Blueprint $table) {

            $table->increments('id');

            $table->string('name');
            $table->string('email')->nullable();
            $table->text('link')->nullable();
            
            $table->string("superpower_en");
            $table->string("position_en");
            
            $table->string("superpower_ro");
            $table->string("position_ro");
            
            $table->timestamps();

        });

        Schema::create('advisers', function (Blueprint $table) {

            $table->increments('id');

            $table->string('name');
            $table->text('link')->nullable();
            
            $table->string('position_en');
            
            $table->string('position_ro');
            
            $table->text('description_en');
            $table->text('description_ro');
            
            $table->timestamps();

        });

        Schema::create('alumni', function (Blueprint $table) {

            $table->increments('id');

            $table->string('name');
            $table->text('link')->nullable();
            
            $table->string("position_ro");
            $table->string("position_en");
            
            $table->timestamps();

        });
        
        Schema::create('partnershipTypes', function (Blueprint $table) {

            $table->increments('id');
            
            $table->integer('priority_index')->unsigned();
            $table->integer('text_size')->unsigned();
            
            $table->string("name_en");
            $table->text("description_en");
            
            $table->string("name_ro");
            $table->text("description_ro");
            
            $table->timestamps();

        });

        Schema::create('partners', function (Blueprint $table) {

            $table->increments('id');

            $table->string('name');
            $table->integer('partnershipType_id')->unsigned()->nullable();
            $table->foreign('partnershipType_id')->references('id')->on('partnershipTypes')->onDelete('set null');
            $table->integer('priority_index')->unsigned();
            
            $table->timestamps();

        });

        Schema::create('contactFormEntries', function (Blueprint $table) {

            $table->increments('id');

            $table->string('name');
            $table->string('email');
            $table->text('message');

            $table->timestamps();

        });


	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('events');

        Schema::drop('teamMembers');

        Schema::drop('advisers');

        Schema::drop('alumni');

        Schema::drop('speakers');

        Schema::drop('partnershipTypes');

        Schema::drop('partners');

        Schema::drop('contactFormEntries');

	}

}
