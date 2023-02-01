<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <title>reset password</title>
</head>
<body>
<form method="POST" action="{{ route('login.custom') }}">
                            @csrf
                            <div class="form-group mb-3 ">
                                <label class="labelcolor p-2" for="Password">Password</label>
                                <input type="password" placeholder="At least 8 characters" id="password" class="form-control imagpass "
                                    name="password" required>
                                    <span class="show-passwordlogin" id="showPasswordIcon">
                                    <img src="../images/eyeclose.svg" class="show-passwordlogin" id="showPasswordIcon">
                                    </span> 
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            
                            <div class="form-group mb-3 ">
                                <label class="labelcolor p-2" for="Password">Confirm password</label>
                                <input type="password" placeholder="At least 8 characters" id="password" class="form-control imagpass "
                                    name="password" required>
                                    <span class="show-passwordlogin" id="showPasswordIcon">
                                    <img src="../images/eyeclose.svg" class="show-passwordlogin" id="showPasswordIcon">
                                    </span> 
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="d-grid mx-auto ">
                                <button type="submit" class="signbutton btn  btn-block">Sign in</button>
                            </div>
                        </form>
</body>
</html>