<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('blogs_translations', function (Blueprint $table) {
         $table->bigIncrements('id');
            // dil kodunun tutulması için 'locale' alanı oluşturuyoruz
            $table->string('locale')->index();

            // Ana model için ikincil anahtarı tanımlıyoruz.
            $table->unsignedBigInteger('blogs_id');
            $table->unique(['blogs_id', 'locale']);
            $table->foreign('blogs_id')->references('id')->on('blogs')->onDelete('cascade');

            // Dil çevirisinin olmasını istediğimiz alanları oluşturuyoruz.
            $table->string('baslik')->nullable()->default('');
            $table->longText('icerik')->nullable()->default('');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs_translations');
    }
};
