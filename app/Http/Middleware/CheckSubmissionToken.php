<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckSubmissionToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Validate the submission token
        if (Session::get('last_submission_token') !== $request->input('submission_token')) {
            // Store the token so it can't be reused
            Session::put('last_submission_token', $request->input('submission_token'));

            return $next($request);
        }

        return redirect()->back()->withErrors(['error' => 'Form has already been submitted.']);
    }
}

