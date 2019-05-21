<?php

namespace App\Http\Controllers;

use Inani\Larapoll\Http\Controllers\PollManagerController;
use Inani\Larapoll\Poll;

class PollController extends PollManagerController
{
    public function home()
    {
        
        return view('dashboard.home',['polls'=>Poll::all()]);
    }
    public function result()
    {
        
        return view('dashboard.result',['polls'=>Poll::all()]);
    }
    public function create()
    {
    	return view('dashboard.create');
    }

    public function edit(Poll $poll)
    {
        return view('dashboard.edit', compact('poll'));
    }

    public function index()
    {
        $polls = Poll::withCount('options', 'votes')->latest()->paginate(
            config('larapoll_config.pagination')
        );
        return view('dashboard.index', compact('polls'));
    }
}
