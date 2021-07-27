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
        $ideas = Idea::where('win', 'no')->where('in_tournament', 'no')->get();
        $running_tournament = Idea::where('in_tournament', 'yes')->get();
        if($ideas->count() >= 8 && $running_tournament->count() == 0)
        {
            $ideas = Idea::where('win', 'no')->take(8)->get();
            foreach($ideas as $single_idea)
            {
                $single_idea->in_tournament = 'yes';
                $single_idea->update();
            }
            
        }

        $ideas = Idea::where('win', 'no')->where('in_tournament', 'yes')->take(8)->get();
        $ideas_a = Idea::where('win', 'no')->where('in_tournament', 'yes')->take(8)->get();
        if($ideas->count() != 8)
        {
            $ideas = Idea::where('win', 'yes')->where('in_tournament', 'yes')->get();
            $ideas_a = Idea::where('win', 'yes')->where('in_tournament', 'yes')->get();
        }
        $ideas_a = $ideas_a->random($ideas->count()/2);
        $ids = [];
        foreach($ideas_a as $idea)
        {
            $ids[] = $idea->id;
            $idea->win = 'yes';
            $idea->update();
            $data = [];
            $to_name = $idea->name;
            $to_email = $idea->email;
            $from_email = \Config::get('mail.from.address');
            $data = [
                'winner_name' => $idea->name,
                'winner_message' => $ideas_a->count() == 1?'Congratulations!! You are the winner of the tournament':'Congratulations!! you have won and you are in top '.$ideas_a->count()
            ];
            \Mail::send('winner_email', $data, function($message) use ($to_name, $to_email, $from_email) {
                $message->to($to_email, $to_name)
                ->subject('Tournament info');
                $message->from($from_email,'Tournament Reminder');
                });
        }
        $fail_users = Idea::whereNotIn('id', $ids)->where('in_tournament', 'yes')->get();
        foreach($fail_users as $user)
        {
            $user->win = 'failed';
            $user->update();
        }
        if($ideas_a->count() == 1)
        {
            $finish_tournament = Idea::where('in_tournament', 'yes')->get();
            foreach($finish_tournament as $tournament)
            {
                $tournament->in_tournament = 'finished';
                $tournament->update();
            }
        }
    }
}
