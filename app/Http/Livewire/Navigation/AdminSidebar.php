<?php

namespace App\Http\Livewire\Navigation;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminSidebar extends Component
{
    public function render()
    {
        return view('livewire.navigation.admin-sidebar');
    }

    public function logout(): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        Auth::logout();

        session()->invalidate();

        session()->regenerateToken();

        return redirect('/');
    }
}
