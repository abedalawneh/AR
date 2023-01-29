<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\project;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\Request as RequestFacade;
// use Illuminate\Support\Facades\Request;
class projectcontroller extends Controller
{
    //
    public function store(Request $request)
    { return $request;
        $file = $request->file('file');
        $path = $file->store('marker');
        return 'File uploaded successfully!';
    }
   
    
    public function project(Request $request)
    {
        return $request;
        try {
            
            // $validator = Validator::make($request->all(), [
            //     'name' => 'required|string',
               
            // ]);
                
            // if ($validator->fails()) {
                // Validation failed
            //     return response()->json([
            //         'error' => $validator->errors(),
            //     ], 422);
            // }
            // else{
            

                $file = $request->file('file1');
                $path = $file->store('object');
                $url1 = Storage::url($path);
                // return $file;
                // return $path;
                // return $url1;

                $file = $request->file('file2');
                $path = $file->store('public/marker');
                $url2 = Storage::url($path);

                



                $item = project::create([
                    'based_tybe' => $request->typebased,
                    'project_name' => $request->Projectname,
                    'your_object' => $url1 ,
                    'your_marker' => $url2,
                    'user_id' => $request->userid,
                    
                ]);
                
                if ($item) {
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
                
            // }
        } catch (Exception $ex) {
           return $ex->getMessage();
        }
    }

  
        
    
}
