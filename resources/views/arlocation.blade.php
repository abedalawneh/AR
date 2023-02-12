<?php
use App\Http\Controllers\projectcontroller;
use App\Models\project;
use App\Models\location;
use App\Models\objectt;

?>
<!DOCTYPE html>
<html>
<head>
<title>AR.js A-Frame Location-based</title>
<script src="https://aframe.io/releases/1.0.4/aframe.min.js"></script>
<script type='text/javascript' src='https://raw.githack.com/AR-js-org/AR.js/master/three.js/build/ar-threex-location-only.js'></script>
<script type='text/javascript' src='https://raw.githack.com/AR-js-org/AR.js/master/aframe/build/aframe-ar.js'></script>
  <!-- we import arjs version without NFT but with marker + location based support -->
  
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
     ?>
     
     <a-scene vr-mode-ui='enabled: false' arjs='sourceType: webcam; videoTexture: true; debugUIEnabled: false' renderer='antialias: true; alpha: true'>
       <a-camera gps-new-camera='gpsMinDistance: 5'></a-camera>
       <a-assets><a-asset-item src="object/{{$object->object}}"></a-asset-item></a-assets>
       <a-entity material='color: red' geometry='primitive: box' gps-new-entity-place="latitude: 32.085787 ; longitude: 36.0933741" scale="10 10 10"></a-entity>
      </a-scene>
      <!-- <h1>{{$location->latitude}}</h1>
     <h1>{{$location->longitude}}</h1> -->
      <?php }
      
      ?>
<!-- <a-scene embedded arjs>
      <a-marker preset="hiro"> -->
        <!-- we use cors proxy to avoid cross-origin problems -->
        <!--
          ⚠️⚠️⚠️
          https://arjs-cors-proxy.herokuapp.com/ is now offline, Heroku has dismissed all his free plans from November 2022.
          You need to host your own proxy and use it instead. The proxy is based on CORS Anywhere (see https://github.com/Rob--W/cors-anywhere).
          ⚠️⚠️⚠️
        -->
        <!-- <a-entity
          position="0 0 0"
          scale="0.05 0.05 0.05"
          gltf-model="object/{{$object->object}}"
        ></a-entity>
      </a-marker>
      <a-entity camera></a-entity>
    </a-scene> -->
<?php } }?>

</body>
</html>