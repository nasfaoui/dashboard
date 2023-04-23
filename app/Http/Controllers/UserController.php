<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Metadata\Uses;

class UserController extends Controller
{
    //switch 
    public function switch(){
        $user_id=Auth()->user()->id;
        $current_user=User::find($user_id);
        $current_user->isArtisan = true;
        $current_user->save();
        return to_route('Home');
    }

    public function show(User $user){
        
    }
}
