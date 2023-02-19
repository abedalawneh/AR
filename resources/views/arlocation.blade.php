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
     
      <a-scene vr-mode-ui='enabled: false' arjs='sourceType: webcam; videoTexture: true; debugUIEnabled: false' renderer='antialias: true; alpha: true'>
        <a-camera gps-new-camera='gpsMinDistance: 5' cursor></a-camera>
        <a-entity  position="0 0 0" scale="10 10 10" gltf-model="{{ asset($name.'/'.$object->object) }}"
        gps-new-entity-place="latitude:{{$location->latitude}}; longitude:{{ $location->longitude}}"
        animation__rotate="property: rotation; to: 0 360 0; loop: true; dur: 10000"
        super-hands ></a-entity>
        
        </a-scene>
<!-- 
        <a-scene vr-mode-ui='enabled: false' arjs='sourceType: webcam; videoTexture: true; debugUIEnabled: false' renderer='antialias: true; alpha: true'
        touchstart="startDraggingGltf" 
    touchend="stopDraggingGltf" 
    touchmove="dragGltf">
  <a-assets>
    <a-asset-item id="{{ $object->object }}" src="{{ asset($name.'/'.$object->object) }}"></a-asset-item>
  </a-assets>
  
  <a-camera gps-new-camera='gpsMinDistance: 5' raycaster></a-camera>
  
 <a-entity id="my-gltf" position="0 0 0" scale="10 10 10" gltf-model="{{ asset($name.'/'.$object->object) }}"
    gps-new-entity-place="latitude:{{$location->latitude}}; longitude:{{ $location->longitude}}"
    animation__rotate="property: rotation; to: 0 360 0; loop: true; dur: 10000"
    super-hands 
    my-gltf-handler></a-entity>


</a-scene>

    <script>
      AFRAME.registerComponent('my-gltf-handler', {
  init: function () {
    // Initialize variables to store starting position and dragging status
    this.startPosition = new THREE.Vector3();
    this.isDragging = false;
    
    // Add event listeners to the glTF entity
    this.el.addEventListener('touchstart', this.startDragging.bind(this));
    this.el.addEventListener('touchend', this.stopDragging.bind(this));
    this.el.addEventListener('touchmove', this.drag.bind(this));
  },
  
  startDragging: function (event) {
    console.log("startDragging called");
    // Set the starting position and dragging status
    this.startPosition.copy(this.el.object3D.position);
    this.isDragging = true;
    
    // Prevent default touch behavior
    event.preventDefault();
  },
  
  stopDragging: function (event) {
    // Set the dragging status
    this.isDragging = false;
    
    // Prevent default touch behavior
    event.preventDefault();
  },
  
  drag: function (event) {
    // Move the glTF entity based on the user's touch position
    if (this.isDragging) {
      var touch = event.touches[0];
      var dx = touch.clientX / window.innerWidth * 2 - 1;
      var dy = touch.clientY / window.innerHeight * 2 - 1;
      var newPosition = this.startPosition.clone();
      newPosition.x += dx * 5;
      newPosition.y += dy * 5;
      this.el.setAttribute('position', newPosition);
    }
    
    // Prevent default touch behavior
    event.preventDefault();
  }
});

    </script>   -->
   
<?php }} }?>

</body>
</html>