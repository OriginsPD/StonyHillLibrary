<?php

namespace App\Http\Livewire\Dashboard\Admin;

use App\Models\BookDetail;
use App\Models\BorrowedBook;
use App\Models\Member;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Nette\Utils\DateTime;

class AdmIssue extends Component
{

    public BorrowedBook $issue;
    public bool $newIssue = false;

    protected $rules = [
        'issue.book_id' => 'required',
        'issue.borrower_id' => 'required',
//        'issue.date_borrowed' => 'required',
        'issue.due_date' => 'required',
        'issue.num_copies' => 'required',
//        'issue.date_return' => 'required|after:due_date',
    ];

    public function createIssue(): void
    {
        $this->validate();

        $this->issue->date_borrowed = date('Y-m-d');

        $this->issue->status = 0;

        $this->issue->process_by = auth()->id();

        $this->issue->save();

        session()->flash('success', 'New Book Issued');

        sleep(2);
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('show-alert');
    }

    public function alterIssue(BorrowedBook $selectIssue): void
    {

        $this->issue = $selectIssue;

        $this->issue->date_borrowed = date('Y-m-d');

        $this->issue->date_return = date('Y-m-d');

        $this->issue->status = 1;

        $this->issue->received_by = auth()->id();

        $this->issue->update();

        session()->flash('success', ' Book Issue Return');

        sleep(2);
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('show-alert');

        $this->emitSelf('refresh');
    }

    public function updated()
    {
        $this->validate();
    }

    public function issueBook(): void
    {
        $this->newIssue = true;

        $this->emitSelf('refresh');

        $this->dispatchBrowserEvent('show-modal');
    }


    /**
     * @throws \Exception
     */
    public function mount(): void
    {
        $this->issue = new BorrowedBook;

        $currentIssues = BorrowedBook::all();

         $currently = new DateTime("now");


        foreach ($currentIssues as $currentIssue ){

            $dateDue = new DateTime($currentIssue->due_date);



            if( date_diff($dateDue,$currently)->format('%R%a') >= "-14"){

                BorrowedBook::where('id',$currentIssue->id)
                    ->update([
                        'over_due' => 1,
                    ]);

            }
        }

    }

    public function render(): Factory|View|Application
    {
        return view('livewire.dashboard.admin.adm-issue', [
            'issues' => BorrowedBook::with('bookDetail', 'member', 'user')
                ->paginate(5),
            'books' => BookDetail::all(),
            'members' => Member::all(),
        ])
            ->extends('layouts.admin');
    }
}
