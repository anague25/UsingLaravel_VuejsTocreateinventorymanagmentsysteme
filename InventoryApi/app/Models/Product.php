<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'supplier_id',
        'productName',
        'productCode',
        'root',
        'buyingPrice',
        'image',
        'sellingPrice',
        'buyingDate',
        'productQuantity',
    ];


    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function suppliers(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function commands(): BelongsToMany
    {
        return $this->belongsToMany(Command::class);
    }
}
