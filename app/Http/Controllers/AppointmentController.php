<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function show()
    {
        $appointments = Appointment::where('ends_at', '>', Carbon::now()->toDateTimeString())
            ->orWhere(function ($query) {
                $query->whereNull('ends_at')
                    ->where('starts_at', '>=', Carbon::now()->toDateString());
            })
            ->orderBy('starts_at', 'ASC')->get();
        
        return view('termine', compact('appointments'));
    }
}
