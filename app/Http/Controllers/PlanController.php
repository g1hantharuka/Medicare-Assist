<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class PlanController extends Controller
{
    //index function for just return view
    public function index()
    {
        return view('pages.pricing');
    }

    //public function show which takes a plan and request
    public function show(Plan $plan, Request $request)
    {
        //intent to create a new subscription
        $intent = auth()->user()->createSetupIntent();
        //return view with plan and user
        return view('pages.subscription', compact('plan', 'intent'));
    }

    public function subscription(Request $request)
    {
        $plan = Plan::find($request->plan);

        $subscription = $request->user()->newSubscription($request->plan, $plan->stripe_plan)
                        ->create($request->token);

        // return view("pages.subscription_success");
        // pass the plan to the view
        return view('pages.subscription_success', compact('plan'));
    }

    // public function subscription(Request $request)
    // {
    //     $plan = Plan::find($request->plan);

    //     $subscription = $request->user()->newSubscription($request->plan, $plan->stripe_plan)
    //                     ->create($request->token);

    //     return view('pages.subscription_success', compact('plan'));
    // }





}
