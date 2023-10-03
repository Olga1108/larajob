<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;

class JoblistingController extends Controller
{
    public function index(Request $request)
    {
        $salary = $request->query('salary');
        $date = $request->query('date');
        $jobType = $request->query('job_type');

        $listings = Listing::query();

        if ($salary === 'salary_high_to_low') {
            $listings->orderByRaw('CAST(salary AS UNSIGNED) DESC');
        } elseif ($salary === 'salary_low_to_high') {
            $listings->orderByRaw('CAST(salary AS UNSIGNED) ASC');
        }

        if ($date === 'latest') {
            $listings->orderBy('created_at', 'desc');
        } elseif ($date === 'oldest') {
            $listings->orderBy('created_at', 'asc');
        }

        if ($jobType === 'fulltime') {
            $listings->where('job_type', 'fulltime');
        } elseif ($jobType === 'parttime') {
            $listings->where('job_type', 'parttime');
        } elseif ($jobType === 'contract') {
            $listings->where('job_type', 'contract');
        } elseif ($jobType === 'casual') {
            $listings->where('job_type', 'casual');
        }

        $jobs = $listings->with('profile')->get();
        return view('home', compact('jobs'));
    }

    public function show(Listing $listing)
    {
        return view('show', compact('listing'));
    }

    public function company($id)
    {
        $company = User::where('id', $id)->where('user_type', 'employer')->first();
        return view('company', compact('company'));
    }
}
