<div x-data="{ isOpen: false }"
     x-on:show-modal.window="isOpen = true"
     x-on:close-modal.window="isOpen = false"
     class="w-10/12 ">

    <main
        class="flex-1 flex flex-col bg-gray-700 transition
		duration-500 ease-in-out w-full h-screen overflow-y-auto">

        <div class=" my-2 sticky top-0 overflow-hidden left-0">


            <h2 class="my-4 mx-10 italic text-xl border-b border-gray-500 pb-4 font-semibold text-gray-400">

                All Books

            </h2>

            <div class="fixed right-0 shadow-xl w-5/12 ">

                <x-alerts :message="session('success')" alpName="isAlert" >

                    <x-alerts.close/>

                </x-alerts>

            </div>




                <x-table title="Book Details">

                    <x-slot name="headerBtn">

                        <x-table.button.top wire:click.prevent="addBook">

                            Add Book

                        </x-table.button.top>

                    </x-slot>

                    <x-slot name="head">

                        <x-table.head>  isbn </x-table.head>

                        <x-table.head>  title </x-table.head>

                        <x-table.head>  author </x-table.head>

                        <x-table.head> subject </x-table.head>

                        <x-table.head>  page_no </x-table.head>

                        <x-table.head>  category </x-table.head>

                        <x-table.head>  description </x-table.head>

                        <x-table.head> quantity </x-table.head>

                        <x-table.head></x-table.head>



                    </x-slot>

                    @forelse($books as $book)

                        <x-table.row>

                            <x-table.cell> {{ $book->isbn }} </x-table.cell>

                            <x-table.cell> {{ $book->title }} </x-table.cell>

                            <x-table.cell> {{ $book->author }} </x-table.cell>

                            <x-table.cell> {{ $book->genre->genre_type }} </x-table.cell>

                            <x-table.cell> {{ $book->page_no }} </x-table.cell>

                            <x-table.cell> {{ $book->category->type }} </x-table.cell>

                            <x-table.cell> {{ $book->description }} </x-table.cell>

                            <x-table.cell> {{ $book->quantity }} </x-table.cell>

                            <x-table.cell>

                                <div class="flex space-x-4">

                                    <x-table.button.action wire:click.prevent="editBook({{ $book }})">

                                        Edit

                                    </x-table.button.action>

                                </div>

                            </x-table.cell>


                        </x-table.row>

                    @empty

                        <x-table.row class="bg-gray-400">

                            <x-table.cell colspan="8" class="text-center italic text-lg">

                                No Books Found

                            </x-table.cell>

                        </x-table.row>

                    @endforelse

                </x-table>

                <div class="p-4">

                    {{ $books->links() }}

                </div>


            <div x-data="{ isModal: false }"
                 x-on:category-modal.window="isModal = true"
                 x-on:close-category-modal.window="isModal = false"
                class="flex space-x-4">

                <div class=" w-1/2">

                    <x-table title="Category">
                        <x-slot name="headerBtn">

                            <x-table.button.top wire:click.prevent="addCatogory">
                                Add Category
                            </x-table.button.top>

                        </x-slot>

                        <x-slot name="head">

                            <x-table.head> Category Name </x-table.head>

                            <x-table.head></x-table.head>

                        </x-slot>



                        @forelse($categories as $category)

                            <x-table.row>

                                <x-table.cell> {{ $category->type }} </x-table.cell>

                                <x-table.cell>

                                    <x-table.button.action wire:click.prevent="deleteCategory({{ $category }})">
                                        Delete
                                    </x-table.button.action>

                                </x-table.cell>

                            </x-table.row>

                        @empty

                            <x-table.row>

                                <x-table.cell class="w-full text-center"> No Category Found </x-table.cell>

                            </x-table.row>

                        @endforelse

                    </x-table>

                </div>


                <div class=" w-1/2">

                    <x-table title="All Genre">
                        <x-slot name="headerBtn">

                            <x-table.button.top wire:click.prevent="addGenre">
                                Add Genre
                            </x-table.button.top>

                        </x-slot>

                        <x-slot name="head">

                            <x-table.head> Genre Name</x-table.head>

                            <x-table.head></x-table.head>

                        </x-slot>

                        @forelse($genres as $genre)

                            <x-table.row>

                                <x-table.cell>{{ $genre->genre_type }}</x-table.cell>

                                <x-table.cell>

                                    <x-table.button.action wire:click.prevent="deleteGenre({{ $genre }})">
                                        Delete
                                    </x-table.button.action>

                                </x-table.cell>

                            </x-table.row>

                        @empty

                            <x-table.row>

                                <x-table.cell class="w-full text-center"> No Genre Found</x-table.cell>

                            </x-table.row>

                        @endforelse

                    </x-table>

                    <x-modal alpName="isModal">

                        <x-form wire:submit.prevent="{{ ($newCategory) ? 'createCategory' : 'createGenre' }}"
                                @click.away="isModal = false"
                                class="w-10/12" grid="2">

                            <x-slot name="title">

                                <h2 class="text-lg font-semibold text-gray-700 pb-1 border-b border-gray-300
                                capitalize dark:text-white">

                                    {{ ($newCategory) ? 'New Category Details' : 'New Genre Details' }}

                                </h2>

                            </x-slot>

                            @if($newCategory)

                            <x-input.label for="category.type" label="Category Name">

                                <x-input.text  wire:model.debounce.500ms="category.type" class="appearance-none" type="text"
                                               :error="$errors->first('category.type')" />

                            </x-input.label>


                            @else


                            <x-input.label for="genre.genre_type" label="Genre Name">

                                <x-input.text  wire:model.debounce.500ms="genre.genre_type" class="appearance-none" type="text"
                                               :error="$errors->first('genre.genre_type')" />

                            </x-input.label>

                            @endif

                            <x-input.submit>

                                <span wire:loading> <i class="fas fa-spinner-third animate-spin"></i> </span>

                                {{ ($newCategory) ? 'Create Category' : 'Create Genre' }}

                            </x-input.submit>

                        </x-form>

                    </x-modal>


                </div>

            </div>


            <x-modal alpName="isOpen">

                <x-form wire:submit.prevent="{{ ($newBook) ? 'createBook' : 'alterBook' }}"
                        @click.away="isOpen = false"
                        class="w-10/12" grid="2">

                    <x-slot name="title">

                        <h2 class="text-lg font-semibold text-gray-700 pb-1 border-b border-gray-300
                                capitalize dark:text-white">

                            {{ ($newBook) ? 'New Book Details' : 'Edit Book Details' }}

                        </h2>

                    </x-slot>

                    <x-input.label for="detail.isbn" label="ISBN Number">

                        <x-input.text  wire:model.debounce.500ms="detail.isbn" class="appearance-none" type="number"
                                       :error="$errors->first('detail.isbn')" />

                    </x-input.label>

                    <x-input.label for="detail.title" label="Tile">

                        <x-input.text  wire:model.debounce.500ms="detail.title" type="text"
                                       :error="$errors->first('detail.title')" />

                    </x-input.label>

                    <x-input.label for="detail.author" label="Author">

                        <x-input.text  wire:model.debounce.500ms="detail.author" type="text"
                                       :error="$errors->first('detail.author')" />

                    </x-input.label>

                    <x-input.label for="detail.genre_id" label="Genres">

                        <x-input.select  wire:model.debounce.500ms="detail.genre_id"
                                         field="genre_type" :option="$genres"
                                       :error="$errors->first('detail.genre_id')" />

                    </x-input.label>

                    <x-input.label for="detail.page_no" label="Page Number">

                        <x-input.text  wire:model.debounce.500ms="detail.page_no" class="appearance-none" type="number"
                                       :error="$errors->first('detail.page_no')" />

                    </x-input.label>

                    <x-input.label for="detail.category_id" label="Subject">

                        <x-input.select  wire:model.debounce.500ms="detail.category_id"
                                         field="type" :option="$categories"
                                         :error="$errors->first('detail.category_id')" />

                    </x-input.label>

                    <x-input.label for="detail.description" label="Description">

                        <x-input.textarea  wire:model.debounce.500ms="detail.description" class="appearance-none"
                                       :error="$errors->first('detail.description')" />

                    </x-input.label>

                    <x-input.label for="detail.quantity" label="Quantity">

                        <x-input.text  wire:model.debounce.500ms="detail.quantity" class="appearance-none" type="number"
                                       :error="$errors->first('detail.quantity')" />

                    </x-input.label>

                    <x-input.submit>

                        <span wire:loading> <i class="fas fa-spinner-third animate-spin"></i> </span>

                        {{ ($newBook) ? 'Create Books' : 'Create Book' }}

                    </x-input.submit>

                </x-form>

            </x-modal>



        </div>

    </main>

</div>
