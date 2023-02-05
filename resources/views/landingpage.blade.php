<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- bootstrap link-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="../css/landingpage.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" /> -->
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <title>landing page</title>
</head>
<body >
    
    <section>
    <div class="dreame ">
    <div class="overlay"></div>
            <!-- navbar -->
            <nav class="navtext navbar navbar-expand-lg navbar-light  ">
                <a class="navbar-brand" href="#"><img src="../images/logoregister.svg" alt="not found"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="divnav collapse navbar-collapse  " id="navbarSupportedContent">
                    <ul class="navtext navbar-nav mr-auto m-0">
                    <li class=" nav-item active p-3 d-flex justify-content-center ">
                        <a class=" nav-link" id="myText" href="#">Home</a>
                    </li>
                    <li class="nav-item p-3 d-flex justify-content-center ">
                        <a class="nav-link" id="myText" href="#aboutus">About</a>
                    </li>
                    
                    <li class="nav-item p-3 d-flex justify-content-center ">
                        <a class="nav-link "id="myText" href="#FAQ">FAQ</a>
                    </li>
                    <li class="nav-item p-3 d-flex justify-content-center ">
                        <a class="nav-link "id="myText" href="#Create">Create </a>
                    </li>
                    <li class="nav-item p-3 d-flex justify-content-center ">
                        <a class="nav-link " id="myText"href="#Contact">Contact us</a>
                    </li>
                    
                    </ul>
                
                <div class="buttonnav d-flex justify-content-center p-3 ">
                @if (Auth::check())
                <a href="{{ route('project') }}" class="navebutton btn  btn-block">Projects</a>
                @else
                <a href="{{ route('login') }}" class="navebutton btn  btn-block">Sign in</a>
                @endif
                </div> 
                
            </div>
                   
                        </nav>

            <!-- dream -->
            <div class=" row d-flex justify-content-start align-items-center m-0 ">
            <div class="textdream col col-lg-4 col-md-4">
                    <h1 class="dreamtitle">Making <span class="dream">Dreams</span><br>  Become Reality</h1>
                    <p class="dreameparagraph">Interact with the world by combining the real world with your 
                        chosen objects. You can create your event just select the location and attach your object.</p>
                        <div class="buttonsection1 d-grid mx-auto  ">
                        @if (Auth::check())
                                <a href="{{ route('createvents') }}"onclick="event.preventDefault(); document.getElementById('createvent-form').submit();">
                                    <button type="submit" class="creatbutton btn  btn-block">Create my event</button></a>
                                    @else
                                    <a href="{{ route('login') }}">
                                    <button type="submit" class="creatbutton btn  btn-block">Create my event</button></a>
                                @endif
                                </div>
                                <form id="createvent-form" action="{{ route('createvents') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
            </div>
            
        </div>
    </div>

     </section>
     
    <section class="aboutus" id="Create">
    <div class="container ">
        <div class="reversecolum row d-flex justify-content-center ">
            <div class="backvedio sm-col col-lg-4  ">
                
            </div>
            <div class="workpart col align-items-center  m-2">
                <h1 class="worktitle">How it works</h1>
                <p class="workparagraph">You need to sign in to our website and choose one of our choices 
                    ( Marker based or Location based). Then you follow our steps to get your event link with image or QR code.</p>
            
                <div class=" row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="cardclass card h-100 p-2 ">
                            <img src="../images/createimage.svg" class="imagecard card-img-left m-2" alt="..." width= "40px" height=" 40px">
                            <div class="card-body">
                                <h5 class="card-title">Create</h5>
                                <p class="card-text">Create your project on our website simply drag and drop your object.</p>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col">
                    <div class="cardclass card h-100 p-2">
                            <img src="../images/saveimage.svg" class="imagecard card-img-left m-2" alt="..." width= "40px" height=" 40px">
                            <div class="card-body">
                                <h5 class="card-title">Save</h5>
                                <p class="card-text">You can save your project for using it easily in another time.</p>
                            </div>
                        </div>
                        </div>
                        <div class="col">
                        <div class="cardclass card h-100 p-2">
                            <img src="../images/shareimage.svg" class="imagecard card-img-left m-2" alt="..." width= "40px" height=" 40px">
                            <div class="card-body">
                                <h5 class="card-title">Engage</h5>
                                <p class="card-text">Getting a link and marker image (QR code) and share it with your audience.</p>
                            </div>
                        </div>
                        </div>
                </div>
            
            </div>
        </div>
  </div>
    </section>

    <section class="aboutus" id="aboutus">
    <div class="container">
        <div class=" row d-flex align-items-end">
            
            <div class="workpart col col-lg-8 col-md   align-items-center ">
                <h1 class="worktitle">About us</h1>
                <div class="container">
                    <div class="row ">
                        <div class="col-md-6 col  ">
                            <p class="workparagraph">We are enhanced versions of the real physical world that is achieved
                                through the use of digital visual elements. We also produce solutions for these categories :</p>
                                <ul class="list ">
                                    <li class="">Geo-locations</li>
                                    <li class="">Travel & Tourism</li>
                                    <li class="">Education</li>
                                    <li class="">E-commerce</li>
                                    <li class="">Marketing </li>
                                </ul>
                                <div class="d-grid mx-auto ">
                                @if (Auth::check())
                                <a href="{{ route('createvents') }}"onclick="event.preventDefault(); document.getElementById('createvent-form').submit();">
                                    <button type="submit" class="creatbutton btn  btn-block">Create my event</button></a>
                                    @else
                                    <a href="{{ route('login') }}">
                                    <button type="submit" class="creatbutton btn  btn-block">Create my event</button></a>
                                @endif
                                </div>
                                <form id="createvent-form" action="{{ route('createvents') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <!-- <form id="login-form" action="{{route('login')}}" method="POST" class="d-none">
                                        @csrf
                                    </form> -->

                        </div>
                        <div class="aboutus2 sm-col col-md-6  p-0 d-flex justify-content-end">
                        <img class=" m-2"src="../images/aboutus1image.svg" alt="not found">
                        </div>
                    </div>
                </div>

                
                
            </div>
            <div class="divaboutus1 sm-col col-md col-lg-3  p-0 ">
            <img class="aboutus1 m-2"src="../images/aboutusimage.png" alt="not found">
            </div>
        </div>
  </div>
    </section>

    <section class="aboutus" id="FAQ">
    <div class="container">
        <div class=" row ">
            <div class="divfagimage col d-flex ">
            <img class="fagimage m-2"src="../images/faqimage.svg" alt="not found">
            </div>
            <div class=" col  m-4">
                <h1 class="faq">Frequently asked questions</h1>
                <div>
                <div class="gaqdiv row">
                    <div class="textfaq col-sm-10 col-8">
                        <h1>How can I create my own project?</h1>
                        <p id="myText1" style="display: none;">You can create your project in your account after registration.</p>
                    </div>
                    <div class="col-sm-2 col">
                        <span class="show-text d-flex align-items-end justify-content-end" id="showtextIcon1">
                        <img src="../images/plusicon.svg" class="show-text" id="showtextIcon1">
                        </span>
                    </div>
                </div>
                <div class="gaqdiv row">
                    <div class="textfaq col-sm-10 col-8">
                        <h1>Can I add 1 or more objects in one scene?</h1>
                        <p id="myText2" style="display: none;">Now you can add only one to your scene.</p>
                    </div>
                    <div class="col-sm-2 col">
                        <span class="show-text d-flex align-items-end justify-content-end" id="showtextIcon2">
                        <img src="../images/plusicon.svg" class="show-text" id="showtextIcon2">
                        </span>
                    </div>
                </div>
                <div class="gaqdiv row">
                    <div class="textfaq col-sm-10 col-8">
                        <h1>How many events can i create in my account?</h1>
                        <p id="myText3" style="display: none;">You can create as many events as you can.</p>
                    </div>
                    <div class="col-sm-2 col">
                        <span class="show-text d-flex align-items-end justify-content-end" id="showtextIcon3">
                        <img src="../images/plusicon.svg" class="show-text" id="showtextIcon3">
                        </span>
                    </div>
                </div>
                <div class="gaqdiv row">
                    <div class="textfaq col-sm-10 col-8">
                        <h1>For what distance does the object I upload will cover?</h1>
                        <p id="myText4" style="display: none;">You can specify it in the radius field as you like.</p>
                    </div>
                    <div class="col-sm-2 col">
                        <span class="show-text d-flex align-items-end justify-content-end" id="showtextIcon4">
                        <img src="../images/plusicon.svg" class="show-text" id="showtextIcon4">
                        </span>
                    </div>
                </div>
                <div class="gaqdiv row">
                    <div class="textfaq col-sm-10 col-8">
                        <h1> How can people access my events?</h1>
                        <p id="myText5" style="display: none;">You can share with them the event link or download 
                        your event file (Camera link and the marker image)</p>
                    </div>
                    <div class="col-sm-2 col">
                        <span class="show-text d-flex align-items-end justify-content-end" id="showtextIcon5">
                        <img src="../images/plusicon.svg" class="show-text" id="showtextIcon5">
                        </span>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    </section>

    <section class="aboutus" id="Contact">
        <div class="container contavtus d-flex align-items-center sm-12">
        <div class="col  row  justify-content-center">
            <h1 class="contacth1 d-flex  justify-content-center">Still have questions?</h1>
            <p class="contactp d-flex  justify-content-center">Can’t find the answer you’re looking for? Please chat to our friendly team.</p>
        <button type="button" class="creatbutton btn  btn-block m-0" data-toggle="modal" data-target="#exampleModalCenter">Contact us</button>
            
        <!-- Button trigger modal -->


        <!-- Modal -->

         <div class=" modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="false">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="bgroundmodal modal-content">
                <!-- <div class="modal-header">
                    </div> -->
                    <button type="button" class="closeimage close m-3" data-dismiss="modal" aria-label="Close">
                    <span class=" d-flex justify-content-end align-items-end" aria-hidden="true"><img src="../images/closeimage.png" alt="notfound"></span>
                    </button>
                <div class="modal-body">
                <h1 class="modal-title contacth1 d-flex  justify-content-center" id="exampleModalLongTitle">Contact us</h1>
                <p class="contactp d-flex  justify-content-center" >Please leave your message and we will contact with you</p>
                    
                <form class=" m-2 p-3">
                    <div class="m-3 d-flex row justify-content-center align-items-center">
                    <label class="formlabel" for="name">Full name</label>
                    <input class="inputtext" type="text" id="name" name="name" placeholder="Your full name"><br>
                    </div>
                    <div class=" m-3 d-flex row justify-content-center align-items-center">
                    <label class="formlabel" for="email">E-mail</label>
                    <input class="inputtext" type="email" id="email" name="email" placeholder="Name@domain.com"><br>
                    </div>
                    <div class=" m-3 d-flex row justify-content-center align-items-center">
                    <label class="formlabel" for="message">Message</label>
                    <textarea class="inputtext" id="message" name="message" placeholder="Leave your message here...."></textarea><br>
                    </div>
                    <div class=" m-3 d-flex row justify-content-center align-items-center">
                    <button type="button" class="creatbutton btn  btn-block m-0  " data-dismiss="modal">Send</button>
                    </div>
                </form> 
               </div>
                <!-- <div class="modal-footer">
                </div> -->
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>


    <section class="aboutus">
    <div class="container  d-flex align-items-center">
        <div class="col  row  justify-content-center">
            <div class=" row ">
            <h1 class="faq d-flex  justify-content-center p-1">Get our latest news</h1>
            <p class="contactp d-flex  justify-content-center m-1">Enter your e-mail and subscribe to get our latest news.</p>

            <form class="divform form-inline d-flex justify-content-center align-items-center">
                <!-- <div class=" sm-col d-inline-flex"> -->
                    
                    <!-- <div class="divform form-group   sm-col  m-3"> -->
                        <input type="email" class="inputstyle form-control m-2 " id="exampleInputEmail1" aria-describedby="emailHelp"  placeholder="Name@domain.com">
                    <button type="submit" class="buttonstyle formbutton btn btn-primary  m-2 p-0">Subscribe now</button>
                <!-- </div> -->
            </form>

            <nav class="navbar navbar-expand-lg navbar-light bg-light ">
                <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNavAltMarkup">
                    <div class="divbuttontext navbar-nav">
                    <a class="navbuttontext nav-item nav-link " href="#">Home </a>
                    <a class="navbuttontext nav-item nav-link " href="#">About us</a>
                    <a class="navbuttontext nav-item nav-link " href="#">How it works</a>
                    <a class="navbuttontext nav-item nav-link " href="#">FAQ</a>
                    <a class="navbuttontext nav-item nav-link " href="#">Create</a>
                    <a class="navbuttontext nav-item nav-link " href="#">Contact us</a>
                    </div>
                </div>
            </nav>
            <p class="contactp d-flex  justify-content-center m-3">2022 All Rights Reserved</p>

            </div>
        </div>
    </section>


    <script>
        for (let i = 1; i < 6; i++) {
           var iconid="showtextIcon"+i;
           var iconid1= document.getElementById(iconid);
           iconid1.addEventListener("click", function() {
            var textid="myText"+i;
                var myText =document.getElementById(textid);
            if (myText.style.display === "none") {
                myText.style.display = "block";
                this.innerHTML = '<img src="../images/minusicon.svg" class="show-password">';
            } else {
                myText.style.display = "none";
                this.innerHTML = '<img src="../images/plusicon.svg" class="show-password">';
    
            }
            });
            
        }
       
    </script>
    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
</body>
</html>