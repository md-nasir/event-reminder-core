<?php

namespace App\Models;

use App\Traits\AccessTableName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Enums\EventStatus;
use Carbon\Carbon;
/**
 * Class Event
 * @package App\Models
 */
class Event extends Model
{
    use HasFactory, SoftDeletes, AccessTableName;

    protected $fillable = [
        'title',
        'code',
        'description',
        'location',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'time_zone',
        'status',
        'created_by_id',
        'updated_by_id',
    ];

    public function getFormattedStartTimeAttribute()
    {
        return Carbon::parse($this->start_time)->format('h:i A');
    }

    public function getFormattedEndTimeAttribute()
    {
        return Carbon::parse($this->end_time)->format('h:i A');
    }

}
