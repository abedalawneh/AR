<?php
use App\Http\Controllers\projectcontroller;
use App\Models\project;
use App\Models\location;
use App\Models\objectt;
?>
<html>

<head>
    <title>AR.js A-Frame Location-based</title>
    <!-- Include Three.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>

<!-- Include A-Frame -->
<script src="https://aframe.io/releases/1.2.0/aframe.min.js"></script>
<script type='text/javascript' src='https://raw.githack.com/AR-js-org/AR.js/master/three.js/build/ar-threex-location-only.js'></script>

<script src="https://cdn.jsdelivr.net/npm/aframe-extras.animation-mixer@6.1.1/+esm"></script>
<script src="https://unpkg.com/super-hands@^3.0.3/dist/super-hands.min.js"></script>

<script type='text/javascript' src='https://raw.githack.com/AR-js-org/AR.js/master/aframe/build/aframe-ar.js'></script>

<!-- <script src="https://cdn.jsdelivr.net/gh/donmccurdy/aframe-extras@v6.1.1/dist/aframe-extras.misc.min.js"></script> -->
    <!-- <script src="https://unpkg.com/super-hands@^3.0.3/dist/super-hands.min.js"></script> -->
    <!-- <script src='https://aframe.io/releases/1.2.0/aframe.min.js'></script>
  <script src='https://cdn.rawgit.com/jeromeetienne/AR.js/2.0.5/aframe/build/aframe-ar.js'></script> -->
  <!-- <script type="module">
    import aframeExtrasAnimationMixer from 'https://cdn.jsdelivr.net/npm/aframe-extras.animation-mixer@6.1.1/+esm'
    </script> -->
</head>


<body>
    <?php
        foreach ($userFront1 as $frontuserFor) {
            $objectproject = objectt::where('project_id', $frontuserFor->id)->get();
            $locationproject = location::where('project_id', $frontuserFor->id)->get();
            
            if (count($locationproject) > 0){
              $location = $locationproject[0];
             if (count($objectproject) > 0) {
              $object = $objectproject[0];
              $name='glbobject';
     ?>





<a-scene vr-mode-ui='enabled: false' arjs='sourceType: webcam; videoTexture: true; debugUIEnabled: false' renderer='antialias: true; alpha: true'>

    <a-entity gps-camera position="0 0 -4" rotation-reader>
        <a-entity  gltf-model="{{ asset($name.'/'.$object->object) }}" animation-mixer scale="0.5 0.5 0.5"
        animation__rotate="property: rotation; to: 0 360 0; loop: true; dur: 20000" super-hands
        geometry="primitive: sphere; radius: 1000" 
        gps-entity-place="latitude: {{ $location->latitude }}; longitude: {{ $location->longitude }}; distance: 5;" look-at="[gps-camera]">
            <a-text value="{{$object->textobject}}" position="0 1 0" color="red" transparent="true"></a-text>
        </a-entity>
    </a-entity>

    <script>
        // var animation='{{$object->animation}}';
        // console.log(animation);
        // if (animation =='Poth') {

        // Get a reference to the GLTF model entity
        var gltfModel = document.querySelector('a-entity');

        // Define variables to store the previous and current touch or mouse positions
        var previousPosition = null;
        var currentPosition = null;
        var animationEnabled = true;

        // Add touch and mouse event listeners to the scene
        document.addEventListener('touchstart', onTouchStart, false);
        document.addEventListener('touchmove', onTouchMove, false);
        document.addEventListener('touchend', onTouchEnd, false);
        document.addEventListener('mousedown', onMouseDown, false);
        document.addEventListener('mousemove', onMouseMove, false);
        document.addEventListener('mouseup', onMouseUp, false);

        // Touch event handlers
        function onTouchStart(event) {
            previousPosition = {
                x: event.touches[0].clientX,
                y: event.touches[0].clientY
            };
            disableAnimation();
        }

        function onTouchMove(event) {
            currentPosition = {
                x: event.touches[0].clientX,
                y: event.touches[0].clientY
            };
            updateRotation();
            previousPosition = currentPosition;
        }

        function onTouchEnd(event) {
            previousPosition = null;
            currentPosition = null;
            enableAnimation();
        }

        // Mouse event handlers
        function onMouseDown(event) {
            previousPosition = {
                x: event.clientX,
                y: event.clientY
            };
            disableAnimation();
        }

        function onMouseMove(event) {
            if (previousPosition) {
                currentPosition = {
                    x: event.clientX,
                    y: event.clientY
                };
                updateRotation();
                previousPosition = currentPosition;
            }
        }

        function onMouseUp(event) {
            previousPosition = null;
            currentPosition = null;
            enableAnimation();
        }

        // Function to update the rotation of the model based on touch or mouse input
        function updateRotation() {
            if (previousPosition && currentPosition) {
                var deltaX = currentPosition.x - previousPosition.x;
                var deltaY = currentPosition.y - previousPosition.y;
                gltfModel.object3D.rotation.y -= deltaX * 0.01; // Adjust the rotation speed here
                gltfModel.object3D.rotation.x -= deltaY * 0.01; // Adjust the rotation speed here
                gltfModel.object3D.rotation.x = Math.max(-Math.PI / 2, Math.min(Math.PI / 2, gltfModel.object3D.rotation
                    .x)); // Clamp the rotation around the X axis to avoid flipping the model
            }
        }

        // Function to enable the animation__rotate animation
        function enableAnimation() {
            if (!animationEnabled) {
                gltfModel.setAttribute('animation__rotate', 'enabled', 'true');
                animationEnabled = true;
            }
        }

        // Function to disable the animation__rotate animation
        function disableAnimation() {
            if (animationEnabled) {
                gltfModel.setAttribute('animation__rotate', 'enabled', 'false');
                animationEnabled = false;
            }
        }

        // elseif(animation=="Animationrotate"){

        //  // Get a reference to the GLTF model entity
        // var gltfModel = document.querySelector('a-entity');

        // // Add the animation__rotate animation to the model
        // gltfModel.setAttribute('animation__rotate', 'property', 'rotation');
        // gltfModel.setAttribute('animation__rotate', 'dur', '10000');
        // gltfModel.setAttribute('animation__rotate', 'from', '0 0 0');
        // gltfModel.setAttribute('animation__rotate', 'to', '0 360 0');
        // gltfModel.setAttribute('animation__rotate', 'easing', 'linear');
        // gltfModel.setAttribute('animation__rotate', 'loop', 'true');

        // }
        // elseif(animation=="ONTouch"){
        //  // Get a reference to the GLTF model entity
        //  var gltfModel = document.querySelector('a-entity');

        // // Define variables to store the previous and current touch or mouse positions
        // var previousPosition = null;
        // var currentPosition = null;

        // // Add touch and mouse event listeners to the scene
        // document.addEventListener('touchstart', onTouchStart, false);
        // document.addEventListener('touchmove', onTouchMove, false);
        // document.addEventListener('touchend', onTouchEnd, false);
        // document.addEventListener('mousedown', onMouseDown, false);
        // document.addEventListener('mousemove', onMouseMove, false);
        // document.addEventListener('mouseup', onMouseUp, false);

        // // Touch event handlers
        // function onTouchStart(event) {
        //   previousPosition = { x: event.touches[0].clientX, y: event.touches[0].clientY };
        // }

        // function onTouchMove(event) {
        //   currentPosition = { x: event.touches[0].clientX, y: event.touches[0].clientY };
        //   updateRotation();
        //   previousPosition = currentPosition;
        // }

        // function onTouchEnd(event) {
        //   previousPosition = null;
        //   currentPosition = null;
        // }

        // // Mouse event handlers
        // function onMouseDown(event) {
        //   previousPosition = { x: event.clientX, y: event.clientY };
        // }

        // function onMouseMove(event) {
        //   if (previousPosition) {
        //     currentPosition = { x: event.clientX, y: event.clientY };
        //     updateRotation();
        //     previousPosition = currentPosition;
        //   }
        // }

        // function onMouseUp(event) {
        //   previousPosition = null;
        //   currentPosition = null;
        // }

        // // Function to update the rotation of the model based on touch or mouse input
        // function updateRotation() {
        //   if (previousPosition && currentPosition) {
        //     var deltaX = currentPosition.x - previousPosition.x;
        //     var deltaY = currentPosition.y - previousPosition.y;
        //     gltfModel.object3D.rotation.y -= deltaX * 0.01; // Adjust the rotation speed here
        //     gltfModel.object3D.rotation.x -= deltaY * 0.01; // Adjust the rotation speed here
        //     gltfModel.object3D.rotation.x = Math.max(-Math.PI / 2, Math.min(Math.PI / 2, gltfModel.object3D.rotation.x)); // Clamp the rotation around the X axis to avoid flipping the model
        //   }
        // }
        // }
        </script>

    </a-scene>

<!-- <script type='text/javascript' src='https://raw.githack.com/AR-js-org/AR.js/master/aframe/build/aframe-ar.js'></script> -->


    <?php }
      
      ?>
    <?php } }?>

</body>

</html>