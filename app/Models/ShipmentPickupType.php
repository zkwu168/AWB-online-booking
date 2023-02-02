<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShipmentPickupType extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'shipment_pickup_types';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'service_name',
        'is_active',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function pickupTypeShipments()
    {
        return $this->hasMany(Shipment::class, 'pickup_type_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
