<div>

    <div>

        <div class="mt-3 p-6 bg-white border-b border-gray-200">

            <form action="/oauth/clients" method="POST" class="space-y-2">

                @csrf

                <div>

                    <x-input.label for="Name" label="Name">

                        <x-input.text type="text" name="name" placeholder="Client's Name"/>

                    </x-input.label>

                </div>

                <div>

                    <x-input.label for="redirect" label="Redirect">

                        <x-input.text type="text" name="redirect" placeholder="Http://my-url.com/callback"/>

                    </x-input.label>

                </div>

                <div>

                    <x-input.submit type="submit"> Create Client</x-input.submit>

                </div>

            </form>

        </div>


    </div>


</div>
