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
    public function editevents(Request $request)
    {
        $userFront1 = event::where('id', $request->id)->get();
        return view('editevents', ['userFront1' =>$userFront1]);

    }
    //
    public function eventinsert(Request $request)
    {

        
        // return $request;
        if ($request->hasFile('file1')) {
            $file = $request->file('file1');
            $destinationPath = public_path('object');
            $filename = $file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            // return "File saved successfully at: $destinationPath/$filename";
        }
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

                    if ($object && $event &&$location) {
                        return response()->json([
                            'result'=>true,
                            'message'=>'Added Successfully',
                            
                        ]);
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
    //    return $request;
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
