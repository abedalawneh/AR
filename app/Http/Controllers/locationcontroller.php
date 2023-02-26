<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\project;
use App\Models\objectt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\location;
use App\Models\event;

class locationcontroller extends Controller
{
  public function locationinsert(Request $request)
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
                

                  
                    $project = new project;
                    $project->based_tybe =$request->typebased;
                    $project->project_name =$request->Projectname;
                    $project->user_id =$request->userid;
                    $project->save();
                  

                    $location = new location;
                    $location->location=$request->autocomplete;
                    $location->latitude=$request->Latitude;
                    $location->longitude=$request->Longitude;
                    $location->project_id =$project->id;
                    $location->user_id =$request->userid;
                    $location->save();

                    

                    if ($request->hasFile('file3')) {
                        $files = $request->file('file3');   
                                // $name='scene.gltf'.$project->id;
                                // File::makeDirectory(public_path("{$name}"), 0755, true);

                        foreach ($files as $file) {

                            $object = new objectt;
                    $object->object = $file->getClientOriginalName();
                    $object->user_id =$request->userid;
                    $object->animation =$request->objectanimation;
                    $object->textobject =$request->textobject;
                    $object->project_id =$project->id;
                    $object->save();

                            $destinationPath = public_path("glbobject");
                            $filename = $file->getClientOriginalName();
                            $file->move($destinationPath, $filename);
                        }
                    }
                    
                
                if ($object && $project &&$location) {
                    // return "sssss";
                    // return response()->json([
                    //     'result'=>true,
                    //     'message'=>'Added Successfully',
                        
                    // ]);
                    return redirect()->route('project') ;
                    ;

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
    public function delete2(Request $request)
    {
        $name='scene.gltf'.$request->id;
        $path = public_path("{$name}");
        if(File::exists($path)) {
            File::deleteDirectory($path);
        }
    $locationproject = location::where('project_id', $request->id )->get();

    foreach ($locationproject as $locationprojectt) {
        $locationprojectt->project_id = null;
        $locationprojectt->save();
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
  
    public function locationedit(Request $request)
    {

       
        
        $objectproject = objectt::where('project_id', $request->id)->get();
        foreach ($objectproject as $editobject) {
            if ($request->hasFile('file2')) {
                $files = $request->file('file2');                             
                foreach ($files as $file) {
            $editobject->object = $file->getClientOriginalName();
            $editobject->animation =$request->objectanimation;
            $editobject->textobject =$request->textobject;
            $editobject->save();
                    $destinationPath = public_path("glbobject");
                    $filename = $file->getClientOriginalName();
                    $file->move($destinationPath, $filename);
                }
            }

        }
           
        $locationproject = location::where('project_id', $request->id)->get();
        
        foreach ($locationproject as $locationproject) {
            $locationproject->location=$request->autocomplete;
            $locationproject->latitude=$request->Latitude;
            $locationproject->longitude=$request->Longitude;
            $locationproject->save();
        }
            $editproject = project::find($request->id);
            $editproject->project_name = $request->Projectname;
            $editproject->save();
        return redirect()->route('project');

    
    }
    
}
