<?php
/**
 * Created by PhpStorm.
 * User: Matej
 * Date: 28. 8. 2015
 * Time: 22:02
 */

namespace Social\Http\Controllers;

use Auth;
use Social\Models\Status;

class HomeController extends Controller
{
    public function index(){
        if(Auth::check()){
            $statuses = Status::notReply()->where(function($query){
                return $query->where('user_id',Auth::user()->id)
                    ->orWhereIn('user_id',Auth::user()->friends()->lists('id'));
            })->orderBy('created_at','desc')->paginate(10);

            return view('timeline.index')->with('statuses',$statuses);
        }
        return view('home');
    }
}