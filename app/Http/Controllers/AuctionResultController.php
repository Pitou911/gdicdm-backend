<?php
namespace App\Http\Controllers;
use App\Models\AuctionResult;
use Illuminate\Http\Request;

class AuctionResultController extends Controller {

    public function index() {
        return response()->json(AuctionResult::orderByDesc('auction_date')->get());
    }

    public function store(Request $request) {
        $data = $request->validate([
            'auction_date' => 'required|date',
            'currency'     => 'required|in:KHR,USD',
            'tenor'        => 'required|integer',
            'offered'      => 'required|numeric',
            'bidding'      => 'required|numeric',
            'accepted'     => 'required|numeric',
            'coupon'       => 'required|numeric',
            'cover_ratio'  => 'required|numeric',
            'investors'    => 'required|integer',
            'status'       => 'required|in:settled,pending',
        ]);

        // auto generate title and date_label
        $date           = \Carbon\Carbon::parse($data['auction_date']);
        $data['date_label'] = $date->format('d M Y');
        $dateStr        = $date->format('dmY');
        $data['title']  = "{$data['currency']}_GS_{$data['tenor']}Y_{$dateStr}";

        return response()->json(AuctionResult::create($data), 201);
    }

    public function update(Request $request, $id) {
        $item = AuctionResult::findOrFail($id);
        $data = $request->validate([
            'auction_date' => 'sometimes|date',
            'currency'     => 'sometimes|in:KHR,USD',
            'tenor'        => 'sometimes|integer',
            'offered'      => 'sometimes|numeric',
            'bidding'      => 'sometimes|numeric',
            'accepted'     => 'sometimes|numeric',
            'coupon'       => 'sometimes|numeric',
            'cover_ratio'  => 'sometimes|numeric',
            'investors'    => 'sometimes|integer',
            'status'       => 'sometimes|in:settled,pending',
        ]);

        // regenerate title if date/currency/tenor changed
        if (isset($data['auction_date']) || isset($data['currency']) || isset($data['tenor'])) {
            $date           = \Carbon\Carbon::parse($data['auction_date'] ?? $item->auction_date);
            $currency       = $data['currency'] ?? $item->currency;
            $tenor          = $data['tenor']    ?? $item->tenor;
            $data['date_label'] = $date->format('d M Y');
            $data['title']  = "{$currency}_GS_{$tenor}Y_{$date->format('dmY')}";
        }

        $item->update($data);
        return response()->json($item);
    }

    public function destroy($id) {
        AuctionResult::findOrFail($id)->delete();
        return response()->json(['deleted' => true]);
    }
}