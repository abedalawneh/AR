<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\project;
use App\Models\objectt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\location;
use App\Models\event;

class locationcontroller extends Controller
{
  public function locationinsert(Request $request)
    {
        // return $request;
        if ($request->hasFile('file3')) {
            $file = $request->file('file3');
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
                    $project = new project;
                    $project->based_tybe =$request->typebased;
                    $project->project_name =$request->Projectname;
                    $project->user_id =$request->userid;
                    $project->save();
                    // $path2 = $request->fle2name->store('public/object');
                    
                    $location = new location;
                    $location->location=$request->autocomplete;
                    $location->latitude=$request->Latitude;
                    $location->longitude=$request->Longitude;
                    $location->project_id =$project->id;
                    $location->user_id =$request->userid;
                    $location->save();

                    $object = new objectt;
                    $object->object = $request->file1name;
                    $object->user_id =$request->userid;
                    $object->project_id =$project->id;
                    $object->save();
                    // ]);

                
                
                if ($object && $project &&$location) {
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
                  
                  return redirect()->route('project');
                
            }
        // } 
        catch (Exception $ex) {
           return $ex->getMessage();
        }
    }
    public function delete(Request $request)
    {
    $locationproject = location::where('project_id', $request->id)->get();

    foreach ($locationproject as $locationproject) {
        $locationproject->project_id = null;
        $locationproject->save();
    }
    $objectproject = objectt::where('project_id', $request->id)->get();

    foreach ($objectproject as $objectproject) {
        $objectproject->project_id = null;
        $objectproject->save();
    }
    $projectid = project::find($request->id);
    $projectid->delete();
    return redirect()->route('project');

    }
  
        
    
}
