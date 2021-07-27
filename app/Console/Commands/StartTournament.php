<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Idea;

class StartTournament extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tournament:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start tournament while ideas are about 8';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
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

        return 0;
    }
}
