<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- <html lang="en"> -->
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

<div class="barheight1 d-flex" id="wrapper">
  <div class="sidebardiv1  border-right" id="sidebar-wrapper">
    <div class="sidebar-heading"> </div>
    <div class="listheight list-group list-group-flush ">
      <a href="#" class="list-group-item list-group-item-action sidebardiv ">
      <img src="../images/homesimpledoor.png" alt="" width="18" height="18" class="imagebar d-inline-block align-text-top"><span class="hiddentext">Home</span></a>
      <a  href="{{ route('project') }}"onclick="event.preventDefault(); document.getElementById('project-form').submit();"
       class="list-group-item list-group-item-action sidebardiv">
        <img src="../images/project.png" alt="" width="18" height="18" class="imagebar d-inline-block align-text-top"><span class="hiddentext">Projects</span> </a>
      <a href="{{ route('events') }}"onclick="event.preventDefault(); document.getElementById('events-form').submit();"
       class="list-group-item list-group-item-action sidebardiv">
        <img src="../images/calendar.png" alt="" width="18" height="18" class="imagebar d-inline-block align-text-top"><span class="hiddentext">Events</span></a>
      <a href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
      class="list-group-item list-group-item-action sidebardiv ">
      <img src="../images/logout.png" alt="" width="18" height="18" class="imagebar d-inline-block align-text-top "><span class="hiddentext">{{ __('Logout') }}</span>
      </a>
      <form id="project-form" action="{{ route('project') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
      <form id="events-form" action="{{ route('events') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
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
                <ul class="dropdown-menu innermenu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" data-toggle="modal" href="#exampleModalCenterprofile">My profile</a></li>
                    
                </ul>
                </li>
            </ul>
            </div>
            <div class=" modal fade" id="exampleModalCenterprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterprofileTitle" aria-hidden="false">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class=" modal-content">
                <!-- <div class="modal-header">
                    </div> -->
                    <!-- <button type="button" class="closeimage close m-3" data-dismiss="modal" aria-label="Close">
                    <span class=" d-flex justify-content-end align-items-end" aria-hidden="true"><img src="../images/closeimage.png" alt="notfound"></span>
                    </button> -->
                <div class="modal-body">
                  <div class="profileimagediv d-flex  ">
                    <div id="backprofile">
                  <div   class="d-flex align-items-center">
                  <img src="../images/arrowright.png" alt="">
                  </div>
                  </div>
                    <img src="../images/inputname.svg" alt="">
                    <p class="profiletext m-2">My profile</p>
                  </div>
                  <div id="formprofile">
                  <div class="  d-flex  justify-content-center" >
                    <form method="POST" > 
                      @csrf
                          <div class="row mb-3">
                              <label for="name" class="labelcolor p-2 ">{{ __('Full name') }}</label>

                              <!-- <div class="col-md-6"> -->
                                  <input id="name" type="text"placeholder="User Name" class="imagename form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                  
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
                                  <input id="email"placeholder="Alaa@google.com" type="email" class="imagemail form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                  
                                  @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              <!-- </div> -->
                          </div>

                          <div class="d-flex " id="Changepassword">
                          
                            
                            @if (Route::has('password.request'))
                            <span class="Forgotpassword"> {{ __('Change password') }}</span>
                                    
                                  @endif
                              </div>

                          

                          <div class="d-grid justify-content-center mx-auto">
                                  <button type="submit" class="projectbutton ">
                                      <img src="../images/saveimagebutton.png" alt="" width="24" height="24">
                                      {{ __('Save') }}
                                  </button>

                          </div>
                          </form>
                    </div>
                    </div>
                    
                  <div id="passwordd">
                  <div class="  d-flex  justify-content-center " >
                    <form method="POST">
                            @csrf

                            <p class="textfluid">Change password</p>

                            <div class="form-group mb-3 ">
                                <label class="labelcolor p-2" for="Password">Password</label>
                                <input type="password" placeholder="At least 8 characters" id="password" class="form-control imagpass "
                                    name="password" required>
                                    <span class="show-passwordlogin" id="showPasswordIcon">
                                    </span> 
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3 ">
                                <label class="labelcolor p-2" for="Password">Confirm password</label>
                                <input type="password" placeholder="At least 8 characters" id="password" class="form-control imagpass "
                                    name="password" required>
                                    
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="d-grid justify-content-center mx-auto">
                                <button type="submit" class="projectbutton ">
                                    <img src="../images/saveimagebutton.png" alt="" width="24" height="24">
                                    {{ __('Save') }}
                                </button>

                        </div>
                        </form>
                    </div>
                    </div>
      
      </div>
    </div>
  </div>
        </div>
        </nav>
    <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="divfluidborder container-fluid m-1">
        <p class="textfluid">Create events</p>
        <p class="paragraphfluid"><a href="{{ route('events') }}"onclick="event.preventDefault(); document.getElementById('dashbord-form').submit();">
        events</a> > Create event</p>   
        <form id="dashbord-form" action="{{ route('events') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
        </div>
        
    </nav>
        
       
        <div class="formdiv m-4 " >
   
                <form action="{{ route('events') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        
                            <input id="userid" type="hidden"  name="userid" value="{{ Auth::user()->id }}" >
                            <p class="radiotitle "><span class="spantitle">1</span> Your event name</p>
                            <div class=" form-group mb-3 m-3">
                            <label for="Projectname" class="radiotitle p-2">{{ __('Event') }}</label>

                           
                                <input id="Projectname" type="text"placeholder="Event name"  class="imagevent form-control @error('email') is-invalid @enderror" name="Projectname" value="{{ old('Projectname') }}"  autocomplete="email" >
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                 
                            </div>
                            
                            <p class="radiotitle"><span class="spantitle"> 2 </span> Select object </p>
                            <div class=" form-group mb-3 m-3" id="hiddobject">
                            <label for="Projectname" class="radiotitle p-2">{{ __('Object') }}</label>

                           
                                <input id="Projectname" type="text"placeholder="Select one of the saved objects"  class="imageproject form-control @error('email') is-invalid @enderror" name="Projectname" value="{{ old('Projectname') }}"  autocomplete="email" >
                                <div class="mt-3" id="newobject">
                                <img src="../images/plus.png" alt=""  ><span class="addnewspan">Add new object</span>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>
                            <div id="addobject">
                            <div class="mt-3"  id="backobject">
                            <img src="../images/arrowright.png" alt=""><span class="radiotitle p-2">Add object</span>
                            </div>
                            <div class="diveuplodefile m-3" >
                                <label for="file-input1">
                                        <img class=" m-3" src="../images/uploadfile.png" alt="" width="44" height="40">
                                        <p class="radiotitle">Drag & drop files or <span class="Browse">Browse</span>  </p>                    

                                </label>
                                        <div class="selectFile">       
                                        <input type="file" name="file1"  id="file-input1">
                                        </div>
                                        <p class="radiotext">upload your marker (black and white). It will be like a QR code. </p>
                                </div>
                            </div>

                            <p class="radiotitle"><span class="spantitle"> 3 </span> Select Location</p>

                            <div class=" form-group mb-3 m-3" id="hiddlocation">
                            <label for="Projectname" class="radiotitle p-2">{{ __('Location') }}</label>

                           
                                <input id="Projectname" type="text"placeholder="Select one of the saved locations"  class="imagelocation form-control @error('email') is-invalid @enderror" name="Projectname" value="{{ old('Projectname') }}"  autocomplete="email" >
                                <div class="mt-3" id="newlocation">
                                <img src="../images/plus.png" alt=""><span class="addnewspan">Add new location</span>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                 
                            </div>
                            <div  id="addlocation">
                                <div class="mt-3"  id="backlocation">
                                <img src="../images/arrowright.png" alt=""><span class="radiotitle p-2">Add location</span>
                                </div>
                                <p class="radiotext m-3">Drop a pin on the map. You can retrieve latitude and longitude from an address</p>

                                <div class=" form-group mb-3 m-3 ">
                                <label for="Projectname" class="radiotitle p-2">{{ __('Select location') }}</label>

                                    <input id="Projectname" type="text"placeholder="Choose your place or use the map pin "  class="imagelocation form-control @error('email') is-invalid @enderror" name="Projectname" value="{{ old('Projectname') }}" required autocomplete="email" >
                                    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="Latitude d-flex ">
                                <div class=" form-group  m-3 col-lg-6 sm-col">
                                <label for="Projectname" class="radiotitle p-2">{{ __('Latitude') }}</label>

                                    <input id="Projectname" type="text"placeholder="0.00"  class=" form-control @error('email') is-invalid @enderror" name="Latitude" value="{{ old('Latitude') }}" required autocomplete="email" >
                                    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                                </div>

                                <div class=" form-group  col-lg-6 sm-col  m-3">

                                <label for="Projectname" class="radiotitle p-2">{{ __('Longitude') }}</label>

                                    <input id="Projectname" type="text"placeholder="0.00"  class=" form-control @error('email') is-invalid @enderror" name="Longitude" value="{{ old('Longitude') }}" required autocomplete="email" >
                                    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                                </div>
                            </div>
                            <div class="container mt-5">
                        <div id="map"></div>
                    </div>
                            </div>
                            <p class="radiotitle"><span class="spantitle"> 4 </span> Event radius</p>
                           

                              <div class="rangedivrange d-flex  align-items-center">
                            <div class="mainn">
                            <input  type="range" min="1" max="500" value="250" step=''  id="slider"
                            oninput="showVal(this.value)"onchange="showVal(this.value)" >
                            <div id="selector">
                                <div class="selectBtn"></div>
                                <div id="selectValue"></div>
                                </div>
                                <div id="progressBar"></div>
                            </div>         
                            <input type="text"  id="valBox" class="inputrange m-2" value="250">
                            M                                                                 
                            </div>
                                <!-- </div> -->
            
                        
                        {{ csrf_field() }}
                        <div class="d-grid justify-content-center mx-auto">
                   
                                <button type="submit" class="projectbutton ">
                                    <!-- <img src="../images/saveimagebutton.png" alt="" width="24" height="24"> -->
                                    {{ __('Generate') }}
                                </button>
                     
                        </div>
                </form>
        </div>
        
                        
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
  integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
  crossorigin="anonymous"></script>
<script>
    function showVal(newVal){
    document.getElementById("valBox").value=newVal;
}


let slider = document.getElementById('slider')
let selector = document.getElementById('selector')
let selectValue = document.getElementById('selectValue')
let progressBar = document.getElementById('progressBar')

selectValue.innerHTML = slider.value

slider.oninput = function() {
    $ss=this.value /5;
    console.log($ss);
  selectValue.innerHTML = this.value
//   progressBar.style.max-width = this.value 
selector.style.left = $ss+ '%' 
progressBar.style.width = $ss + '%'
}

    const newobjectt = document.getElementById("newobject");
    const newlocationn = document.getElementById("newlocation");
    const addobjectt = document.getElementById("addobject");
    const addlocationn = document.getElementById("addlocation");
    const backobjectt = document.getElementById("backobject");
    const backlocationn = document.getElementById("backlocation");
    const hiddobjectt = document.getElementById("hiddobject");
    const hiddlocationn = document.getElementById("hiddlocation");
    
    
    newobjectt.addEventListener("click", function() {
        addobjectt.style.display = "block";
        hiddobjectt.style.display = "none";
        console.log("ddd");
        

    });
    backobjectt.addEventListener("click", function() {
        hiddobjectt.style.display = "block";
        addobjectt.style.display = "none";
        console.log("ddd");

    });
    newlocationn.addEventListener("click", function() {
        addlocationn.style.display = "block";
        hiddlocationn.style.display = "none";
        console.log("ddd");
        

    });
    backlocationn.addEventListener("click", function() {
        hiddlocationn.style.display = "block";
        addlocationn.style.display = "none";
        console.log("ddd");

    });
</script>


<script type="text/javascript">
        function initMap() {
          const myLatLng = { lat: 31.95806, lng: 35.93528 };
          const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 5,
            center: myLatLng,
          });
  
          new google.maps.Marker({
            position: myLatLng,
            map,
            title: "Hello Rajkot!",
          });
        }
  
        window.initMap = initMap;
    </script>
  
    <script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap" >
    </script>
  <script>
        const Changepasswordd = document.getElementById("Changepassword");
        const password = document.getElementById("passwordd");
        const formprofille = document.getElementById("formprofile");
        const backprofille = document.getElementById("backprofile");

        Changepasswordd.addEventListener("click", function() {
          password.style.display = "block";
          backprofille.style.display = "flex";
          formprofille.style.display = "none";
          console.log("ddd");
        

    });
    backprofille.addEventListener("click", function() {
      formprofille.style.display = "block";
        password.style.display = "none";
        backprofille.style.display = "none";

        console.log("ddd");

    });
  </script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</body>
</html>