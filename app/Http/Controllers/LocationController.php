<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    public function index(){
        $locations = Location::all();
        return view('locations.index', compact('locations'));
    }
    
    public function detail($id){
        $location = Location::findOrFail($id);
        return view('locations.detail', compact('location'));
    }

    public function create(){
        return view('locations.create');
    }

    public function createPost(Request $request){
        $location = new Location();
        $location->name = $request->name;
        $location->description = $request->description;

        $old_item = Location::where('name','=',$request->name)->get();
        
        if(count($old_item) <= 0){
            //create if there is no record
            $location->save();
            return redirect('/locations')->with('success','Location created successfully');
        }else{            
            return back()->with('error','Location is not created! Name is already added');
        }
    }

    public function edit($id){
        $location = Location::findOrFail($id);
        return view('locations.edit', compact('location'));
    }

    public function editPost(Request $request){
        $location = Location::find($request->id);
        $location->name = $request->name;
        $location->description = $request->description;

        $pass = $location->save();
        if($pass > 0){
            return redirect('/locations')->with('success','Location updated successfully');
        }else{            
            return back()->with('error','Location is not updated!');
        }
    }

    public function delete($id){
        $location = Location::findOrFail($id);
        return view('locations.delete', compact('location'));
    }

    public function deletePost(Request $request){
        $pass = Location::find($request->id)->delete();
        
        if($pass > 0){
            return redirect('/locations')->with('success','Location deleted successfully');
        }else{            
            return back()->with('error','Location is not deleted!');
        }
    }
}
