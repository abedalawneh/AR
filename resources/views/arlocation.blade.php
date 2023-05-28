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
    <script type='text/javascript' src='https://raw.githack.com/AR-js-org/AR.js/master/three.js/build/ar-threex-location-only.js'></script>
    <script type='text/javascript' src='https://raw.githack.com/AR-js-org/AR.js/master/aframe/build/aframe-ar.js'></script>
    <script src="https://cdn.rawgit.com/donmccurdy/aframe-extras/v6.0.0/dist/aframe-extras.min.js"></script>
    <script src="https://unpkg.com/super-hands@^3.0.3/dist/super-hands.min.js"></script>

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
      <a-entity
        id="myEntity"
        gltf-model="{{ asset($name.'/'.$object->object) }}"
        look-at="[gps-camera]"
        position="0 0 -1"
        gps-entity-place="latitude: {{ $location->latitude }}; longitude: {{ $location->longitude }};"
        animation__rotate="property: rotation; to: 0 360 0; loop: true; dur: 10000" super-hands
        animation-mixer
        geometry="primitive: sphere; radius: 1000"
        visible="true"
        >
        <a-text value="{{$object->textobject}}" position="0 -1 0" color="red" transparent="true"></a-text>
    </a-entity>
    <a-camera gps-camera rotation-reader position="0 0 -4" animation-mixer></a-camera>
    
    <!-- scale="{{$object->scale}} {{$object->scale}} {{$object->scale}}" -->

      <script>
//   var myEntity = document.getElementById('myEntity');

//   // Load the GLB model
//   var loader = new THREE.GLTFLoader();
//   loader.load('{{ asset($name.'/'.$object->object) }}', function(glb) {
//     var objectSize = getObjectSize(glb.scene);
    
//     var newScale = objectSize.x / 10; // Example calculation, adjust as needed
//     console.log('ttttt'+newScale);
    // if (newScale >1) {
    //     newScale=10;
    //     myEntity.setAttribute('position', 0 + ' ' + 0 + ' ' + -90);
    // }
    // else if (newScale < 1) {
    //     newScale=10;
    // }
    // console.log('ttttt'+newScale);
    // // Update the scale attribute of the entity element
    // myEntity.setAttribute('scale', newScale + ' ' + newScale + ' ' + newScale);
//   });

//   function getObjectSize(glbModel) {
//     var boundingBox = new THREE.Box3().setFromObject(glbModel);
//     var size = new THREE.Vector3();
//     boundingBox.getSize(size);
//     return size;
//   }
var myEntity = document.getElementById('myEntity');

function updateObjectScale() {
  var windowWidth = window.innerWidth;
  var windowHeight = window.innerHeight;

  var aspectRatio = windowWidth / windowHeight;
  var scaleMultiplier = aspectRatio < 5 ? 5 / aspectRatio : aspectRatio;

  myEntity.setAttribute('scale', scaleMultiplier + ' ' + scaleMultiplier + ' ' + scaleMultiplier);
}

// Call the updateObjectScale function on page load and whenever the window is resized
window.addEventListener('load', updateObjectScale);
window.addEventListener('resize', updateObjectScale);
</script>


<script>
        
        var gltfModel =  document.querySelector('a-entity');
        // console.log('ddd');

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
            // console.log('dddf');
            previousPosition = {
                x: event.touches[0].clientX,
                y: event.touches[0].clientY
            };
            disableAnimation();
        }

        function onTouchMove(event) {
            // console.log('dddf');

            currentPosition = {
                x: event.touches[0].clientX,
                y: event.touches[0].clientY
            };
            updateRotation();
            previousPosition = currentPosition;
        }

        function onTouchEnd(event) {
            // console.log('dddf');

            previousPosition = null;
            currentPosition = null;
            enableAnimation();
        }

        // Mouse event handlers
        function onMouseDown(event) {
            // console.log('ddd1');

            previousPosition = {
                x: event.clientX,
                y: event.clientY
            };
            disableAnimation();
        }

        function onMouseMove(event) {
            // console.log('ddd2');

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
            // console.log('ddd3');

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

                </script>

    </a-scene>



    <?php }
      
      ?>
    <?php } }?>

</body>

</html>