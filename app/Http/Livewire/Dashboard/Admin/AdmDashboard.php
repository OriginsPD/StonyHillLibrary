<?php

namespace App\Http\Livewire\Dashboard\Admin;

use App\Models\Member;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class AdmDashboard extends Component
{

    use WithPagination;

    public Member $member;
    public bool $newMember = false;

    protected $listeners = ['refresh' => 'mount'];

    protected $rules = [
        'member.username' => 'required',
        'member.contact' => 'required',
        'member.email' => 'required|email'
    ];

    public function createMember()
    {
        $this->validate();

        Member::create([
            'username' => $this->member->username,
            'contact' => $this->member->contact,
            'email' => $this->member->email,
        ]);

        session()->flash('success', 'Member Created');

        sleep(2);
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('show-alert');
    }

    public function alterMember(): void
    {
        $this->validate();

        Member::where('id',$this->member->id)
            ->update([
                'username' => $this->member->username,
                'contact' => $this->member->contact,
                'email' => $this->member->email,
            ]);

        session()->flash('success', 'Member Updated');

        sleep(2);
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('show-alert');

        $this->emitSelf('refresh');
    }

    public function updated()
    {
        $this->validate();
    }

    public function addMember(): void
    {
        $this->newMember = true;

        $this->emitSelf('refresh');

        $this->dispatchBrowserEvent('show-modal');
    }

    public function editMember(Member $selectMember): void
    {
        $this->member = $selectMember;

        $this->newMember = false;
        $this->dispatchBrowserEvent('show-modal');
    }

    public function mount(): void
    {
        $this->member = new Member;
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.dashboard.admin.adm-dashboard', [
            'members' => Member::paginate(5),
        ])
            ->extends('layouts.admin');
    }
}
