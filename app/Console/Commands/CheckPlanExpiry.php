<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CheckPlanExpiry extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-plan-expiry';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check mini website plan expiry and update status';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // டெஸ்ட் செய்வதற்காக addYear(1) சேர்த்துள்ளீர்கள், நிஜமாக ஓடும்போது இதை நீக்கிவிடவும்
        $today = \Carbon\Carbon::now('Asia/Kolkata');
        // $today = \Carbon\Carbon::now('Asia/Kolkata')->addYear(1);

        $planDays = [
            94 => 90,
            95 => 180,
            96 => 365,
        ];

        $activePlans = DB::table('miniweb_plan_purchase')
            ->join('miniweb_company_details', 'miniweb_plan_purchase.id', '=', 'miniweb_company_details.purchased_id')
            ->whereIn('miniweb_plan_purchase.plan_id', [94, 95, 96])
            ->where('miniweb_plan_purchase.plan_expiry_status', 0) 
            ->where('miniweb_company_details.is_live', 1) 
            ->select(
                'miniweb_plan_purchase.id as purchase_id',
                'miniweb_plan_purchase.plan_id',
                'miniweb_plan_purchase.txn_date',
                'miniweb_company_details.id as company_id'
            )
            ->get();

        if ($activePlans->isEmpty()) {
            $this->info("No active plans found to check.");
            return;
        }

        foreach ($activePlans as $plan) {
            $days = $planDays[$plan->plan_id];
            $expiryDate = \Carbon\Carbon::parse($plan->txn_date, 'Asia/Kolkata')->addDays($days);

            if ($today->greaterThan($expiryDate)) {
                DB::transaction(function () use ($plan) {
                    // 1. Company Table Update
                    DB::table('miniweb_company_details')
                        ->where('id', $plan->company_id)
                        ->update([
                            'is_live' => 0,
                            'plan_expiry_msg' => 'plan is auto expiry'
                        ]);

                    // 2. Purchase Table Update
                    DB::table('miniweb_plan_purchase')
                        ->where('id', $plan->purchase_id)
                        ->update(['plan_expiry_status' => 1]);
                });
            }
        }

        $this->info("Expiry check completed successfully.");
    }
}
