<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Supplier extends Model
{
    use HasFactory;

    protected $keyType = 'string'; // UUID
    public $incrementing = false; // Desactiva el incremento automático
    protected $fillable = [
        'name', 'contact', 'phone'
    ];

    /**
     * Relación muchos a muchos con los productos
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_supplier');
    }

    /**
     * Relación uno a muchos con las órdenes de proveedor
     */
    public function orders(): HasMany
    {
        return $this->hasMany(SupplierOrder::class);
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
