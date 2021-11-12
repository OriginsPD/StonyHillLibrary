<div x-data="{ isOpen: false }"
     x-on:show-modal.window="isOpen = true"
     x-on:close-modal.window="isOpen = false"
     class="w-10/12 ">

    <main
        class="flex-1 flex flex-col bg-gray-700 transition
		duration-500 ease-in-out h-screen overflow-y-auto">

        <div class=" my-2 sticky top-0 overflow-hidden left-0">


            <h2 class="my-4 mx-10 italic text-xl border-b border-gray-500 pb-4 font-semibold text-gray-400">

                All Books

            </h2>

            <div class="fixed right-0 shadow-xl w-5/12 ">

                <x-alerts :message="session('success')" alpName="isAlert">

                    <x-alerts.close/>

                </x-alerts>

            </div>


            <div class="w-full mx-auto">

                <x-table title="Book Issued">

                    <x-slot name="headerBtn">

                        <x-table.button.top wire:click.prevent="issueBook">

                            Add Book

                        </x-table.button.top>

                    </x-slot>

                    <x-slot name="head">

                        <x-table.head> title</x-table.head>

                        <x-table.head> Member</x-table.head>

                        <x-table.head> Date Issued</x-table.head>

                        <x-table.head> Date Due</x-table.head>

                        <x-table.head> Number of Copies</x-table.head>

                        <x-table.head> Status</x-table.head>

                        <x-table.head> Over Due Status</x-table.head>

                        <x-table.head> Process By</x-table.head>

                        <x-table.head> Date Return</x-table.head>

                        <x-table.head> Collected By</x-table.head>

                        <x-table.head></x-table.head>


                    </x-slot>



                    @forelse($issues as $issue)

                        <x-table.row>

                            <x-table.cell> {{ $issue->bookDetail->title }} </x-table.cell>

                            <x-table.cell> {{ $issue->member->username }} </x-table.cell>

                            <x-table.cell> {{ $issue->date_borrowed }} </x-table.cell>

                            <x-table.cell> {{ $issue->due_date }} </x-table.cell>

                            <x-table.cell> {{ $issue->num_copies }} </x-table.cell>

                            <x-table.cell> {{ ($issue->status) ? 'Return' : 'Still Out' }} </x-table.cell>

                            <x-table.cell>

                                    {{ ($issue->over_due) ? 'Over Due' : 'Not Over Due' }}


                            </x-table.cell>

                            <x-table.cell> {{ ($issue->user === null) ? 'Still Out' : $issue->user->username }} </x-table.cell>

                            <x-table.cell> {{ ($issue->date_return === null) ? "Haven't Return Yet" : $issue->date_return }} </x-table.cell>

                            <x-table.cell> {{ ($issue->received_by === null) ? 'Still Out' : $issue->received_by  }} </x-table.cell>

                            <x-table.cell>

                                <div class="flex space-x-4">

                                    <x-table.button.action wire:click.prevent="alterIssue({{ $issue }})">

                                        Return

                                    </x-table.button.action>

                                </div>

                            </x-table.cell>


                        </x-table.row>

                    @empty

                        <x-table.row class="bg-gray-400">

                            <x-table.cell colspan="10" class="text-center italic text-lg">

                                No Issue Books Found

                            </x-table.cell>

                        </x-table.row>

                    @endforelse

                </x-table>

                <div class="p-4">

                    {{ $issues->links() }}

                </div>

            </div>


            <x-modal alpName="isOpen">

                <x-form wire:submit.prevent="{{ ($newIssue) ? 'createIssue' : 'alterIssue' }}"
                        @click.away="isOpen = false"
                        class="w-10/12" grid="2">

                    <x-slot name="title">

                        <h2 class="text-lg font-semibold text-gray-700 pb-1 border-b border-gray-300
                                                capitalize dark:text-white">

                            {{ ($newIssue) ? 'New Issue Book ' : 'Updated Issue Book ' }}

                        </h2>

                    </x-slot>

                    <x-input.label for="issue.book_id" label="Select Book">

                        <x-input.select wire:model.debounce.500ms="issue.book_id"
                                        :option="$books" field="title"
                                      :error="$errors->first('issue.book_id')"/>

                    </x-input.label>

                    <x-input.label for="issue.borrower_id" label="Select Member">

                        <x-input.select wire:model.debounce.500ms="issue.borrower_id"
                                        :option="$members" field="username"
                                      :error="$errors->first('issue.borrower_id')"/>

                    </x-input.label>

                    <x-input.label for="issue.num_copies" label="Number of Copies">

                        <x-input.text wire:model.debounce.500ms="issue.num_copies" type="number"
                                      :error="$errors->first('issue.num_copies')"/>

                    </x-input.label>

                    <x-input.label for="issue.due_date" label="Date For Book Return">

                        <x-input.text wire:model.debounce.500ms="issue.due_date" type="date"
                                      :error="$errors->first('issue.due_date')"/>

                    </x-input.label>

                    <x-input.submit>

                        <span wire:loading> <i class="fas fa-spinner-third animate-spin"></i> </span>

                        {{ ($newIssue) ? 'Create Issue Book' : 'Update Issue Books' }}

                    </x-input.submit>

                </x-form>

            </x-modal>


        </div>

    </main>

</div>
