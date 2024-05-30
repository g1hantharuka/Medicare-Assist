<?php

namespace App\Http\Controllers;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //dashbaord function to return view backends.dashboard
    public function dashboard()
    {
        // Start and end dates for the current month
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        // Fetching data
        $users = User::whereBetween('created_at', [$startDate, $endDate])->get();
        $customers = DB::table('subscription_items')
            ->select('user_id')
            ->distinct()
            ->whereBetween('created_at', [$startDate, $endDate])
            ->count();
        $subscriptionItems = DB::table('subscription_items')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();

        // Price mapping
        $priceMapping = [
            'price_1PJTQFJncBMXlWz2SEsZtgdB' => 70,
            'price_1PJTPKJncBMXlWz2y0ZkBgeH' => 39,
            'price_1PJTO7JncBMXlWz2ZX32QJMG' => 20,
        ];

        // Calculate total sales
        $totalSales = 0;
        foreach ($subscriptionItems as $item) {
            $totalSales += $priceMapping[$item->stripe_price] ?? 0;
        }

        // Formatting data for the chart
        $dates = [];
        $usersData = [];
        $customersData = [];
        $salesData = [];

        $currentDate = $startDate->copy();
        while ($currentDate <= $endDate) {
            $dates[] = $currentDate->format('Y-m-d');
            $usersData[] = $users->where('created_at', '>=', $currentDate->startOfDay())
                                 ->where('created_at', '<=', $currentDate->endOfDay())
                                 ->count();
            $customersData[] = DB::table('subscription_items')
                ->select('user_id')
                ->distinct()
                ->whereBetween('created_at', [$currentDate->startOfDay(), $currentDate->endOfDay()])
                ->count();
            $dailySales = 0;
            foreach ($subscriptionItems as $item) {
                if ($item->created_at >= $currentDate->startOfDay() && $item->created_at <= $currentDate->endOfDay()) {
                    $dailySales += $priceMapping[$item->stripe_price] ?? 0;
                }
            }
            $salesData[] = $dailySales;

            $currentDate->addDay();
        }

        return view('backend.dashboard', [
            'dates' => $dates,
            'users' => $usersData,
            'customers' => $customersData,
            'sales' => $salesData
        ]);
    }


}
