<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MakeSet;
use App\Http\Requests\UpdateSet;
use App\Http\AjaxResponseMessage;
use App\Models\Set;
use Carbon\Carbon;
use Auth;
use Yajra\Datatables\Datatables;

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

    // Display index datatables.
    public function datatable_index()
    {
        // Show only relevant selectable data, we can populate the rest of the information when they click into the item.
        $sets = Set::select(['id', 'set_title', 'creation_date'])->where('owner_id', auth()->user()->id);
        return datatables()->eloquent($sets)->toJson();
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

        return redirect("sets/" . $set->id . "/edit");
    }

    public function delete_from_index(Request $request)
    {
        // User would like to delete a set from their index page.
        // Validate new set against validation rules.

        if ($request->has('set-delete-id')) {
            $set = Set::find($request->get('set-delete-id'));

            $this->authorize('delete', $set);

            $set->delete();
            return redirect("sets");
        } else {
            request()->session()->flash('message', 'Flashcard set is invalid or not specified correctly.');
            request()->session()->flash('alert-class', 'alert-danger');
            return view("dashboard-error");
        }
        dd("unfinished");
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Set $set)
    {
        // Can this user view individual flashcards?
        if (Auth::user()->can('view', $set)) {
            // Yes
            return view("set-editor")->with('set', $set);
        } else {
            // No, they have been banned or something.
            request()->session()->flash('message', 'You aren\'t allowed to access that flashcard set! Try asking the owner for permission.');
            request()->session()->flash('alert-class', 'alert-danger');
            return view("dashboard-error");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSet $request, Set $set)
    {
        // Prep the response assuming all has gone as planned. We can assume data
        // is valid as it has passed the UpdateSet request validator.
        $response = new AjaxResponseMessage("Success", "Set successfully updated.");

        $set = Set::findOrFail($set->id);
        $set->fill($request->all());
        $set->save();

        return (json_encode($response));
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
