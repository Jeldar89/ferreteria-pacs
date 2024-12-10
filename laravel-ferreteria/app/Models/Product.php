<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $keyType = 'string'; // Especifica que la clave primaria es un string (UUID)
    public $incrementing = false; // Desactiva el incremento automático
    protected $fillable = [
        'name', 'description', 'price', 'stock'
    ];

    /**
     * Relación muchos a muchos con las categorías
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'product_category');
    }

    /**
     * Relación muchos a muchos con los proveedores
     */
    public function suppliers(): BelongsToMany
    {
        return $this->belongsToMany(Supplier::class, 'product_supplier');
    }

    /**
     * Relación uno a muchos con los detalles de órdenes de proveedor
     */
    public function orderDetails()
    {
        return $this->hasMany(SupplierOrderDetail::class);
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
