<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LocalServiceProvider extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'local_service_providers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'pu_agent',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function localServiceProviderShipments()
    {
        return $this->hasMany(Shipment::class, 'local_service_provider_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
