<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\SubLocation;

class SubLocationController extends Controller
{    
    public function index($id){
        $location = Location::findOrFail($id);
        $sub_locations = SubLocation::where('location_id','=',$id)->get();
        return view('sub_locations.index', compact(['sub_locations','location']));
    }
    
    public function detail($id){
        $sub_location = SubLocation::findOrFail($id);
        return view('sub_locations.detail', compact('sub_location'));
    }

    public function create($id){
        $location = Location::findOrFail($id);
        return view('sub_locations.create', compact('location'));
    }

    public function createPost(Request $request){
        $sub_location = new SubLocation();
        $sub_location->name = $request->name;
        $sub_location->location_id = $request->location_id;
        $sub_location->description = $request->description;
        $location_id = $request->ocation_id;

        $old_item = SubLocation::where('name','=',$request->name)->get();
        
        if(count($old_item) <= 0){
            //create if there is no record
            $sub_location->save();
            return redirect('/sub_locations/index/'.$request->location_id)->with('success','Sub Location created successfully');
        }else{            
            return back()->with('error','Sub Location is not created! Name is already added');
        }
    }

    public function edit($id){
        $sub_location = SubLocation::findOrFail($id);
        return view('sub_locations.edit', compact('sub_location'));
    }

    public function editPost(Request $request){
        $sub_location = SubLocation::find($request->id);
        $sub_location->name = $request->name;
        $sub_location->location_id = $request->location_id;
        $sub_location->description = $request->description;
        $location_id = $request->location_id;

        $pass = $sub_location->save();
        if($pass > 0){
            return redirect('/locations')->with('success','Sub Location updated successfully');
        }else{            
            return back()->with('error','Sub Location is not updated!');
        }
    }

    public function delete($id){
        $sub_location = SubLocation::findOrFail($id);
        return view('sub_locations.delete', compact('sub_location'));
    }

    public function deletePost(Request $request){
        $pass = SubLocation::findOrFail($request->id)->delete();
        
        if($pass > 0){
            return redirect('/locations')->with('success','Sub Location deleted successfully');
        }else{            
            return back()->with('error','Sub Location is not deleted!');
        }
    }
}
