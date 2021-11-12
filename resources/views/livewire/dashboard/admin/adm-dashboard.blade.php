<div x-data="{ isOpen: false }"
     x-on:show-modal.window="isOpen = true"
     x-on:close-modal.window="isOpen = false"
    class="w-10/12 ">

    <main
        class="flex-1 flex flex-col bg-gray-700 transition
		duration-500 ease-in-out h-screen overflow-y-auto">

        <div class="mx-10 my-2 sticky top-0 overflow-hidden left-0">


            <h2 class="my-4 italic text-xl border-b border-gray-500 pb-4 font-semibold text-gray-400">

                Dashboard

            </h2>


        </div>

        <div class="fixed right-0 shadow-xl w-5/12 ">

            <x-alerts :message="session('success')" alpName="isAlert" >

                <x-alerts.close/>

            </x-alerts>

        </div>

            <x-table title="Members Details">

                <x-slot name="headerBtn">

                    <x-table.button.top wire:click.prevent="addMember">

                        Add Member

                    </x-table.button.top>

                </x-slot>

                <x-slot name="head">

                    <x-table.head> Username</x-table.head>

                    <x-table.head> Email</x-table.head>

                    <x-table.head> Contact</x-table.head>

                    <x-table.head></x-table.head>

                </x-slot>

                @forelse($members as $member)

                    <x-table.row>

                        <x-table.cell> {{ $member->username }} </x-table.cell>

                        <x-table.cell> {{ $member->email }} </x-table.cell>

                        <x-table.cell> {{ $member->contact }} </x-table.cell>

                        <x-table.cell>

                            <div class="flex space-x-4">

                                <x-table.button.action wire:click.prevent="editMember({{ $member }})">

                                    Edit

                                </x-table.button.action>

                            </div>

                        </x-table.cell>


                    </x-table.row>

                @empty

                    <x-table.row class="bg-gray-400">

                        <x-table.cell colspan="4" class="text-center italic text-lg">

                            No Members Found

                        </x-table.cell>

                    </x-table.row>

                @endforelse

            </x-table>

            <div class="p-4">

                {{ $members->links() }}

            </div>



      <x-modal alpName="isOpen">

            <x-form wire:submit.prevent="{{ ($newMember) ? 'createMember' : 'alterMember' }}"
                @click.away="isOpen = false"
                class="w-10/12" grid="2">

                <x-slot name="title">

                    <h2 class="text-lg font-semibold text-gray-700 pb-1 border-b border-gray-300
                                capitalize dark:text-white">

                       {{ ($newMember) ? 'New Member Details' : 'Edit Member Details' }}

                    </h2>

                </x-slot>

                <x-input.label for="member.username" label="Username">

                    <x-input.text  wire:model.debounce.500ms="member.username" type="text"
                                   :error="$errors->first('member.username')" />

                </x-input.label>

                <x-input.label for="member.email" label="Email">

                    <x-input.text  wire:model.debounce.500ms="member.email" type="email"
                                   :error="$errors->first('member.email')" />

                </x-input.label>

                <x-input.label for="member.contact" label="Contact Details">

                    <x-input.text  wire:model.debounce.500ms="member.contact" type="text"
                                   :error="$errors->first('member.contact')" />

                </x-input.label>

                <x-input.submit>

                    <span wire:loading> <i class="fas fa-spinner-third animate-spin "></i> </span>

                    {{ ($newMember) ? 'Create Member' : 'Update Members' }}

                </x-input.submit>

            </x-form>

      </x-modal>

    </main>

</div>
