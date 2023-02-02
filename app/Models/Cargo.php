<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cargo extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'cargos';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'count',
        'unit',
        'amount',
        'weight',
        'total_value',
        'currency',
        'source_area',
        'product_record_no',
        'brand',
        'statebarcode',
        'specifications',
        'goods_code',
        'good_prepard_no',
        'hs_code',
        'hts_code',
        'hts_desc',
        'item_no',
        'qty_1',
        'unit_1',
        'qty_2',
        'unit_2',
        'good_url',
        'shipment_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function shipment()
    {
        return $this->belongsTo(Shipment::class, 'shipment_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
