<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class SupplierOrder extends Model
{
    use HasFactory;

    protected $keyType = 'string'; // UUID
    public $incrementing = false; // Desactiva el incremento automático
    protected $fillable = [
        'supplier_id', 'date', 'total'
    ];

    /**
     * Relación uno a muchos con los detalles de órdenes
     */
    public function orderDetails(): HasMany
    {
        return $this->hasMany(SupplierOrderDetail::class);
    }

    public function details(): HasMany
    {
        return $this->hasMany(SupplierOrderDetail::class, 'order_id', 'id');
    }

    /**
     * Relación inversa con el proveedor
     */
    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

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
