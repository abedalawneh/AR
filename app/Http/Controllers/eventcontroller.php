<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;
use App\Models\objectt;
use App\Models\project;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\location;

class eventcontroller extends Controller
{
    public function editevents(Request $request)
    {
        $userFront1 = event::where('id', $request->id)->get();
        return view('editevents', ['userFront1' =>$userFront1]);

    }
    //
    public function eventinsert(Request $request)
    {

        
        
        try {
            
            // $validator = Validator::make($request->all(), [
                // 'based_tybe' => 'required|string',
                // 'project_name' => 'required|string',
                // 'your_marker' => 'required|string',
                
                // 'user_id' => 'required|integer',
            // ]);
                
            // if ($validator->fails()) {
            //     // Validation failed
            //     return response()->json([
            //         'error' => $validator->errors(),
            //     ], 422);
            // }
            // else{
               
                    $event = new event;
                    $event->event_name =$request->eventname;
                    $event->event_radius =$request->radiusevent;
                    if($request->optionobject){
                    $event->object_id =$request->optionobject;
                    }
                    else{
                        if ($request->hasFile('file1')) {
                            $files = $request->file('file1');                            
                            foreach ($files as $file) { 
                                $object = new objectt;
                                $object->object = $file->getClientOriginalName();
                                $object->user_id =$request->userid;
                                $object->textobject =$request->textobject;
                                $object->save();
                                
                            }
                        }
                    $event->object_id =$object->id;
                        
                    }
                    if($request->optionlocation){
                    $event->location_id =$request->optionlocation;
                    }
                    else{
                        $location = new location;
                        $location->location=$request->autocomplete;
                        $location->latitude=$request->Latitude;
                        $location->longitude=$request->Longitude;
                        $location->user_id =$request->userid;
                        $location->save();
                        $event->location_id =$location->id;
                    }
                    $event->user_id =$request->userid;
                    $event->save();

                    if ($request->hasFile('file1')) {
                        $files = $request->file('file1');   
                                // $name='scenegltfevent'.$event->id;
                                // File::makeDirectory(public_path("{$name}"), 0755, true);                           
                        foreach ($files as $file) { 
                            
                            $destinationPath = public_path("glbobject");
                            $filename = $file->getClientOriginalName();
                            $file->move($destinationPath, $filename);
                        }
                    }

                    if ( $event ) {
                        return redirect()->route('events');

                      }
                  else {
                    return response()->json([
                        'result'=>false,
                        'message'=>'Added faild',
                        
                    ]);
                  }
                    
                
            }
        // } 
        catch (Exception $ex) {
           return $ex->getMessage();
        }
    }

    public function deletevent(Request $request)
    {
        
        
    $locationproject = location::where('event_id', $request->id)->get();

    foreach ($locationproject as $locationproject) {
        $locationproject->project_id = null;
        $locationproject->save();
    }
    $objectproject = objectt::where('event_id', $request->id)->get();

    foreach ($objectproject as $objectproject) {
        $objectproject->project_id = null;
        $objectproject->save();
    }
    $projectid = event::find($request->id);
    $projectid->delete();
    return redirect()->route('events');

    }
   
        
    public function eventedit   (Request $request)
    {
        
    $objectproject = objectt::where('project_id', $request->id)->get();
    $locationproject = location::where('project_id', $request->id)->get();
    $editevent = event::find($request->id);
    
       
       
            $editevent->event_name =$request->eventname;
            $editevent->event_radius =$request->radiusevent;
            $editevent->object_id =$request->optionobject;
            $editevent->location_id =$request->optionlocation;
            $editevent->save();
            return redirect()->route('events');

    
    }


    
}
