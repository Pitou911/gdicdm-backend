<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class AuctionCalendar extends Model {
    protected $table    = 'auction_calendar';
    protected $fillable = ['auction_date', 'date_label', 'month', 'tenors'];
    protected $casts    = ['tenors' => 'array'];
}