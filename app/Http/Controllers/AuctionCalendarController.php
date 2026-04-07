<?php
namespace App\Http\Controllers;
use App\Models\AuctionCalendar;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AuctionCalendarController extends Controller {

    public function index() {
        return response()->json(AuctionCalendar::orderBy('auction_date')->get());
    }

    public function store(Request $request) {
        $data = $request->validate([
            'auction_date' => 'required|date',
            'tenors'       => 'required|array|min:1',
            'tenors.*'     => 'in:1Y,2Y,3Y,5Y,10Y,15Y',
        ]);

        $date              = Carbon::parse($data['auction_date']);
        $data['date_label'] = $date->format('d M');
        $data['month']     = $date->format('F');

        return response()->json(AuctionCalendar::create($data), 201);
    }

    public function update(Request $request, $id) {
        $item = AuctionCalendar::findOrFail($id);
        $data = $request->validate([
            'auction_date' => 'sometimes|date',
            'tenors'       => 'sometimes|array|min:1',
            'tenors.*'     => 'in:1Y,2Y,3Y,5Y,10Y,15Y',
        ]);

        if (isset($data['auction_date'])) {
            $date              = Carbon::parse($data['auction_date']);
            $data['date_label'] = $date->format('d M');
            $data['month']     = $date->format('F');
        }

        $item->update($data);
        return response()->json($item);
    }

    public function destroy($id) {
        AuctionCalendar::findOrFail($id)->delete();
        return response()->json(['deleted' => true]);
    }
}