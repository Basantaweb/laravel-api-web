<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Item extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'price',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'price' => 'decimal:2',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Do nothing on creating, we will set hashid after the item is created
        });

        static::created(function ($model) {
            $model->hashid = Hashids::encode($model->id);
            $model->save();
        });

        static::updated(function ($model) {
            // Ensure hashid is updated or created again if necessary
            if (empty($model->hashid)) {
                $model->hashid = Hashids::encode($model->id);
                $model->save();
            }
        });
    }
}
