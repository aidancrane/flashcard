<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MakeSet;
use App\Models\Set;
use Carbon\Carbon;
use Auth;

class FlashcardSetController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("flashcard-sets");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("new-set");
    }


    public function post_new_set(MakeSet $request)
    {
        // Validate new set against MakeSet validation rules.
        $validated = $request->validated();

        // If title was invalid, user would not get this far as they would be bounced back.
        // So we can procedd like all is well, because it probably is TM.
        $set = new Set;

        $set->set_title = $request->set_title;
        $set->owner_id = auth()->user()->id;
        $set->creation_date = Carbon::now();
        $set->save();

        return redirect("sets/" . $set->id);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Set $set)
    {
        $this->authorize('view', $set);
        if (Auth::user()->can('make-flashcards')) {
            return view("set-editor");
        } else {
            request()->session()->flash('message', 'You aren\'t allowed to access that flashcard set! Try asking the owner for permission.');
            request()->session()->flash('alert-class', 'alert-danger');
            return view("dashboard-error");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
