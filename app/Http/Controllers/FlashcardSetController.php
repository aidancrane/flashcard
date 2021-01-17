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
use App\Rules\WithoutSpaces;
use App\Models\Flashcard;

class FlashcardSetController extends Controller
{

    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource('App\Models\Set');
    }

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
        // So we can proceed like all is well, because it probably is TM.
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
        dd("2 store");
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
        return view("study.flashcard-study-landing")->with('set', $set);
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
            // Yes, user can view this set.

            // Get flashcards in current set.
            $flashcards = $set->flashcards()->orderBy('flashcard_order')->get();

            // Return view (duh).
            return view("set-editor")->with('set', $set)->with('flashcards', $flashcards);
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

        // We don't want spaces in categories.
        $request->validate([
            'category' => [new WithoutSpaces],
        ]);

        //We may be updating flashcards, so lets check that we are.
        if ($request->has('flashcard-1-front')) {
            // We are updating flashcards so we need to update each flashcard
            // in our set.
            $set->flashcards()->delete();

            $list_of_flashcards = [];
            foreach ($request->all() as $array => $value) {
                if (strpos($array, 'flashcard-') === 0) {
                    $list_of_flashcards[$array] = $value;
                }
            }

            $current_card = 1;

            foreach ($list_of_flashcards as $key => $value) {
                if ($request->has('flashcard-' . $current_card . '-front') && $request->has('flashcard-' . $current_card . '-back')) {
                    $flashcard = new Flashcard();
                    $flashcard->flashcard_order = $current_card;
                    $flashcard->front_text = $request->get('flashcard-' . $current_card . '-front');
                    $flashcard->back_text = $request->get('flashcard-' . $current_card . '-back');
                    $set->flashcards()->save($flashcard);
                }
                $current_card++;
            }
            request()->session()->flash('message', 'Flashcards saved successfully.');
            request()->session()->flash('alert-class', 'alert-success');
            return redirect("/sets");
        }

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
