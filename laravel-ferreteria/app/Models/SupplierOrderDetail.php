<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class SupplierOrderDetail extends Model
{
    use HasFactory;

    protected $keyType = 'string'; // UUID
    public $incrementing = false; // Desactiva el incremento automático
    protected $fillable = [
        'order_id', 'product_id', 'quantity', 'price'
    ];

    /**
     * Relación inversa con la orden de proveedor
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(SupplierOrder::class, 'order_id');
    }

    /**
     * Relación inversa con el producto
     */

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    // Asegúrate de que el ID se genere automáticamente
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         if (!$model->id) {
    //             $model->id = (string) Str::uuid(); // Genera un UUID automáticamente
    //         }
    //     });
    // }
}
