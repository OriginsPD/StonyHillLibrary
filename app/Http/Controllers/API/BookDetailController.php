<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BookDetail;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index(): string
    {
        return BookDetail::with('genre')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        return BookDetail::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return BookDetail|BookDetail[]|Collection|Model
     */
    public function show($id): Model|Collection|array|BookDetail
    {
        return BookDetail::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return BookDetail|BookDetail[]|Collection|Model
     */
    public function update(Request $request,$id): BookDetail|array|Collection|Model
    {
        $BookDetail = BookDetail::findOrFail($id);
        $BookDetail->update($request->all());

        return $BookDetail;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return int
     */
    public function destroy($id): int
    {
        BookDetail::find($id)->delete();

        return 204;
    }
}
