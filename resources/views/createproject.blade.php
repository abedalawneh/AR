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
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>


    <title>create project</title>
</head>
<body>
<!-- $user = User::findOrFail(Auth::user()->id); -->

<div class="barheight d-flex" id="wrapper">
  <div class="sidebardiv1  border-right" id="sidebar-wrapper">
    <div class="sidebar-heading"> </div>
    <div class="listheight list-group list-group-flush ">
      <a href="{{ route('homeall') }}"onclick="event.preventDefault(); document.getElementById('homeall-form').submit();"
       class="list-group-item list-group-item-action sidebardiv ">
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
      <form id="homeall-form" action="{{ route('homeall') }}" method="POST" class="d-none">
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
        <p class="textfluid">Create Project</p>
        <p class="paragraphfluid"><a href="{{ route('project') }}"onclick="event.preventDefault(); document.getElementById('dashbord-form').submit();">
        Projects</a> > Create project</p>   
        <form id="dashbord-form"  action="{{ route('project') }}" method="POST" class="d-none">
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

                
                <form id="markerform"  method="post" enctype="multipart/form-data"  action="{{ route('projectinsertt') }}">
                            @csrf
                            <!-- {{ csrf_field() }} -->
                            <input id="typebased" type="hidden"   name="typebased" value="Marker based" >
                            <input id="userid" type="hidden"  name="userid" value="{{ Auth::user()->id }}" >
                            <p class="radiotitle "><span class="spantitle">1</span> Your Project name</p>
                            <div class=" form-group mb-3 m-3">
                            <label for="Projectname" class="radiotitle p-2">{{ __('Project') }}</label>

                           
                                <input id="Projectname" type="text"placeholder="Project name"  class="imageproject form-control @error('email') is-invalid @enderror" name="Projectname" value="{{ old('Projectname') }}"  autocomplete="email" >
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                 
                            </div>
                            
                            <p class="radiotitle"><span class="spantitle"> 2 </span> Your marker (Optional) </p>
                            <div class="diveuplodefile m-4" >
                            <label for="file-input1">
                                    <img class=" m-3" src="../images/uploadfile.png" alt="" width="44" height="40">
                                    <p class="radiotitle">Drag & drop files or <span class="Browse">Browse</span>  </p>                    

                            </label>
                                    <div class="selectFile">       
                                    <input type="file" name="file1"  id="file-input1" multiple>
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
                                    <input type="file" name="file2[]" id="file-input2" multiple>
                                    </div>
                                    <p class="radiotext">3D, Image, Video. It will link to your marker or our QR code. Max size is 50 MB </p>

                                </div>
                                
                                <p class="radiotitle"><span class="spantitle"> 4 </span>How you like your object ?</p>
                                <div class="form-check form-check-inline m-4">
                                    <input class="form-check-input" type="radio" name="objectanimation" id="inlineRadio1" value="Animationrotate">
                                    <label class="form-check-label" for="inlineRadio1">Animation_rotate</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="objectanimation" id="inlineRadio2" value="ONTouch">
                                    <label class="form-check-label" for="inlineRadio2">ON Touch</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="objectanimation" id="inlineRadio3" value="Poth" >
                                    <label class="form-check-label" for="inlineRadio3">Both</label>
                                </div>
                        
            
                        
                        {{ csrf_field() }}
                        <div class="d-grid justify-content-center mx-auto">
                   
                                <button type="submit" class="projectbutton ">
                                    <img src="../images/saveimagebutton.png" alt="" width="24" height="24">
                                    {{ __('Save') }}
                                </button>
                     
                        </div>
                </form>
        </div>

        <!--lacation based-->
        <div class="formdiv m-4 " id="formdiv2">
            <p class="textfluid">Location based</p>

                <form id="locationform"  method="post" enctype="multipart/form-data" action="{{ route('locationinsertt') }}">
                            @csrf
                            <input id="typebased" type="hidden"   name="typebased" value="Location based" >
                            <input id="userid" type="hidden"  name="userid" value="{{ Auth::user()->id }}" >
                            <p class="radiotitle "><span class="spantitle">1</span> Your Project name</p>
                            <div class=" form-group mb-3 m-3">
                            <label for="Projectname" class="radiotitle p-2">{{ __('Project') }}</label>

                                <input id="Projectname" type="text"placeholder="Project name"  class="imageproject form-control @error('email') is-invalid @enderror" name="Projectname" value="{{ old('Projectname') }}" required autocomplete="email" >
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <p class="radiotitle"><span class="spantitle"> 2 </span> Your location </p>
                            <p class="radiotext m-3">Drop a pin on the map. You can retrieve latitude and longitude from an address</p>

                            <div class=" form-group mb-3 m-3 ">
                            <label for="autocomplete" class="radiotitle p-2">{{ __('Select location') }}</label>
                            <!-- <select id="places" class="imagelocation form-control" required>
                            <option value="" disabled selected>Choose your place or use the map pin</option>
                            </select> -->
                            <input type="text" name="autocomplete" id="autocomplete" placeholder="Choose your place or use the map pin "  class="imagelocation form-control "  required  >
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="Latitude d-flex ">
                            <div class=" form-group  m-3 col-lg-6 sm-col">
                            <label for="Latitude" class="radiotitle p-2">{{ __('Latitude') }}</label>

                                <input id="Latitude" type="text"placeholder="0.00"  class=" form-control @error('email') is-invalid @enderror" name="Latitude" value="{{ old('Latitude') }}" required autocomplete="email" >
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                            </div>

                            <div class=" form-group  col-lg-6 sm-col  m-3">

                             <label for="Longitude" class="radiotitle p-2">{{ __('Longitude') }}</label>

                                <input id="Longitude" type="text"placeholder="0.00"  class=" form-control @error('email') is-invalid @enderror" name="Longitude" value="{{ old('Longitude') }}" required autocomplete="email" >
                                
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
                    <p class="radiotitle"><span class="spantitle"> 3 </span> Your object </p>

                    <div class="diveuplodefile m-4">
                    <label for="file-input3">
                            <img class=" m-3" src="../images/uploadfile.png" alt="" width="44" height="40">
                            <p class="radiotitle">Drag & drop files or <span class="Browse">Browse</span>  </p>                    

                    </label>
                            <div class="selectFile">       
                            <input type="file" name="file3[]" id="file-input3" multiple>
                            </div>
                            <p class="radiotext">3D, Image, Video. It will link to your marker or our QR code. Max size is 50 MB </p>
                    </div>

                        
                    <p class="radiotitle"><span class="spantitle"> 4 </span>How you like your object ?</p>
                                <div class="form-check form-check-inline m-4">
                                    <input class="form-check-input" type="radio" name="objectanimation" id="inlineRadio1" value="Animationrotate">
                                    <label class="form-check-label" for="inlineRadio1">Animation_rotate</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="objectanimation" id="inlineRadio2" value="ONTouch">
                                    <label class="form-check-label" for="inlineRadio2">ON Touch</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="objectanimation" id="inlineRadio3" value="Poth" >
                                    <label class="form-check-label" for="inlineRadio3">Both</label>
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

<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places"></script>


<script>
    const Locationbased1 = document.getElementById("Locationbased1");
    const Markerbased1 = document.getElementById("Markerbased1");
    const formdiv2 = document.getElementById("formdiv2");
    const formdiv1 = document.getElementById("formdiv1");
    const Locationbased = document.getElementById("Locationbased");
    const Markerbased = document.getElementById("Markerbased");
    const barheight = document.getElementById("wrapper");
    
    Locationbased1.addEventListener("change", function() {
        formdiv2.style.display = "block";
        Locationbased.style.background="linear-gradient(115.94deg, rgba(219, 0, 255, 0.1) -8.4%, rgba(0, 240, 255, 0.1) 109.09%)";
        formdiv1.style.display = "none";
        Markerbased.style.background="none";
        barheight.style.height="auto";

    });
    Markerbased1.addEventListener("change", function() {
        formdiv1.style.display = "block";
        Markerbased.style.background="linear-gradient(115.94deg, rgba(219, 0, 255, 0.1) -8.4%, rgba(0, 240, 255, 0.1) 109.09%)";
        formdiv2.style.display = "none";
        Locationbased.style.background="none";
        barheight.style.height = "auto";
    });


        const Changepasswordd = document.getElementById("Changepassword");
        const password = document.getElementById("passwordd");
        const formprofille = document.getElementById("formprofile");
        const backprofille = document.getElementById("backprofile");

        Changepasswordd.addEventListener("click", function() {
          password.style.display = "block";
          backprofille.style.display = "flex";
          formprofille.style.display = "none";
        //   console.log("ddd");
        

    });
    backprofille.addEventListener("click", function() {
      formprofille.style.display = "block";
        password.style.display = "none";
        backprofille.style.display = "none";

        // console.log("ddd");

    });

                let map;
                google.maps.event.addDomListener(window, 'load', initMap);

                    function initMap() {
                        var input = document.getElementById('autocomplete');
                        var autocomplete = new google.maps.places.Autocomplete(input);
                        map = new google.maps.Map(document.getElementById("map"), {
                            center: {  lat: 31.95806, lng: 35.93528 },
                            zoom: 8,
                            scrollwheel: true,
                        });
                        // const uluru = { lat: -34.397, lng: 150.644 };
                        // let marker = new google.maps.Marker({
                        //     position: uluru,
                        //     map: map,
                        //     draggable: true
                        // });
                        var marker = new google.maps.Marker({
                        position: { lat: 31.95806, lng: 35.93528},
                        map: map,
                        draggable: true
                        });
                        google.maps.event.addListener(marker,'position_changed',
                            function (){
                                let lat = marker.position.lat()
                                let lng = marker.position.lng()
                                $('#Latitude').val(lat)
                                $('#Longitude').val(lng)
                            })
                        google.maps.event.addListener(map,'click',
                        function (event){
                            pos = event.latLng
                            marker.setPosition(pos)
                        })
                        autocomplete.addListener('place_changed', function () {
                            var place = autocomplete.getPlace();
                            $('#Latitude').val(place.geometry['location'].lat());
                            $('#Longitude').val(place.geometry['location'].lng());
                            if (!place.geometry) {
                            window.alert("Autocomplete's returned place contains no geometry");
                            return;
                            }
                            if (place.geometry.viewport) {
                                map.fitBounds(place.geometry.viewport);
                            } else {
                                map.setCenter(place.geometry.location);
                                map.setZoom(17);  // Why 17? Because it looks good.
                            }
                            marker.setPosition(place.geometry.location);
                            marker.setVisible(true);
                                                                        
                                                
                            var address = '';
                            if (place.address_components) {
                                address = [
                                (place.address_components[0] && place.address_components[0].short_name || ''),
                                (place.address_components[1] && place.address_components[1].short_name || ''),
                                (place.address_components[2] && place.address_components[2].short_name || '')
                                ].join(' ');
                            }
                            infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
                            infowindow.open(map, marker);
                        
                        });

                        var geocoder = new google.maps.Geocoder;
                        var infowindow = new google.maps.InfoWindow;
                        var cityInput = document.getElementById('autocomplete');

                        google.maps.event.addListener(marker, 'dragend', function(event) {
                        geocoder.geocode({'location': event.latLng}, function(results, status) {
                            if (status === 'OK') {
                            if (results[0]) {
                                var city;
                                results[0].address_components.forEach(function(component) {
                                if (component.types.includes('locality')) {
                                    city = component.long_name;
                                }
                                });
                                cityInput.value = city;
                                infowindow.setContent(city);
                                infowindow.open(map, marker);
                            } else {
                                window.alert('No results found');
                            }
                            } else {
                            window.alert('Geocoder failed due to: ' + status);
                            }
                        });
                        });
                            
            window.initMap = initMap;
        }
</script>

    

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap" ></script>
        <script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&libraries=places" ></script>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script >
    // $(document).ready(function() {  
    //     $('#markerform').on('submit', function(event) {
    //         event.preventDefault();
    //         var fileInput1 = document.getElementById('file-input1').files[0];
    //         var fileInput2 = document.getElementById('file-input2').files[0];
    //         var formData = new FormData($("#markerform")[0]);
    //         // formData.append('file1', $("#file-input1").files[0]);
            
    //         console.log(fileInput1);
    //         // formData.append('file1', fileInput1);
    //         formData.append('file1name', fileInput1.name);
    //         formData.append('fle2name', fileInput2.name);
    //         $.ajax({
      
    //             url:"{{ route('projectinsertt') }}",
    //             data: formData,
    //             type: 'POST',
    //             dataType: 'json',
    //             contentType: false,
    //             cache: false,
    //             processData: false,
    //             async: false,
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             },
    //             success: function(data) {
    //             console.log(data);
    //             },
    //             error: function(data){
    //             console.log(data);
    //             }
    //         });
            
    //     });
    // });


    // $(document).ready(function() {  
    //     $('#locationform').on('submit', function(event) {
    //         event.preventDefault();
    //         var fileInput1 = document.getElementById('file-input3').files[0];
    //         var formData = new FormData($("#locationform")[0]);
            
    //         // console.log(fileInput1);

    //         formData.append('file1name', fileInput1.name);
    //         $.ajax({
      
    //             url:"{{ route('locationinsertt') }}",
    //             data: formData,
    //             type: 'POST',
    //             dataType:'JSON',
    //             contentType: false,
    //             cache: false,
    //             processData: false,
    //             async: false,
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             },
    //             success: function(data) {
    //             // console.log(data);
    //             },
    //             error: function(data){
    //             // console.log(data);
    //             }
    //         });
            
    //     });
    // });

//     $(document).ready(function() {  
//   $('#locationform').on('submit', function(event) {
//     event.preventDefault();
//     var fileInput = document.getElementById('file-input3').files[0];
//     var formData = new FormData($(this)[0]);
//     // formData.append('file1name', fileInput);

//     $.ajax({
//       url: "{{ route('locationinsertt') }}",
//       data: formData,
//       type: 'POST',
//     //   dataType: 'JSON',
//       contentType: false,
//       cache: false,
//       processData: false,
//       headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//       },
//       success: function(data) {
//         // console.log(data);
//         // Handle success response here
//       },
//       error: function(data) {
//         // console.log(data);
//         // Handle error response here
//       }
//     });
//   });
// });

</script>


</body>
</html>