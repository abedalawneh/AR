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
        <a-camera gps-new-camera='gpsMinDistance: 5' cursor look-controls
          look-at="[gps-entity-place]"></a-camera>
        <a-entity  position="0 0 0" scale="10 10 10" gltf-model="{{ asset($name.'/'.$object->object) }}"
        gps-new-entity-place="latitude:{{$location->latitude}}; longitude:{{ $location->longitude}}"
        animation__rotate="property: rotation; to: 0 360 0; loop: true; dur: 20000"
           model-controls
           ></a-entity>
        
          <script>
//       AFRAME.registerComponent('model-controls', {
//   init: function () {
//     var el = this.el;
//     var model = el.getObject3D('mesh');
//     var modelScale = el.getAttribute('scale');
//     var boundingBox = new THREE.Box3().setFromObject(model);
//     var modelSize = boundingBox.getSize(new THREE.Vector3());
//     var maxModelSize = Math.max(modelSize.x, modelSize.y, modelSize.z);
//     var scaleFactor = 2.0 / maxModelSize;
//     el.setAttribute('scale', `${scaleFactor} ${scaleFactor} ${scaleFactor}`);
//     var newPosition = el.getComputedAttribute('position');
//     newPosition.y += modelSize.y / 2 * scaleFactor;
//     el.setAttribute('position', newPosition);
//   }
// });

</script>
        <!-- animation__rotate="property: rotation; to: 0 360 0; loop: true; dur: 10000" -->
    </a-scene>
   
    
     

    <?php }
      
      ?>
      
      

<?php } }?>

</body>
</html>