<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class AuctionResult extends Model {
    protected $fillable = [
        'auction_date', 'date_label', 'currency', 'tenor',
        'title', 'offered', 'bidding', 'accepted',
        'coupon', 'cover_ratio', 'investors', 'status',
    ];
}