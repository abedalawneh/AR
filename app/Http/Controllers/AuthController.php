<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
// use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }  
      
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('project')
                        ->withSuccess('Signed in');
        }
  
        return redirect("login")->withSuccess('Login details are not valid');
    }

    
    public function registration()
    {
        return view('auth.register');
    }
    // public function dashbord()
    // {
    //     return view('dashbord');
    // }
    public function landingpage()
    {
        return view('landingpage');
    }
    
    public function homeall()
    {
        return view('homeall');
    }
    
    
    public function events()
    {
        return view('events');
    }
    public function createproject()
    {
        return view('createproject');
    }
    public function createvents()
    {
        return view('createvents');
    }
    public function resetemail()
    {
        return view('Auth.passwords.email');
    }
    
    public function resetpassword()
    {
        return view('Auth.passwords.resetpassword');
    }
   
    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("login")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    
    
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return redirect("login");
    }


   
    public function reset1(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $response = Password::sendResetLink($request->only('email'));

        if ($response === Password::RESET_LINK_SENT) {
            return back()->with('status', trans($response));
        }

        return back()->withErrors(
            ['email' => trans($response)]
        );
    }

    public function reset(Request $request)
{
    // Validate the form data
    // return "hhhh";
    $validatedData = $request->validate([
        'email' => 'required|email',
    ]);

    // Prepare the data for the email
    $data = [
        'name' => 'User',
        'email' => $validatedData['email'],
        'token' => \str_random(40),
    ];

    // Send the password reset email
    try {
        return Redirect('test');

        return"hhhhhhhhh";
        Mail::send('reset', $data, function($message) use ($data) {
            $message->to($data['email'], $data['name'])->subject('Password Reset');
        });
    } catch (\Exception $e) {
        Log::error("Error sending email: " . $e->getMessage());
    }

    // Return a response to the client
    return response()->json(['message' => 'Password reset email sent']);
}

     public function update(Request $request)
        {
            $request->validate([
                'token' => 'required',
                'email' => 'required|email',
                'password' => 'required|confirmed|min:8',
            ]);
    
            $response = Password::reset($request->only(
                'email', 'password', 'password_confirmation', 'token'
            ), function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();
            });
    
            if ($response === Password::PASSWORD_RESET) {
                return redirect()->route('homeall')->with('status', trans($response));
            }
    
            return back()->withErrors(
                ['email' => trans($response)]
            );
        }
    
    

        public function submiemailtForm(Request $request) {
            $email = $request->input('emailreset');
            // return $email;
            return redirect()->route('resetpass', ['E-mail'=> $email]);
            // return view('resetpass', ['E-mail'=> $email]);
            // return view('resetpassword')->with($email);
            // return redirect()->route('resetpassword', compact('email'));
        //    return redirect()->route('resetpasswordd', ['E-mail' => $email]);

            
        }


//         public function indexx()
// {
//     return view('googleAutocomplete');
// }
}



    




