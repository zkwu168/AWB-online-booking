<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShipmentStatusPlus extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'shipment_status_plus';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'shipment_id',
        'inbound_condition',
        'wh_location',
        'wh_remark',
        'wh_status',
        'content_check',
        'content_img',
        'issue_code',
        'issue_remark',
        'color',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function shipment()
    {
        return $this->belongsTo(ShipmentProcess::class,'shipment_id');
    }

}
