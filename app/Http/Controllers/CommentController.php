<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Place;
use App\Models\User;

class CommentController extends Controller
{
    public function store(Request $request){

        $validator = Validator::make($request->all(), 
            [
                'body'=>['required'],
                'place_id'=>['required'],
                'user_id'=>['required']
            ],
        );

        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'message'=> $validator->getMessageBag()->all(),
            ]);
        }

        $place = Place::where('id',$request->get("place_id"))->first();
        if(!$place)return response()->json(['status'=>false,'message'=>'Cannot found place with provided id']);

        $user = User::where('id',$request->get("user_id"))->first();
        if(!$user)return response()->json(['status'=>false,'message'=>'Cannot found User with provided id']);



        $comment = new Comment();
        $comment->body=$request->get('body');
        $comment->user()->associate($user);
        $place->comments()->save($comment);
        $comment->save();

        return response()->json([
            'status'=>true,
            'message'=>'New comment was added successfuly',
        ]);

    }
}
