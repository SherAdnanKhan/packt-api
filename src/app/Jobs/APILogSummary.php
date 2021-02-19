<?php

namespace App\Jobs;

use App\Models\Log;
use App\Models\LogSummary;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class APILogSummary implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $startDate = Carbon::now()->subDays(2)->toDateString();
        $endDate = Carbon::now()->toDateString();

        /** @var Collection $users */
        $users = User::select('id')->whereNotNull('email_verified_at')->get();

        /** @var Collection $allLogs */
        $allLogs = Log::select('message', 'context')->whereBetween('datetime', [$startDate, $endDate])->get();

        $logSummary = [];

        $users->each(function($user) use ($allLogs, &$logSummary) {
            $currentUserLog = $allLogs->filter(function($log) use ($user) {
                    return $log->message == $user->id;
            });


            if($this->getSummaryFromLogs($currentUserLog)) {
                if($this->getSummaryFromLogs($currentUserLog)['total'] > 0) {
                    LogSummary::create([
                        'user_id' => $user->id,
                        'summary' => $this->getSummaryFromLogs($currentUserLog)
                    ]);
                }
            }
        });
    }


    /**
     * Get summary array from Logs collection
     * @param Collection $logs
     * @return array
     */
    private function getSummaryFromLogs(Collection $logs) : array
    {
        $summary = [
            'endpointCount' => [],
            'total' => $logs->count()
        ];


        $logs->each(function ($log) use(&$summary) {
            if(array_key_exists($log->context['endpointName'], $summary['endpointCount'])) {
                $summary['endpointCount'][$log->context['endpointName']]++;
            } else {
                $summary['endpointCount'][$log->context['endpointName']] = 1;
            }
        });

        return $summary;
    }
}
