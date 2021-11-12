<?php

namespace App\Http\Livewire\Dashboard\Admin;

use App\Models\BookDetail;
use App\Models\Category;
use App\Models\Genre;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class AdmBook extends Component
{
    use WithPagination;

    public BookDetail $detail;
    public Category $category;
    public Genre $genre;

    public bool $newBook = false;

    protected $listeners = ['refresh' => 'mount'];

    public bool $newCategory = false;

    protected array $rules = [
        'detail.isbn' => 'required',
        'detail.title' => 'required',
        'detail.author' => 'required',
        'detail.genre_id' => 'required',
        'detail.page_no' => 'required',
        'detail.category_id' => 'required',
        'detail.description' => 'required',
        'detail.quantity' => 'required',
        'category.type' => 'required',
        'genre.genre_type' => 'required'
    ];

    public function createBook(): void
    {
        $this->validate([
            'detail.isbn' => 'required',
            'detail.title' => 'required',
            'detail.author' => 'required',
            'detail.genre_id' => 'required',
            'detail.page_no' => 'required',
            'detail.category_id' => 'required',
            'detail.description' => 'required',
            'detail.quantity' => 'required',
        ]);

        $this->detail->encoded_by = auth()->id();
        $this->detail->date_encoded = date('Y-m-d');

        $this->detail->save();

        session()->flash('success', 'Book Created');

        sleep(2);
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('show-alert');

    }

    public function alterBook(): void
    {
        $this->validate([
            'detail.isbn' => 'required',
            'detail.title' => 'required',
            'detail.author' => 'required',
            'detail.genre_id' => 'required',
            'detail.page_no' => 'required',
            'detail.category_id' => 'required',
            'detail.description' => 'required',
            'detail.quantity' => 'required',
        ]);

        $this->detail->update();

//        BookDetail::where('id',$this->detail->id)
//            ->update([
//                'username' => $this->detail->username,
//                'contact' => $this->detail->contact,
//                'email' => $this->detail->email,
//            ]);

        session()->flash('success', 'Member Updated');

        sleep(2);
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('show-alert');

        $this->emitSelf('refresh');
    }

    public function addBook(): void
    {
        $this->newBook = true;

        $this->emitSelf('refresh');

        $this->dispatchBrowserEvent('show-modal');
    }

    public function editBook(BookDetail $selectBook): void
    {
        $this->detail = $selectBook;

        $this->newBook = false;
        $this->dispatchBrowserEvent('show-modal');
    }

    public function createGenre(): void
    {
        $this->validate([
            'genre.genre_type' => 'required'
        ]);

        $this->genre->save();

        session()->flash('success', 'Genre Created');

        sleep(2);
        $this->dispatchBrowserEvent('close-category-modal');
        $this->dispatchBrowserEvent('show-alert');

        $this->emitSelf('refresh');
    }

    public function createCategory(): void
    {
        $this->validate([
            'category.type' => 'required'
        ]);

        $this->category->save();

        session()->flash('success', 'Category Created');

        sleep(2);
        $this->dispatchBrowserEvent('close-category-modal');
        $this->dispatchBrowserEvent('show-alert');

        $this->emitSelf('refresh');
    }

    public function addCatogory(): void
    {
        $this->newCategory = true;

        $this->dispatchBrowserEvent('category-modal');

    }

    public function addGenre(): void
    {

        $this->newCategory = false;

        $this->dispatchBrowserEvent('category-modal');

    }

    public function deleteCategory(Category $selectCategory): void
    {
        $this->category = $selectCategory;

        $this->category->delete();

        session()->flash('success', 'Category Deleted');

        $this->dispatchBrowserEvent('show-alert');

        $this->emitSelf('refresh');
    }

    public function deleteGenre(Genre $selectGenre): void
    {
        $this->genre = $selectGenre;

        $this->genre->delete();

        session()->flash('success', 'Genre Deleted');

        $this->dispatchBrowserEvent('show-alert');

        $this->emitSelf('refresh');
    }

    public function updated(): void
    {
        $this->validate();
    }

    public function mount(): void
    {
        $this->detail = new BookDetail;
        $this->category = new Category;
        $this->genre = new Genre;
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.dashboard.admin.adm-book', [
            'books' => BookDetail::with('genre')->paginate(5),
            'categories' => Category::all(),
            'genres' => Genre::all()
        ])
            ->extends('layouts.admin');
    }
}
