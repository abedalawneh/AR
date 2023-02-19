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
        <a-camera gps-new-camera='gpsMinDistance: 5' ></a-camera>
        <a-entity  position="0 0 0" scale="10 10 10" gltf-model="{{ asset($name.'/'.$object->object) }}"
        gps-new-entity-place="latitude:{{$location->latitude}}; longitude:{{ $location->longitude}}"
        drag-rotate ></a-entity>
        
      </a-scene>
      
      <!-- animation__rotate="property: rotation; to: 0 360 0; loop: true; dur: 10000" -->
      <script>
        AFRAME.registerComponent('drag-rotate', {
      init: function () {
        this.el.addEventListener('touchstart', this.onTouchStart.bind(this));
      },

      onTouchStart: function (event) {
        event.preventDefault();
        this.el.sceneEl.canvas.addEventListener('touchmove', this.onTouchMove.bind(this), { passive: false });
        this.el.sceneEl.canvas.addEventListener('touchend', this.onTouchEnd.bind(this));
        this.previousTouchEvent = event.touches[0];
      },

      onTouchMove: function (event) {
        event.preventDefault();
        var dx = event.touches[0].clientX - this.previousTouchEvent.clientX;
        var dy = event.touches[0].clientY - this.previousTouchEvent.clientY;

        var rotation = this.el.getAttribute('rotation');
        this.el.setAttribute('rotation', {
          x: rotation.x - dy / 5,
          y: rotation.y - dx / 5,
          z: 0
        });

        this.previousTouchEvent = event.touches[0];
      },

      onTouchEnd: function () {
        this.el.sceneEl.canvas.removeEventListener('touchmove', this.onTouchMove.bind(this), { passive: false });
        this.el.sceneEl.canvas.removeEventListener('touchend', this.onTouchEnd.bind(this));
      }
    });

      </script>
   
    <?php }
      
      ?>
<?php } }?>

</body>
</html>