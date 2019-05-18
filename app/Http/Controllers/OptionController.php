<?php

namespace App\Http\Controllers;

use Inani\Larapoll\Http\Controllers\OptionManagerController;
use Inani\Larapoll\Poll;

class OptionController extends OptionManagerController
{
    /**
     * Page to add new options
     *
     * @param Poll $poll
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    //lets now override this method on our own way
    public function push(Poll $poll)
    {
        return view('option.push', compact('poll'));
    }
    //lets now override this method on our own way
    public function delete(Poll $poll)
    {
        return view('option.remove', compact('poll'));
    }
}
