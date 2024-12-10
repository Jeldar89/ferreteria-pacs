<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductCategory extends Model
{
    /** @use HasFactory<\Database\Factories\ProductCategoryFactory> */
    use HasFactory;

    public $timestamps = false; // No tiene columnas de fecha (created_at, updated_at)
    protected $fillable = ['product_id', 'category_id'];

    // Indicar que el campo id es un UUID y no un entero auto-incremental
    protected $keyType = 'string';
    public $incrementing = false;

    // Asegúrate de que el ID se genere automáticamente
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->id) {
                $model->id = (string) Str::uuid(); // Genera un UUID automáticamente
            }
        });
    }
}
