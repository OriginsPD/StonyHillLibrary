<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Collection|Member[]
     */
    public function index()
    {
        return Member::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        return Member::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Collection|Member|Member[]|Model
     */
    public function show($id): Model|Collection|array|Member
    {
        return Member::find($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return Collection|Model|Member|Member[]
     */
    public function update(Request $request, $id): Model|Collection|array|Member
    {
        $Member = Member::findOrFail($id);
        $Member->update($request->all());

        return $Member;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Member $member
     * @return int
     */
    public function destroy(Member $member): int
    {
        Member::find($member)->delete();

        return 204;
    }
}
