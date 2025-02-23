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
        Schema::create('dashboard_ket-qua-danh-gia-nam', function (Blueprint $table) {
            $table->id();
            $table->integer('namDanhGia')->index();
            $table->unsignedInteger('maDanhHieu')->index();
            $table->integer('tongDonVi')->comment('Tổng số lượng đơn vị tham gia đánh giá');
            $table->integer('tongDatChuan')->comment('Tổng số lượng đơn vị đạt tiêu chuẩn');
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
