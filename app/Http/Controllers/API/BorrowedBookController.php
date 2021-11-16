<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BorrowedBook;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BorrowedBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return BorrowedBook[]|Collection
     */
    public function index(): Collection|array
    {
        return BorrowedBook::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        return BorrowedBook::create($request->all());


    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Model|BorrowedBook|BorrowedBook[]|Collection
     */
    public function show($id): BorrowedBook|array|Collection|Model
    {
        return BorrowedBook::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BorrowedBook  $borrowedBook
     * @return Response
     */
    public function edit(BorrowedBook $borrowedBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Models\BorrowedBook  $borrowedBook
     * @return Response
     */
    public function update(Request $request, BorrowedBook $borrowedBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BorrowedBook  $borrowedBook
     * @return Response
     */
    public function destroy(BorrowedBook $borrowedBook)
    {
        //
    }
}
