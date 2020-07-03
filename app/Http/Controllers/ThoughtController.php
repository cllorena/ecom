<?php

namespace App\Http\Controllers;

use App\Thought;
//use App\User;

use Illuminate\Http\Request;

class ThoughtController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index()
    {
        return Thought::where('user_id', auth()->id())->get();
    }

    public function store(Request $request)
    {
        $thought = new Thought();
        $thought->description = $request->description;
        $thought->user_id = auth()->id();
        $thought->save();

        return $thought;
    }

    
    public function update(Request $request, $id)
    {
        $thought = Thought::find($id);
        $thought->description = $request->description;
        //$thought->description = "HOLITASSSSSSSS";
       
        

        //echo "LLegue 1<br>";
        //echo $thought->description;
        //echo $request->description;
        //echo "<br>LLegue 2<br>";
        //echo $thought->user_id;
        //echo "<br>LLegue 3<br>";
        //echo $id;
        //exit(1);


        $thought->save();

        return $thought;
    }

    
    public function destroy($id)
    {
        $thought = Thought::find($id);
        $thought->delete();
    }
}
