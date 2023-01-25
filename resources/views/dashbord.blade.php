<?php
use App\Http\Controllers\projectcontroller;
use App\Models\project;

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
    
    <title>dashbord</title>
</head>
<body>
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
        <div class=" container-fluid m-1">
        <p class="textfluid">Saved projects</p>
            <div class="collapse  d-flex  justify-content-end" id="navbarNavDropdown">
            <a href="{{ route('createprojectt') }}"onclick="event.preventDefault(); document.getElementById('createproject-form').submit();">
            <button type="submit" class="creatbutton btn  btn-block m-0  ">  
            <img src="../images/pageedit.png" alt="" width="24" height="24" class="imagebar d-inline-block align-text-center ">Create project</button></a>
            <form id="createproject-form" action="{{ route('createprojectt') }}" method="POST" class="d-none">
                                        @csrf
                                    </form></div>
        </div>
        
    </nav>
    <?php
     
    $userFront1 = project::where('user_id', Auth::user()->id)->get();
    $file = File::find($id);
    $path = Storage::url($file->path);
    if(count($userFront1)==0){
    ?>
    
      <!-- <p>{{$userFront1}}</p> -->
    
    <div class="divnofile d-flex row justify-content-center align-items-center">
    <img src="../images/FileNotFound.png" alt="" class="imagefluid" >
        <p class="texttext d-flex justify-content-center align-items-center">You have no projects. Please create new one. </p>
    </div>
    <?php
    }
    else{
      
      foreach ($userFront1 as $frontuserFor) {
    ?>
    <!-- <p>{{$userFront1}}</p> -->
    <div>
      <img src="{{$frontuserFor->your_marker}}" alt="not found">
      <h3>{{$frontuserFor->project_name}}</h3>
      <p>{{$frontuserFor->based_tybe}}</p>

    </div>
    <?php
    } }
  
    ?>
</div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</body>
</html>