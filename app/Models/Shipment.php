<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipment extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use HasFactory;

    public const ORDER_CERT_TYPE_SELECT = [
        '001'       => 'ID',
        '002' => 'Passport',
    ];

    public const TAX_PAY_TYPE_SELECT = [
        '1' => 'Shipper pay',
        '2' => 'Receiver pay',
    ];

    public $table = 'shipments';

    protected $dates = [
        'payment_time',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'reference_no_1',
        'reference_no_2',
        'mailno',
        'is_gen_bill_no',
        'j_custid',
        'j_email',
        'j_company',
        'j_contact',
        'j_tel',
        'j_mobile',
        'j_area_code',
        'j_country',
        'j_province',
        'j_city',
        'j_county',
        'j_address',
        'j_post_code',
        'd_custid',
        'd_email',
        'd_company',
        'd_contact',
        'd_contact_cn',
        'd_tel',
        'd_mobile',
        'd_area_code',
        'd_country',
        'd_province',
        'd_city',
        'd_county',
        'd_address',
        'd_post_code',
        'tax_pay_type',
        'ddp_remark',
        'cargo_length',
        'cargo_width',
        'cargo_height',
        'cargo_total_weight',
        'express_type',
        'parcel_quantity',
        'tax_set_account',
        'oneself_pickup_flg',
        'pay_method',
        'custid',
        'thd_3_pay_area',
        'trade_condition',
        'express_reason',
        'express_reason_content',
        'buss_remark',
        'custom_batch',
        'harmonized_code',
        'aes_no',
        'receiver_type',
        'order_cert_type',
        'order_cert_no',
        'realweightqty',
        'volumeweightqty',
        'meterageweightqty',
        'currency',
        'freight',
        'buyers_nickname',
        'tax',
        'payment_tool',
        'payment_number',
        'payment_time',
        'print_size',
        'turnover',
        'dynamic_1',
        'source_code',
        'is_baggage',
        'is_return',
        'return_mailno',
        'operate_type',
        'sender_type',
        'export_customer_type',
        'is_under_call',
        'import_customer_type',
        'estimated_freight',
        'actual_freight',
        'paid_freight',
        'created_at',
        'updated_at',
        'deleted_at',
        'outstanding_fee',
        'tracking_id',
        'team_id',
        'status_id',
        'pickup_type_id',
        'local_service_provider_id',
        'sf_api_ref',
        'sf_api_result',
    ];

    public function shipmentCargos()
    {
        return $this->hasMany(Cargo::class, 'shipment_id', 'id');
    }

    public function payment()
    {
        return $this->hasMany(Payment::class, 'shipment_id', 'id');
    }


    public function getPaymentTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setPaymentTimeAttribute($value)
    {
        $this->attributes['payment_time'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function tracking()
    {
        return $this->belongsTo(ShipmentTracking::class, 'tracking_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function status()
    {
        return $this->belongsTo(ShipmentStatus::class, 'status_id');
    }

    public function pickup_type()
    {
        return $this->belongsTo(ShipmentPickupType::class, 'pickup_type_id');
    }

    public function local_service_provider()
    {
        return $this->belongsTo(LocalServiceProvider::class, 'local_service_provider_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function status_plus()
    {
        return $this->hasOne(ShipmentStatusPlus::class,'shipment_id','id');
    }
}
