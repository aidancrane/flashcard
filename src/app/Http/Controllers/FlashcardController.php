<?php

namespace App\Http\Controllers;

use App\Models\Flashcard;
use App\Models\Set;
use Illuminate\Http\Request;

class FlashcardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Set  $set
     * @return \Illuminate\Http\Response
     */
    public function index(Set $set)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Set  $set
     * @return \Illuminate\Http\Response
     */
    public function create(Set $set)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Set  $set
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Set $set)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Set  $set
     * @param  \App\Models\Flashcard  $flashcard
     * @return \Illuminate\Http\Response
     */
    public function show(Set $set, Flashcard $flashcard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Set  $set
     * @param  \App\Models\Flashcard  $flashcard
     * @return \Illuminate\Http\Response
     */
    public function edit(Set $set, Flashcard $flashcard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Set  $set
     * @param  \App\Models\Flashcard  $flashcard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Set $set, Flashcard $flashcard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Set  $set
     * @param  \App\Models\Flashcard  $flashcard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Set $set, Flashcard $flashcard)
    {
        //
    }
}
