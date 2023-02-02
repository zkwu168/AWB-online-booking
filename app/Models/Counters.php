<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Counters extends Model
{
    use HasFactory;
    public $table = 'counters';
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'key',
        'name',
        'prefix',
        'value',
        'initial_value',
        'step',
    ];
}