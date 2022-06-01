<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Str;

class CallbackController extends Controller
{
    public function index(Request $request): Redirector|Application|RedirectResponse
    {
        $request->session()->put('state', $state = Str::random(10));

        $query = http_build_query([
            'client_id' => env('client_id'),
            'redirect_uri' => 'http://127.0.0.1:8000/callback',
            'response_type' => 'code',
            'scope' => '',
            'state' => $state
        ]);

        dd($query);

        return redirect('http://127.0.0.1:8000/oauth/authorize?'.$query);
    }
}
