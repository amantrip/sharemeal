<?php

class HistoryController extends \BaseController {

	public function renderHistoryView(){

        $user = Auth::user();

        $history = History:: where('uid', '=', $user->id)->get();

        return View::make('history.index', ['history' => $history]);

    }

    public function renderEditHistoryView($id){

        $user = Auth::user();
        $history_entry = History::find($id);

        if($history_entry->uid != $user->id){
            return Redirect::to('/history');
        }

        return View::make('history.edit', ['entry' => $history_entry]);

    }

    public function editHistory(){

        $id = Input::get('id');
        $history_entry = History:: find($id);

        $history_entry->ban = Input::get('ban');
        $history_entry->save();

        return Redirect:: to('/history');
    }


}
