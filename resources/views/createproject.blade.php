<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- bootstrap link-->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="../css/dashbord.css" rel="stylesheet">
    
    <title>create project</title>
</head>
<body>
<!-- $user = User::findOrFail(Auth::user()->id); -->

<div class="barheight d-flex" id="wrapper">
  <div class="sidebardiv1  border-right" id="sidebar-wrapper">
    <div class="sidebar-heading"> </div>
    <div class="listheight list-group list-group-flush ">
      <a href="#" class="list-group-item list-group-item-action sidebardiv ">
      <img src="../images/homesimpledoor.png" alt="" width="18" height="18" class="imagebar d-inline-block align-text-top">Home</a>
      <a href="#" class="list-group-item list-group-item-action sidebardiv">
        <img src="../images/project.png" alt="" width="18" height="18" class="imagebar d-inline-block align-text-top">Projects</a>
      <a href="#" class="list-group-item list-group-item-action sidebardiv">
        <img src="../images/calendar.png" alt="" width="18" height="18" class="imagebar d-inline-block align-text-top">Events</a>
      <a href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
      class="list-group-item list-group-item-action sidebardiv ">
      <img src="../images/logout.png" alt="" width="18" height="18" class="imagebar d-inline-block align-text-top ">{{ __('Logout') }}
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
    </div>
  </div>
  <div class="barwidth" id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light sidebardiv ">
        <div class="divfluid container-fluid m-1 ">
        <a class="navbar-brand " href="#">
        <img src="../images/project.png" alt="" width="18" height="18" class="navtext d-inline-block align-text-center ">Projects
    </a>
            <div class="dropdowninner d-flex justify-content-end col-md-6" id="navbarNavDropdown">
            <ul class="navbar-nav ">
               
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle  " href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                User Name
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
                </li>
            </ul>
            </div>
        </div>
        </nav>
    <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="divfluidborder container-fluid m-1">
        <p class="textfluid">Create Project</p>
        <p class="paragraphfluid"><a href="{{ route('dashbordd') }}"onclick="event.preventDefault(); document.getElementById('dashbord-form').submit();">
        Projects</a> > Create project</p>   
        <form id="dashbord-form" action="{{ route('dashbordd') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
        </div>
        
    </nav>
        <div class="divnofile d-flex row justify-content-center align-items-center m-3">
            <div class="form-check d-flex align-items-center">
                <input class="form-check-input" type="radio" name="based" id="Markerbased1" >
                <div class="radiodiv d-flex align-items-center form-check-label" id="Markerbased" for="Markerbased1" >
                    <img src="../images/imageradio.png" alt="" width="40" height="40" class="imageradio">
                    <div >
                    <p class="radiotitle">Marker based</p>
                    <p class="radiotext">Connect your creation to a visual marker, which can be moved to any location.</p>
                    </div>
                </div>
            </div>
            <div class=" form-check d-flex align-items-center">
                <input class="form-check-input" type="radio" name="based" id="Locationbased1">
                <div class="radiodiv d-flex align-items-center form-check-label" id="Locationbased" for="Locationbased1">
                    <img src="../images/mapradio.png" alt="" width="40" height="40" class="imageradio">
                    <div >
                    <p class="radiotitle">Location based</p>
                    <p class="radiotext">Place your creation on a map, so it remains tied to a physical location.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- marker based -->
        <div class="formdiv m-4 " id="formdiv1">
            <p class="textfluid">Marker based</p>

                <!-- <form method="POST" action="{{ route('project') }}" enctype="multipart/form-data"> -->
                <form action="{{ route('project') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                        <!-- <ol class="lititle"> -->
                            <!-- <li class="radiotitle">Your Project name</li> -->
                            <input id="typebased" type="hidden"   name="typebased" value="Marker based" >
                            <input id="userid" type="hidden"  name="userid" value="{{ Auth::user()->id }}" >
                            <p class="radiotitle "><span class="spantitle">1</span> Your Project name</p>
                            <div class=" form-group mb-3 m-3">
                            <label for="Projectname" class="radiotitle p-2">{{ __('Project') }}</label>

                            <!-- <div class="col-md-6"> -->
                                <input id="Projectname" type="text"placeholder="Project name"  class="imageproject form-control @error('email') is-invalid @enderror" name="Projectname" value="{{ old('Projectname') }}"  autocomplete="email" >
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <!-- </div> -->
                            </div>
                            <!-- <li class="radiotitle">Your marker (Optional)</li> -->
                            <p class="radiotitle"><span class="spantitle"> 2 </span> Your marker (Optional) </p>
                            <div class="diveuplodefile m-4" >
                            <label for="file-input1">
                                    <img class=" m-3" src="../images/uploadfile.png" alt="" width="44" height="40">
                                    <p class="radiotitle">Drag & drop files or <span class="Browse">Browse</span>  </p>                    

                            </label>
                                    <div class="selectFile">       
                                    <input type="file" name="file1"  id="file-input1">
                                    </div>
                                    <p class="radiotext">upload your marker (black and white). It will be like a QR code. </p>
                            </div>

                            <p class="radiotitle"><span class="spantitle"> 3 </span> Your object </p>

                            <div class="diveuplodefile m-4">
                            <label for="file-input2">
                                    <img class=" m-3" src="../images/uploadfile.png" alt="" width="44" height="40">
                                    <p class="radiotitle">Drag & drop files or <span class="Browse">Browse</span>  </p>                    

                            </label>
                                    <div class="selectFile">       
                                    <input type="file" name="file2" id="file-input2">
                                    </div>
                                    <p class="radiotext">3D, Image, Video. It will link to your marker or our QR code. Max size is 50 MB </p>
                            </div>

                        
                        <!-- </ol> -->
                        
                        {{ csrf_field() }}
                        <div class="d-grid justify-content-center mx-auto">
                            <!-- <div class="col-md-8 offset-md-4"> -->
                                <button type="submit" class="projectbutton ">
                                    <img src="../images/saveimagebutton.png" alt="" width="24" height="24">
                                    {{ __('Save') }}
                                </button>
                            <!-- </div> -->
                        </div>
                </form>
        </div>

        <!--lacation based-->
        <div class="formdiv m-4 " id="formdiv2">
            <p class="textfluid">Location based</p>

                <form method="POST" action="{{ route('login.custom') }}">
                            @csrf
                        <!-- <ol class="lititle"> -->
                            <!-- <li class="radiotitle">Your Project name</li> -->
                            <p class="radiotitle "><span class="spantitle">1</span> Your Project name</p>
                            <div class=" form-group mb-3 m-3">
                            <label for="Projectname" class="radiotitle p-2">{{ __('Project') }}</label>

                            <!-- <div class="col-md-6"> -->
                                <input id="Projectname" type="text"placeholder="Project name"  class="imageproject form-control @error('email') is-invalid @enderror" name="Projectname" value="{{ old('Projectname') }}" required autocomplete="email" >
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <!-- </div> -->
                            </div>
                            <!-- <li class="radiotitle">Your marker (Optional)</li> -->
                            <p class="radiotitle"><span class="spantitle"> 2 </span> Your location </p>
                            <p class="radiotext m-3">Drop a pin on the map. You can retrieve latitude and longitude from an address</p>

                            <div class=" form-group mb-3 m-3 ">
                            <label for="Projectname" class="radiotitle p-2">{{ __('Select location') }}</label>

                            <!-- <div class="col-md-6"> -->
                                <input id="Projectname" type="text"placeholder="Choose your place or use the map pin "  class="imagelocation form-control @error('email') is-invalid @enderror" name="Projectname" value="{{ old('Projectname') }}" required autocomplete="email" >
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <!-- </div> -->
                            </div>

                            <div class="Latitude d-flex ">
                            <div class=" form-group mb-3 m-3 lg-col-6 sm-col">
                            <label for="Projectname" class="radiotitle p-2">{{ __('Latitude') }}</label>

                            <!-- <div class="col-md-6"> -->
                                <input id="Projectname" type="text"placeholder="0.00"  class=" form-control @error('email') is-invalid @enderror" name="Latitude" value="{{ old('Latitude') }}" required autocomplete="email" >
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                                <!-- </div> -->
                            </div>

                            <div class=" form-group mb-3 lg-col-6 sm-col  m-3">

                             <label for="Projectname" class="radiotitle p-2">{{ __('Longitude') }}</label>

                            <!-- <div class="col-md-6"> -->
                                <input id="Projectname" type="text"placeholder="0.00"  class=" form-control @error('email') is-invalid @enderror" name="Longitude" value="{{ old('Longitude') }}" required autocomplete="email" >
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <!-- </div> -->
                            
                            </div>
                            </div>
                            <p class="radiotitle"><span class="spantitle"> 3 </span> Your object </p>

                            <div class="diveuplodefile m-4">
                            <label for="file-input">
                                    <img class=" m-3" src="../images/uploadfile.png" alt="" width="44" height="40">
                                    <p class="radiotitle">Drag & drop files or <span class="Browse">Browse</span>  </p>                    

                            </label>
                                    <div class="selectFile">       
                                    <input type="file" name="file3"  id="file-input">
                                    </div>
                                    <p class="radiotext">3D, Image, Video. It will link to your marker or our QR code. Max size is 50 MB </p>
                            </div>

                        
                        <!-- </ol> -->
                        

                        <div class="d-grid justify-content-center mx-auto">
                            <!-- <div class="col-md-8 offset-md-4"> -->
                                <button type="submit" class="projectbutton ">
                                    <img src="../images/saveimagebutton.png" alt="" width="24" height="24">
                                    {{ __('Save') }}
                                </button>
                            <!-- </div> -->
                        </div>
                </form>
        </div>
    </div>
  </div>
</div>


<script>
    const Locationbased1 = document.getElementById("Locationbased1");
    const Markerbased1 = document.getElementById("Markerbased1");
    const formdiv2 = document.getElementById("formdiv2");
    const formdiv1 = document.getElementById("formdiv1");
    const Locationbased = document.getElementById("Locationbased");
    const Markerbased = document.getElementById("Markerbased");
    
    Locationbased1.addEventListener("change", function() {
        formdiv2.style.display = "block";
        Locationbased.style.background="linear-gradient(115.94deg, rgba(219, 0, 255, 0.1) -8.4%, rgba(0, 240, 255, 0.1) 109.09%)";
        formdiv1.style.display = "none";
        Markerbased.style.background="none";

    });
    Markerbased1.addEventListener("change", function() {
        formdiv1.style.display = "block";
        Markerbased.style.background="linear-gradient(115.94deg, rgba(219, 0, 255, 0.1) -8.4%, rgba(0, 240, 255, 0.1) 109.09%)";
        formdiv2.style.display = "none";
        Locationbased.style.background="none";
    });

</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</body>
</html>