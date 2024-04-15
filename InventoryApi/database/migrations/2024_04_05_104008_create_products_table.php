<?php

use App\Models\Category;
use App\Models\Supplier;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("productName");
            $table->string("productCode")->nullable();
            $table->string("root")->nullable();
            $table->string("buyingPrice")->nullable();
            $table->string("buyingDate")->nullable();
            $table->string("sellingPrice");
            $table->string("image")->nullable();
            $table->string("productQuantity");
            $table->foreignIdFor(Supplier::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Category::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
