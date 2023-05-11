<?php
use App\Http\Controllers\projectcontroller;
use App\Models\project;
use App\Models\location;
use App\Models\objectt;
?>
<html>

<head?>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>GeoAR.js demo</title>
     <script src="https://aframe.io/releases/1.3.0/aframe.min.js"></script>
    <script src="https://unpkg.com/aframe-look-at-component@0.8.0/dist/aframe-look-at-component.min.js"></script>
    <script src="https://raw.githack.com/AR-js-org/AR.js/master/aframe/build/aframe-ar-nft.js"></script>
<script type='text/javascript' src='https://raw.githack.com/AR-js-org/AR.js/master/three.js/build/ar-threex-location-only.js'></script>
    <script src="https://cdn.jsdelivr.net/gh/donmccurdy/aframe-extras@v6.1.1/dist/aframe-extras.misc.min.js"></script>
    <script src="https://unpkg.com/super-hands@^3.0.3/dist/super-hands.min.js"></script>
    <script type="module">
    import aframeExtrasAnimationMixer from 'https://cdn.jsdelivr.net/npm/aframe-extras.animation-mixer@6.1.1/+esm'
    </script>

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
    <a-scene
      vr-mode-ui="enabled: false"
      arjs="sourceType: webcam; videoTexture: true; debugUIEnabled: false;"
    >
      <a-entity  position="0 0 -4" scale="2 2 2" geometry="primitive: sphere; radius: 1000"
        animation__rotate="property: rotation; to: 0 360 0; loop: true; dur: 20000" animation-mixer super-hands
        gltf-model="{{ asset($name.'/'.$object->object) }}" look-at="[gps-camera]"
         gps-entity-place="latitude:{{ $location->latitude }}; longitude: {{ $location->longitude }};">    
        <a-text value="test" position="0 1 0" color="red" transparent="true"></a-text>
    </a-entity>
      <a-camera gps-camera rotation-reader> </a-camera>

    <script>
        
        var gltfModel = document.querySelector('a-entity');

        var previousPosition = null;
        var currentPosition = null;
        var animationEnabled = true;

        document.addEventListener('touchstart', onTouchStart, false);
        document.addEventListener('touchmove', onTouchMove, false);
        document.addEventListener('touchend', onTouchEnd, false);
        document.addEventListener('mousedown', onMouseDown, false);
        document.addEventListener('mousemove', onMouseMove, false);
        document.addEventListener('mouseup', onMouseUp, false);

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

                </>

    </a-scene>



    <?php }
      
      ?>
    <?php } }?>

</body>

</html>