<?php

namespace App\Http\Controllers;
//subscription, user, plan
use App\Models\Subscription;
use App\Models\User;
use App\Models\Plan;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    //
    public function index()
    {
        return view('admin.subscription.index', [
            'subscriptions' => Subscription::orderBy('id', 'ASC')->paginate(10),
            'users' => User::all(),
            'plans' => Plan::all()
        ]);


    }
}
