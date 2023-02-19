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
<script type='text/javascript' src='https://raw.githack.com/AR-js-org/AR.js/master/three.js/build/ar-threex-location-only.js'></script>
<script type='text/javascript' src='https://raw.githack.com/AR-js-org/AR.js/master/aframe/build/aframe-ar.js'></script>
  <script src="https://cdn.jsdelivr.net/gh/donmccurdy/aframe-extras@v6.1.1/dist/aframe-extras.misc.min.js"></script>
  <script src="https://unpkg.com/super-hands@^3.0.3/dist/super-hands.min.js"></script>
  
<script src="https://unpkg.com/aframe-click-drag-component"></script>

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
              $name='scene.gltf'.$frontuserFor->id;
     ?>
     
      <!-- <a-scene vr-mode-ui='enabled: false' arjs='sourceType: webcam; videoTexture: true; debugUIEnabled: false' renderer='antialias: true; alpha: true'>
        <a-camera gps-new-camera='gpsMinDistance: 5' ></a-camera>
        <a-entity  position="0 0 0" scale="10 10 10" gltf-model="{{ asset($name.'/'.$object->object) }}"
        gps-new-entity-place="latitude:{{$location->latitude}}; longitude:{{ $location->longitude}}"
        animation__rotate="property: rotation; to: 0 360 0; loop: true; dur: 10000"
        super-hands ></a-entity>
        
        </a-scene> -->

        <a-scene vr-mode-ui='enabled: false' arjs='sourceType: webcam; videoTexture: true; debugUIEnabled: false' renderer='antialias: true; alpha: true'>
  <a-camera gps-new-camera='gpsMinDistance: 5'></a-camera>
  
  <a-entity position="0 0 0" scale="10 10 10" 
            gltf-model="{{ asset($name.'/'.$object->object) }}" 
            gps-new-entity-place="latitude:{{$location->latitude}}; longitude:{{ $location->longitude}}"
            animation__rotate="property: rotation; to: 0 360 0; loop: true; dur: 10000"
            super-hands>
  </a-entity>
  
  <script>
    // Get a reference to the GLTF model entity
    var gltfModel = document.querySelector('a-entity');
    
    // Define variables to store the previous and current touch or mouse positions
    var previousPosition = null;
    var currentPosition = null;
    
    // Add touch and mouse event listeners to the scene
    document.addEventListener('touchstart', onTouchStart, false);
    document.addEventListener('touchmove', onTouchMove, false);
    document.addEventListener('touchend', onTouchEnd, false);
    document.addEventListener('mousedown', onMouseDown, false);
    document.addEventListener('mousemove', onMouseMove, false);
    document.addEventListener('mouseup', onMouseUp, false);
    
    // Touch event handlers
    function onTouchStart(event) {
      previousPosition = { x: event.touches[0].clientX, y: event.touches[0].clientY };
    }
    
    function onTouchMove(event) {
      currentPosition = { x: event.touches[0].clientX, y: event.touches[0].clientY };
      updateRotation();
      previousPosition = currentPosition;
    }
    
    function onTouchEnd(event) {
      previousPosition = null;
      currentPosition = null;
    }
    
    // Mouse event handlers
    function onMouseDown(event) {
      previousPosition = { x: event.clientX, y: event.clientY };
    }
    
    function onMouseMove(event) {
      if (previousPosition) {
        currentPosition = { x: event.clientX, y: event.clientY };
        updateRotation();
        previousPosition = currentPosition;
      }
    }
    
    function onMouseUp(event) {
      previousPosition = null;
      currentPosition = null;
    }
    
    // Function to update the rotation of the model based on touch or mouse input
    function updateRotation() {
  if (previousPosition && currentPosition) {
    var deltaX = currentPosition.x - previousPosition.x;
    var deltaY = currentPosition.y - previousPosition.y;
    gltfModel.object3D.rotation.y -= deltaX * 0.01; // Adjust the rotation speed here
    gltfModel.object3D.rotation.x -= deltaY * 0.01; // Adjust the rotation speed here
    gltfModel.object3D.rotation.x = Math.max(-Math.PI / 2, Math.min(Math.PI / 2, gltfModel.object3D.rotation.x)); // Clamp the rotation around the X axis to avoid flipping the model
    if (gltfModel.getAttribute('animation__rotate').enabled) {
      gltfModel.setAttribute('animation__rotate', 'enabled', 'false'); // Disable the original rotation animation
    }
  } else {
    if (!gltfModel.getAttribute('animation__rotate').enabled) {
      gltfModel.setAttribute('animation__rotate', 'enabled', 'true'); // Enable the original rotation animation
    }
  }
}
  </script>
</a-scene>




    <?php }
      
      ?>
<?php } }?>

</body>
</html>