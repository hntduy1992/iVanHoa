<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ql_danh-hieu', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('maQuyetDinh')->index();
            $table->string('tenDanhHieu');
            $table->json('donViApDung');
        });
        Schema::create('ql_quyet-dinh', function (Blueprint $table) {
            $table->id();
            $table->integer('nam')->index();
            $table->string('soHieu')->index();
            $table->string('trichYeu');
            $table->string('path')->comment('Đường dẫn file');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dashboard_ket-qua-danh-gia-nam');
    }
};
