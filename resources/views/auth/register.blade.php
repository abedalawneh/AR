<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="../css/registration.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

    <title>registration</title>
</head>
<body>
    
    <section class="backgroundregister d-flex align-items-center  ">

    <section class="formregister col-md-6 ">
<main class="signup-form "  >
    <div class="cotainer ">
        <div class="coverheigth row justify-content-center ">
            <div class=" col-lg-9 col-md-12">
                <div class="card p-md-4">
                    <img class="logoform m-2"src="../images/logoregister.svg" alt="not found">
                    <p class="creattext m-2 text-start">Create my account</p>
                    <p class="alreadytext m-2 text-start">Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
                    <div class="card-body">

                    <form method="POST" action="{{ route('register.custom') }}"> 
                    @csrf
                        <div class="form-group mb-3">
                            <label for="name" class="labelcolor p-2 ">{{ __('Full name') }}</label>

                            <!-- <div class="col-md-6"> -->
                                <input id="name" type="text"placeholder="Full name" class="imagename form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <!-- </div> -->
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="labelcolor p-2  ">{{ __('E-mail') }}</label>

                            <!-- <div class="col-md-6"> -->
                                <input id="email"placeholder="Name@domain.com" type="email" class="imagemail form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <!-- </div> -->
                        </div>

                        <div class="form-group mb-3 ">
                            <label for="password" class="labelcolor p-2">{{ __('Password') }}</label>

                            <!-- <div class="col-md-6"> -->
                                <input id="password" type="password"placeholder="At least 8 characters" class="form-control imagpass @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <span class="show-passwordlogin" id="showPasswordIcon">
                                    <img src="../images/eyeclose.svg" class="show-passwordlogin" id="showPasswordIcon">
                                    </span> 
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <!-- </div> -->
                        </div>

                        <!-- <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div> -->

                        <div class="d-grid mx-auto">
                            <!-- <div class="col-md-6 offset-md-4"> -->
                                <button type="submit" class="signbutton btn btn-primary">
                                    {{ __('Sign in') }}
                                </button>
                            <!-- </div> -->
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</section>

</section>

<script>
    document.getElementById("showPasswordIcon").addEventListener("click", function() {
    var passwordField = document.getElementById("password");
    if (passwordField.type === "password") {
        passwordField.type = "text";
        this.innerHTML = '<img src="../images/eyealt.svg" class="show-password">';
    } else {
        passwordField.type = "password";
        this.innerHTML = '<img src="../images/eyeclose.svg" class="show-password">';
    }
});

</script>
</body>
</html>