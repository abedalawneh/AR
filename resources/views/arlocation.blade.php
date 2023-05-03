<?php
use App\Http\Controllers\projectcontroller;
use App\Models\project;
use App\Models\location;
use App\Models\objectt;
?>
<html>

<head>
    <title>AR.js A-Frame Location-based</title>
    <script src="https://aframe.io/releases/1.0.4/aframe.min.js"></script>
    <script type='text/javascript'
        src='https://raw.githack.com/AR-js-org/AR.js/master/three.js/build/ar-threex-location-only.js'></script>
    <script type='text/javascript' src='https://raw.githack.com/AR-js-org/AR.js/master/aframe/build/aframe-ar.js'>
    </script>
    <script src="https://cdn.jsdelivr.net/gh/donmccurdy/aframe-extras@v6.1.1/dist/aframe-extras.misc.min.js"></script>
    <script src="https://unpkg.com/super-hands@^3.0.3/dist/super-hands.min.js"></script>
    <!-- <script src='https://aframe.io/releases/1.2.0/aframe.min.js'></script>
  <script src='https://cdn.rawgit.com/jeromeetienne/AR.js/2.0.5/aframe/build/aframe-ar.js'></script> -->
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



<a-scene embedded vr-mode-ui='enabled: false' arjs='sourceType: webcam; debugUIEnabled: false; '>
    
    <a-assets>
        <a-asset-item id="tree" src="{{ asset($name.'/'.$object->object) }}"></a-asset-item>
    </a-assets>
    <a-marker-camera preset="hiro"></a-marker-camera>
    
    <!-- <a-entity id="myEntity" gps-camera rotation-reader gps-entity-place="latitude: {{ $location->latitude }}; longitude: {{ $location->longitude }};"
    position="0 0 -4" 
    gltf-model="#tree" animation-mixer scale="0.5 0.5 0.5"
    animation__rotate="property: rotation; to: 0 360 0; loop: true; dur: 20000"  super-hands
    geometry="primitive: sphere; radius: 1000">
            <a-text value="{{$object->textobject}}" position="0 1 0" color="red" transparent="true"></a-text>
        </a-entity> -->


        <a-entity id="targetLocation" gps-entity-place="latitude: 37.7749; longitude: -122.4194;"></a-entity>

<a-entity id="myEntity" rotation-reader gps-entity-place="latitude: {{ $location->latitude }}; longitude: {{ $location->longitude }};"
    gltf-model="#tree" animation-mixer scale="0.5 0.5 0.5"
    animation__rotate="property: rotation; to: 0 360 0; loop: true; dur: 20000"  super-hands
    geometry="primitive: sphere; radius: 1000" visible="false">
    <a-text value="{{$object->textobject}}" position="0 1 0" color="red" transparent="true"></a-text>
    </a-entity>


<script>
AFRAME.registerComponent('distance-check', {
  init: function () {
    // Set the target location coordinates
    var targetLocation = document.querySelector('#targetLocation').components['gps-entity-place'].data;
    
    // Get the user's location
    navigator.geolocation.watchPosition(function (position) {
      var userLocation = {
        latitude: position.coords.latitude,
        longitude: position.coords.longitude
      };
      
      // Calculate the distance between the user's location and the target location
      var distance = getDistanceFromLatLonInKm(userLocation.latitude, userLocation.longitude, targetLocation.latitude, targetLocation.longitude);
      
      // Display the object if the distance is less than or equal to 50 meters
      if (distance <= 0.05) {
        document.querySelector('#myEntity').setAttribute('visible', true);
      } else {
        document.querySelector('#myEntity').setAttribute('visible', false);
      }
    });
    
    // Haversine formula to calculate the distance between two GPS coordinates
    function getDistanceFromLatLonInKm(lat1, lon1, lat2, lon2) {
      var R = 6371; // Radius of the earth in km
      var dLat = deg2rad(lat2-lat1);  // deg2rad below
      var dLon = deg2rad(lon2-lon1); 
      var a = 
        Math.sin(dLat/2) * Math.sin(dLat/2) +
        Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
        Math.sin(dLon/2) * Math.sin(dLon/2)
        ; 
      var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
      var d = R * c; // Distance in km
      return d;
    }

    function deg2rad(deg) {
      return deg * (Math.PI/180)
    }
  }
});
document.querySelector('#myEntity').setAttribute('distance-check', '');
</script>


  <script>
  var myEntity = document.getElementById('myEntity');

  // Load the GLB model
  var loader = new THREE.GLTFLoader();
  loader.load('{{ asset($name.'/'.$object->object) }}', function(glb) {
    var objectSize = getObjectSize(glb.scene);
    var newScale = objectSize.x / 10; // Example calculation, adjust as needed
    if (newScale > 0.5) {
        newScale=0.5;
        myEntity.setAttribute('position', 0 + ' ' + 0 + ' ' + -90);
    }
    else if (newScale < 0.5) {
        newScale=0.5;
    }
    console.log('ttttt'+newScale);
    // Update the scale attribute of the entity element
    myEntity.setAttribute('scale', newScale + ' ' + newScale + ' ' + newScale);
  });

  function getObjectSize(glbModel) {
    var boundingBox = new THREE.Box3().setFromObject(glbModel);
    var size = new THREE.Vector3();
    boundingBox.getSize(size);
    return size;
  }
</script>

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




    <?php }
      
      ?>
    <?php } }?>

</body>

</html>