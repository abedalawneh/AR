<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;
use App\Models\objectt;
use App\Models\project;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\location;

class eventcontroller extends Controller
{
    //
    public function eventinsert(Request $request)
    {
        // return $request;
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
                // $item = project::create([
                //     'based_tybe' => $request->typebased,
                //     'project_name' => $request->Projectname,
                // 'your_marker' => $request->detail,
                //     'user_id' => $request->userid,
                    // $file1 = $request->file('file1');
                    // $file2 = $request->file('file2');

                    // $path1 = $request->file('fileInput1');
                    // $path = $path1->store('public/marker');
                    // $image_path = Storage::url($path);
                    
                    // $path2 = $request->fle2name->store('public/object');
                    if ($request->optionlocation && $request->optionobject  ) {
                        $event = new event;
                    $event->event_name =$request->eventname;
                    $event->event_radius =$request->radiusevent;
                    $event->object_id =$request->optionobject;
                    $event->location_id =$request->optionlocation;
                    $event->user_id =$request->userid;
                    $event->save();
                    }
                    else if($request->optionlocation == null && $request->optionobject== null){

                        
                        $object = new objectt;
                        $object->object = $request->file1name;
                        $object->user_id =$request->userid;
                        $object->save();
                        $location = new location;
                        $location->location=$request->autocomplete;
                        $location->latitude=$request->Latitude;
                        $location->longitude=$request->Longitude;
                        $location->user_id =$request->userid;
                        $location->save();

                        $event = new event;
                        $event->event_name =$request->eventname;
                        $event->event_radius =$request->radiusevent;
                        $event->object_id =$object->id;
                        $event->location_id =$location->id;
                        $event->user_id =$request->userid;
                        $event->save();
                    }
                    
                    else if ($request->optionobject ==null  ){
                    

                    $object = new objectt;
                    $object->object = $request->file1name;
                    $object->user_id =$request->userid;
                    $object->save();

                    $event = new event;
                    $event->event_name =$request->eventname;
                    $event->event_radius =$request->radiusevent;
                    $event->object_id =$object->id;
                    $event->location_id =$request->optionlocation;
                    $event->user_id =$request->userid;
                    $event->save();

                    }
                    else if ($request->optionlocation == null) {
                       
                        $location = new location;
                        $location->location=$request->autocomplete;
                        $location->latitude=$request->Latitude;
                        $location->longitude=$request->Longitude;
                        $location->user_id =$request->userid;
                        $location->save();

                    $event = new event;
                    $event->event_name =$request->eventname;
                    $event->event_radius =$request->radiusevent;
                    $event->object_id =$request->optionobject;
                    $event->location_id =$location->id;
                    $event->user_id =$request->userid;
                    $event->save();

                    }

                  
                    
                    // ]);

                
                if ($objectt && $event) {
                    return response()->json([
                        'result'=>true,
                        'message'=>'Added Successfully',
                        
                    ]);
                  } else {
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
  
        
}
