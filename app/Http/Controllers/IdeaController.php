<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;

class IdeaController extends Controller
{
    public function addIdea(Request $request)
    {
        $idea = new Idea;
        $idea->name = $request->name;
        $idea->email = $request->email;
        $idea->idea = $request->idea;
        $idea->save();
        return redirect()->back()->with('success_message', 'Your idea posted successfully');
    }

    public function startTournament()
    {
        $ideas = Idea::where('win', 'no')->get();
        if($ideas->count() >= 8)
        {
            $ideas = Idea::where('win', 'no')->take(8)->get();
            foreach($ideas as $single_idea)
            {
                $single_idea->in_tournament = 'yes';
                $single_idea->update();
            }
            $this->winUsers();
        }
    }

    public function winUsers()
    {
        \Artisan::call('schedule:work');
    }
}
