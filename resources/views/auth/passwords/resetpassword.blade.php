<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- bootstrap link-->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="../css/emailreset.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

   <title>reset password</title>

</head>
<body>

<!-- <h1>ffffff</h1> -->
<section class="containermail d-flex align-items-center">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9 col-md-12 ">
            <div class="coverbox card p-md-4">
            <div class="resetimage d-flex row  justify-content-center">
                        <img class="emailimage m-2 "src="../images/emailreset.svg" alt="not found" >
                        <p class="resetext m-2 text-center">Change my password</p>
                        <!-- <div class="card-header">{{ __('Reset Password') }}</div> -->
                    </div>

                <div class="card-body  d-flex row justify-content-center">

                <div class="formbox col-lg-8">

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                            <input type="text" name="email" value="{{ old('E-mail') }}"> 

                            

                        <div class="row mb-3">
                            <label for="password" class="labelemail p-2">{{ __('Password') }}</label>

                            <!-- <div class="col-md-6"> -->
                                <input id="password" type="password"placeholder="At least 8 characters" class="imagpass form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <span class="show-passwordreset1" id="showPasswordIcon1">
                                    <img src="../images/eyeclose.svg" class="show-passwordreset1" id="showPasswordIcon1">
                                    </span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <!-- </div> -->
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="labelemail p-2">{{ __('Confirm Password') }}</label>

                            <!-- <div class="col-md-6"> -->
                                <input id="password-confirm" type="password" placeholder="At least 8 characters" class="imagpass form-control" name="password_confirmation" required autocomplete="new-password">
                                <span class="show-passwordreset2" id="showPasswordIcon2">
                                    <img src="../images/eyeclose.svg" class="show-passwordreset2" id="showPasswordIcon2">
                                </span>
                            <!-- </div> -->
                        </div>

                        <div class="d-grid mx-auto">
                            <!-- <div class="col-md-6 offset-md-4"> -->
                                <button type="submit" class="resetbutton btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            <!-- </div> -->
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

</section>

<script>
    document.getElementById("showPasswordIcon1").addEventListener("click", function() {
    var passwordField = document.getElementById("password");
    if (passwordField.type === "password") {
        passwordField.type = "text";
        this.innerHTML = '<img src="../images/eyealt.svg" class="show-passwordreset1">';
    } else {
        passwordField.type = "password";
        this.innerHTML = '<img src="../images/eyeclose.svg" class="show-passwordreset1">';
    }
});

document.getElementById("showPasswordIcon2").addEventListener("click", function() {
    var passwordField = document.getElementById("password-confirm");
    if (passwordField.type === "password") {
        passwordField.type = "text";
        this.innerHTML = '<img src="../images/eyealt.svg" class="show-passwordreset2">';
    } else {
        passwordField.type = "password";
        this.innerHTML = '<img src="../images/eyeclose.svg" class="show-passwordreset2">';
    }
});


</script>


</body>
</html>