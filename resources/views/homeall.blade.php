<?php
use App\Http\Controllers\projectcontroller;
use App\Models\event;
use App\Models\objectt;
use App\Models\project;
use App\Models\location;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- bootstrap link-->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="../css/dashbord.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <title>Events</title>
</head>
<body>
<div class="barheight d-flex" id="wrapper">
  <div class="sidebardiv1  border-right" id="sidebar-wrapper">
    <div class="sidebar-heading"> </div>
    
    <div class="m-3 ">
    <a class="navbar-brand " href="#"><img src="../images/logoregister.svg"class="logopage" alt="not found"></a>
    </div>

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
        <img src="../images/calendar.png" alt="" width="18" height="18" class="navtext d-inline-block align-text-center ">All
    </a>
    <div class="dropdowninner d-flex justify-content-end m-3 col-md-6" id="navbarNavDropdown">
            <ul class="navbar-nav ">
               
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle  " href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
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
                                  <input id="name" type="text"placeholder="{{ Auth::user()->name }}" class="imagename form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                  
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
    
    <?php
     
    $userFront1 = event::where('user_id', Auth::user()->id)->get();
    $userproject = project::where('user_id', Auth::user()->id)->get();
    
    if(count($userFront1)==0 && count($userproject)==0){
    // if(count($userFront1)==0){
    ?>
    
      <!-- <p>{{$userFront1}}</p> -->
    
    <div class="divnofile d-flex row justify-content-center align-items-center">
    <img src="../images/FileNotFound.png" alt="" class="imagefluid" >
        <p class="texttext d-flex justify-content-center align-items-center">You have no events. Please create new one.  </p>
    </div>
   
    <?php
    }else{
    ?>
    <div class="saveddiv d-flex">
      <?php
      foreach ($userFront1 as $frontuserFor) {
        $objectid=$frontuserFor->object_id;
        $objectevent = objectt::where('id', $objectid)->get();
        $gltf=$objectevent[0]->object;

        ?>
    <form id="edit-form-{{$frontuserFor->id}}" action="{{route('editevents')}}" method="post" class="d-none">
                                            @csrf
         <input type="text" name="id" value="{{$frontuserFor->id}}">

    </form> 
<form id="delete-form-{{$frontuserFor->id}}" action="{{route('deletevent')}}" method="post" class="d-none">
                                            @csrf
         <input type="text" name="id" value="{{$frontuserFor->id}}">

    </form>
                            
    <div class=" modal fade" id="delete-popup-{{$frontuserFor->id}}" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalCenterTitle" aria-hidden="false">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="bgroundmodal modal-content">
                                                        <!-- <div class="modal-header">
                                                            </div> -->
                                                        <button type="button" class="closeimage close m-3" data-dismiss="modal" aria-label="Close">
                                                            <span class=" d-flex justify-content-end align-items-end" aria-hidden="true"><img
                                                                    src="../images/closeimage.png" alt="notfound"></span>
                                                        </button>
                                                        <div class="modal-body">
                                                            <div class="   d-flex  justify-content-center">
                                                                <img src="../images/deletedimage.png" alt="not found" class="m-3" width="150px" height="150px">
                                                            </div>
                                                            
                                                            <h1 class="modal-title textfluid d-flex  justify-content-center">Are you sure?</h1>
                                                            <p class="contactp d-flex  justify-content-center">Do you really need to delete this item.</p>
                                                            <div class="  d-flex  justify-content-center m-2">
                                                               
                                                                    <a href=""
                                                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{$frontuserFor->id}}').submit();" 
                                                                    class="creatbutton btn">
                                                                  
                                                                        <span>{{ __('Delete') }}</span>
                                                                </a>
                                                                  
                                                            </div>
                                                    </div>
                                                </div>
            
                                            </div>
                                        </div> 


    <!-- create div saved events -->
    <div class="saved m-3 col-lg-2">
      <div class="imgmenu m-2 d-flex justify-content-center">
        
        
      <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
                                <script nomodule src="https://unpkg.com/@google/model-viewer/dist/model-viewer-legacy.js"></script>
                                <!-- Use it like any other HTML element -->
                                <model-viewer id="toggle-poster" src="glbobject/{{$gltf}}" controls
                                    auto-rotate poster="assets/poster2.png"></model-viewer>
                                <script>
                                    const posters = ['poster.png', 'poster2.png'];
                                    let i = 0;
                                    setInterval(() =>
                                        document.querySelector('#toggle-poster').setAttribute('poster',
                                            `assets/${posters[i++ % 2]}`), 2000);
                                </script>        
      <div class="dropdowninner " id="navbarNavDropdown">
            <ul class="navbar-nav ">
               
                <li class="nav-item dropdown">
                <a class="nav-link   " href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                ...
                </a>
                <ul class="dropdown-menu innermenu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href=""onclick="event.preventDefault();
                                             document.getElementById('edit-form-{{$frontuserFor->id}}').submit();"><img src="../images/editpencil.png"
                                                        alt="" class="m-1" width="20px" height="20px">Edit</a></li>
                    <li><a class="dropdown-item" href="object/{{$objectevent[0]->object}}" download
                    >
                    <img src="../images/downloadrow.png" alt=""class="m-1"width="20px" height="20px">Download file  </a></li>

                    <li><a class="dropdown-item" data-toggle="modal" href="#delete-popup-{{$frontuserFor->id}}"
                                            >
                                                    <img src="../images/trash.png" alt="" class="m-1" width="20px"
                                                        height="20px"><span class="redtext">
                                                        Delete</span>
                                                        
                                                     </a></li>
                </ul>
                </li>
            </ul>
            </div>
          
      </div>
      <p class="totlesaved m-2">{{$frontuserFor->event_name}}</p>
      <div class="d-flex ">
      <?php
      $locationid=$frontuserFor->location_id ;
        $locationevent = location::where('id', $locationid)->get();
        ?>

      <p class="textsaved m-2 p-2">{{$locationevent[0]->location}}</p>
      
      <p class="textsaved m-2 p-2">{{$frontuserFor->event_radius}} M</p>
      </div>
    </div>
    <?php
    } 
    ?>
    </div>
    
    </div>
    <div class="saveddiv d-flex">
                    <?php
          
      foreach ($userproject as $frontuserFor) {
          $objectproject = objectt::where('project_id', $frontuserFor->id)->get();
          
          // $iduser=$frontuserFor->id;
          // return $$objectproject;
           
    
if($frontuserFor->based_tybe=="Location based"){
    ?>
    <form id="delete-form-{{$frontuserFor->id}}" action="{{route('delete2')}}" method="post" class="d-none">
                                            @csrf
         <input type="text" name="id" value="{{$frontuserFor->id}}">

    </form>
<?php }
else {?>
    <form id="delete-form-{{$frontuserFor->id}}" action="{{route('delete1')}}" method="post" class="d-none">
                                            @csrf
         <input type="text" name="id" value="{{$frontuserFor->id}}">

    </form>
<?php
}
?>
    <form id="edit-form-{{$frontuserFor->id}}" action="{{route('editproject')}}" method="post" class="d-none">
                                            @csrf
         <input type="text" name="id" value="{{$frontuserFor->id}}">

    </form>                  
    <form id="ar-form-{{$frontuserFor->id}}" action="{{route('qrlocation')}}" method="post" class="d-none">
                                            @csrf
         <input type="text" name="id" value="{{$frontuserFor->id}}">

    </form> 
    <div class=" modal fade" id="delete-popup-{{$frontuserFor->id}}" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalCenterTitle" aria-hidden="false">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="bgroundmodal modal-content">
                                                        <!-- <div class="modal-header">
                                                            </div> -->
                                                        <button type="button" class="closeimage close m-3" data-dismiss="modal" aria-label="Close">
                                                            <span class=" d-flex justify-content-end align-items-end" aria-hidden="true"><img
                                                                    src="../images/closeimage.png" alt="notfound"></span>
                                                        </button>
                                                        <div class="modal-body">
                                                            <div class="   d-flex  justify-content-center">
                                                                <img src="../images/deletedimage.png" alt="not found" class="m-3" width="150px" height="150px">
                                                            </div>
                                                            
                                                            <h1 class="modal-title textfluid d-flex  justify-content-center">Are you sure?</h1>
                                                            <p class="contactp d-flex  justify-content-center">Do you really need to delete this item.</p>
                                                            <div class="  d-flex  justify-content-center m-2">
                                                               
                                                                    <a href=""
                                                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{$frontuserFor->id}}').submit();" 
                                                                    class="creatbutton btn">
                                                                  
                                                                        <span>{{ __('Delete') }}</span>
                                                                </a>
                                                                  
                                                            </div>
                                                    </div>
                                                </div>
            
                                            </div>
                                        </div>               
                    <!-- create div saved events -->
                    <div class="saved m-3 col-lg-2">
                        <div class="imgmenu m-2 d-flex ">
                            <?php if (count($objectproject) > 0) {
                                // Access the first element in the array
                            $object = $objectproject[0];
                            $gltf=$object->object;
                            ?>
                            <!-- <img src="/scene.gltf{{$frontuserFor->id}}/{{$object->object}}" alt="not found" class="m-3" width="150px" height="150px"> -->
                                <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
                                <script nomodule src="https://unpkg.com/@google/model-viewer/dist/model-viewer-legacy.js"></script>
                                <!-- Use it like any other HTML element -->
                                <model-viewer id="toggle-poster" src="glbobject/{{$gltf}}" controls
                                auto-rotate poster="assets/poster2.png"></model-viewer>
                                <script>
                                    const posters = ['poster.png', 'poster2.png'];
                                    let i = 0;
                                    setInterval(() =>
                                        document.querySelector('#toggle-poster').setAttribute('poster',
                                            `assets/${posters[i++ % 2]}`), 2000);
                                </script>


                                <?php }
                                    ?>
                            <div class="dropdowninner " id="navbarNavDropdown">
                                <ul class="navbar-nav ">

                                    <li class="nav-item dropdown">
                                        <a class="nav-link   " href="#" id="navbarDropdownMenuLink" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            ...
                                        </a>
                                        <ul class="dropdown-menu innermenu" aria-labelledby="navbarDropdownMenuLink">
                                            <li><a class="dropdown-item" href=""onclick="event.preventDefault();
                                             document.getElementById('edit-form-{{$frontuserFor->id}}').submit();"><img src="../images/editpencil.png"
                                                        alt="" class="m-1" width="20px" height="20px">Edit</a></li>
                                            <li><a class="dropdown-item" href="createvents"><img
                                                        src="../images/calendar.png" alt="" class="m-1" width="20px"
                                                        height="20px">Create event</a></li>
                                            <li><a class="dropdown-item" data-toggle="modal" href="#delete-popup-{{$frontuserFor->id}}"
                                            >
                                                    <img src="../images/trash.png" alt="" class="m-1" width="20px"
                                                        height="20px"><span class="redtext">
                                                        Delete </span>
                                                        
                                                     </a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                           
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center ">
                            <p class="totlesaved m-2">{{$frontuserFor->project_name}}</p>
                            <?php
                            if ($frontuserFor->based_tybe=="Location based"){
                            ?>
                            <a href="#qrcodepopup-{{$frontuserFor->id}}"
                             data-toggle="modal"  class="totlesaved m-2 text-decoration-none">QR</a>
                            <?php }?>
                        </div>
                         <!-- Modal -->

         <div class=" modal fade" id="qrcodepopup-{{$frontuserFor->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="false">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="bgroundmodal modal-content">
                <!-- <div class="modal-header">
                    </div> -->
                    <button type="button" class="closeimage close m-3" data-dismiss="modal" aria-label="Close">
                    <span class=" d-flex justify-content-end align-items-end" aria-hidden="true"><img src="../images/closeimage.png" alt="notfound"></span>
                    </button>
                    <div class="card-body d-flex justify-content-center">
                    
                    <?php 
                    $idproject=$frontuserFor->id;
                    $url = route('qrlocation', ['id' => $idproject]);
                    echo QrCode::size(200)->generate($url) ;
                        ?>
                    
                   
                    </div>
                <div class="modal-body m-3">

                <h1 class="modal-title qrtitle d-flex  justify-content-center" id="exampleModalLongTitle">Success</h1>
                <p class="qrtext d-flex  justify-content-center" >Here you are your link you can send or save it.</p>
                <?php 
                // $randomString =Str::random() ;
                // $link = 'https://'.$randomString;
                ?>
                   <span class="textqr2"><a href=""onclick="event.preventDefault();
                     document.getElementById('ar-form-{{$frontuserFor->id}}').submit();">{{ asset('arlocation?id='.$frontuserFor->id)}}</a></span>
                     
               </div>
               <div class=" m-3 d-flex row justify-content-evenly align-items-center">
                <button type="button" class="creatbuttonqr2 btn  btn-block m-0  " data-dismiss="modal" download><span  class="textbuttonqr2">Download</span> </button>
               <button type="button" class="creatbuttonqr btn  btn-block m-0  " data-dismiss="modal">Send</button>
               </div>
                <!-- <div class="modal-footer">
                </div> -->
                </div>
            </div>
            </div>


                        <div class="d-flex ">
                            <p class="textsaved m-2 p-2">{{$frontuserFor->based_tybe}}</p>
                            <?php
                if ($frontuserFor->based_tybe=="Location based"){
                  $locationproject = location::where('project_id', $frontuserFor->id)->get();
                     if (count($locationproject) > 0) {
                                // Access the first element in the array
                            $location = $locationproject[0];?>
                            <p class="textsaved m-2 p-2">{{$location->location}}</p>

                            <?php }}?>
                        </div>
                    </div>
                    <?php
    } 
  
    ?>
                </div>
                <?php }?>
</div>
  </div>
</div>




  <script>
        const Changepasswordd = document.getElementById("Changepassword");
        const password = document.getElementById("passwordd");
        const formprofille = document.getElementById("formprofile");
        const backprofille = document.getElementById("backprofile");

        Changepasswordd.addEventListener("click", function() {
          password.style.display = "block";
          backprofille.style.display = "flex";
          formprofille.style.display = "none";
          // console.log("ddd");
        

    });
    backprofille.addEventListener("click", function() {
      formprofille.style.display = "block";
        password.style.display = "none";
        backprofille.style.display = "none";

        // console.log("ddd");

    });
  </script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</body>
</html>