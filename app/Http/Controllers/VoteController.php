<?php

namespace App\Http\Controllers;

use Inani\Larapoll\Http\Controllers\VoteManagerController;

use Illuminate\Http\Request;

use Inani\Larapoll\Poll;

use Inani\Larapoll\Option;

use Inani\Larapoll\Vote;

class VoteController extends VoteManagerController
{
	protected $option_id;
    
    protected $user;

    public function vote(Poll $poll, Request $request)
    {
        $this->option_id = $request->options;

        $this->user = Auth()->User();

    	if($this->votedThisOption()){
    		return back()->with('errors', 'Sorry you have already vote this option');
    	}else{
    		$option = Option::find($this->option_id);
	    	$option->poll->votes()->create(['user_id'=>$this->user->id,'option_id'=>$option->id]);

	    	$option->votes = $option->votes + 1;

	    	if($option->save()){
	    		return back()->with('success', 'Congratulation you have successfull vote this option');
	    	}
    	}
    	

        // try{

        //     $vote = $this->resolveVoter($request, $poll)
        //         ->poll($poll)
        //         ->votes($request->get('options'));

        //     if($vote){
        //         return back()->with('success', 'Vote Done');
        //     }
        // }catch (Exception $e){

        //     dd(
        //         $e->getMessage()
        //     );
        //     return back()->with('errors', $e->getMessage());
        // }
    }

    public function votedThisOption()
    {
    	$user_vote = null;
    	foreach (Vote::where(['user_id'=>$this->user->id,'option_id'=>$this->option_id])->get() as $vote) {
    		$user_vote = $vote;
    	}
    	if($user_vote != null)
    		return true;
    	else
    		return false;
    }
}
