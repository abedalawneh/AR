<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\JsonRequest;
use App\Models\project;
use App\Models\objectt;

class projectcontroller extends Controller
{
  public function projectinsert(Request $request)
    {
       
        return $request;
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
                    $project->your_marker = $request->file1name;
                    $project->user_id =$request->userid;
                    $project->save();
                    // $path2 = $request->fle2name->store('public/object');
                    $object = new objectt;
                    $object->object = $request->fle2name;
                    $object->user_id =$request->userid;
                    $object->save();
                // ]);

                
                
                if ($object && $project) {
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
