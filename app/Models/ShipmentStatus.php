<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShipmentStatus extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'shipment_statuses';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'detail',
        'color',
        'active',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function statusShipments()
    {
        return $this->hasMany(Shipment::class, 'status_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
