<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\LogSummary;
use Illuminate\Support\Carbon;

class PagesController extends Controller
{

    public function index()
    {

        if(auth()->check()){
            return redirect()->route('dashboard');
        }

        return view('welcome');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function api_dashboard()
    {
        $userID =  auth()->user()->id;

        $startDate = Carbon::now()->subDays(1)->toDateString();
        $endDate = Carbon::now()->addDay(1)->toDateString();

        $logSummary = LogSummary::where('user_id', $userID)
            ->orderByDesc('created_at')
            ->first();

        $logs = Log::where('message', $userID)
            ->whereBetween('datetime', [$startDate, $endDate])
            ->orderByDesc('datetime')
            ->limit(100)
            ->get();

        return view('api-dashboard', compact('logSummary', 'logs'));
    }
}
