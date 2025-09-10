<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->id(); // bigint(20) unsigned NOT NULL AUTO_INCREMENT
            $table->string('message_id', 255)->nullable()->unique(); // varchar(255) DEFAULT NULL, UNIQUE KEY
            $table->string('subject', 500)->nullable(); // varchar(500) DEFAULT NULL
            $table->string('from_address', 320)->nullable(); // varchar(320) DEFAULT NULL
            $table->text('to_addresses')->nullable(); // text DEFAULT NULL
            $table->text('cc_addresses')->nullable(); // text DEFAULT NULL
            $table->text('bcc_addresses')->nullable(); // text DEFAULT NULL
            $table->dateTime('sent_at')->nullable(); // datetime DEFAULT NULL
            $table->string('status', 50)->default('new'); // varchar(50) NOT NULL DEFAULT 'new'
            $table->boolean('has_attachments')->default(false); // tinyint(1) NOT NULL DEFAULT 0
            $table->string('eml_path', 500)->nullable(); // varchar(500) DEFAULT NULL
            $table->unsignedBigInteger('size_bytes')->default(0); // bigint(20) unsigned NOT NULL DEFAULT 0
            $table->unsignedBigInteger('locked_by_user_id')->nullable(); // bigint(20) unsigned DEFAULT NULL
            $table->timestamp('locked_at')->nullable(); // timestamp NULL DEFAULT NULL
            $table->timestamps(); // created_at, updated_at

            // Índices
            $table->index(['status', 'sent_at'], 'emails_status_sent_at_index');
            $table->foreign('locked_by_user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emails');
    }
};
