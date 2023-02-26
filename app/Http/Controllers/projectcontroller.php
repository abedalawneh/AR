<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\JsonRequest;
use Illuminate\Support\Facades\File;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\project;
use App\Models\objectt;
use App\Models\giftfile;
use Illuminate\Support\Facades\Auth;

class projectcontroller extends Controller
{
    public function generateQRCode(Request $request)
    {   $id=$request->id;
        return redirect()->route('arlocation',['id' => $id]);
    }
    public function project(Request $request)
    {
        $iduser=Auth::user()->id;
        $userFront1 =project::where('user_id', $iduser)->get();

        return view('project', ['userFront1' =>$userFront1]);
    }
    
    public function editproject(Request $request)
    {
        $userFront1 = project::where('id', $request->id)->get();
        return view('editproject', ['userFront1' =>$userFront1]);

    }
    public function arlocation(Request $request)
    {
        $userFront1 = project::where('id', $request->id)->get();
        return view('arlocation', ['userFront1' =>$userFront1]);

    }

  public function projectinsert(Request $request)
    {
    //    return $request;

    if ($request->hasFile('file1')) {
        $file = $request->file('file1');
        $destinationPath = public_path('marker');
        $filename = $file->getClientOriginalName();
        $file->move($destinationPath, $filename);
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
                
                    $project = new project;
                    $project->based_tybe =$request->typebased;
                    $project->project_name =$request->Projectname;
                    $project->your_marker = $request->file1name;
                    $project->user_id =$request->userid;
                    $project->save();
                    
                    
                    

                    if ($request->hasFile('file2')) {
                        $files = $request->file('file2');                             
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

                
                
                if ($object && $project) {
                    // return response()->json([
                    //     'result'=>true,
                    //     'message'=>'Added Successfully',
                        
                    // ]);
                    return redirect()->route('project');
                  } else {
                    return response()->json([
                        'result'=>false,
                        'message'=>'Added faild',
                        
                    ]);
                  }
                
                 

            }
        catch (Exception $ex) {
           return $ex->getMessage();
        }
    }
  
    public function delete1(Request $request)
    {
        

        $objectproject = objectt::where('project_id', $request->id)->get();

        foreach ($objectproject as $objectproject) {
            $objectproject->project_id = null;
            $objectproject->save();
        }

    
    $projectid = project::find($request->id);
    $projectid->delete();
    
    
    return redirect()->route('project');

    
    }

    public function editmarkerproject(Request $request)
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
            $editproject = project::find($request->id);
            $editproject->project_name = $request->Projectname;
            $editproject->based_tybe = $request->typebased;
            $editproject->your_marker = $request->file1name;
            $editproject->save();
        
            return redirect()->route('project');

    
    }
}
