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

   <title>email reset</title>

</head>
<body>
<!-- <section class="backgroundregister d-flex align-items-center  "> -->

<section class="containermail d-flex align-items-center">

    <!-- <main class="login-form"> -->
<div class="container ">
    <div class=" row justify-content-center ">
        <div class="col-lg-9 col-md-12 ">
            <div class="coverbox card p-md-4 ">
                    <div class="resetimage d-flex row  justify-content-center">
                        <img class="emailimage m-2 "src="../images/emailreset.svg" alt="not found"width="50px"height="50px">
                        <p class="resetext m-2 text-center">Reset my password</p>
                        <!-- <div class="card-header">{{ __('Reset Password') }}</div> -->
                    </div>
                    <div class="card-body  d-flex row justify-content-center   ">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <div class="formbox col-lg-8">
                            <!-- password.email -->
                           
                        <form method="POST" action="{{route('submiemailtForm') }}">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="email" class="labelemail p-2">{{ __('E-mail') }}</label>

                                <!-- <div class="col-md-6"> -->
                                    <input id="email" type="email" placeholder="Name@domain.com" class="imagemail form-control @error('email') is-invalid @enderror" name="emailreset" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                <!-- </div> -->
                            </div>

                            <div class="d-grid mx-auto">
                                <!-- <div class="col-md-6 offset-md-4"> -->
                                    <button type="submit" class="resetbutton btn btn-primary">
                                        {{ __('Send') }}
                                    </button>
                                <!-- </div> -->
                            </div>
                        </form></div>
                    </div>
                </div>
        </div>
    </div>
</div>
<!-- </main> -->
</section>

<!-- </section> -->
</body>
</html>
