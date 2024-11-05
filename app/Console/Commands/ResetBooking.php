<?php

namespace App\Console\Commands;

use App\Models\Booking;
use App\Models\BookingTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;

class ResetBooking extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'booking:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset booking room seat to default';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $bookings = Booking::where('status', null)->get();
        foreach ($bookings as $item) {
            if ($item->check_in != null) { // sudah checkin
                $item->update([
                    "status" => "done"
                ]);
                
                // reset kursi yg dibooking
                BookingTime::where('id', $item->booking_time_id)->update([
                    "booked" => DB::raw('booked - ' . $item->booking_seat)
                ]);
            }else{ // belum checkin
                $item->update([
                    "status" => "canceled"
                ]);
            }
        }
    }
}
