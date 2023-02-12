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
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
<!-- we import arjs version without NFT but with marker + location based support -->
<script src="https://cdn.jsdelivr.net/npm/ar.js@3.0.0/aframe/build/aframe-ar.min.js"></script>

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
       <a-asset-item id="model" src="object/{{$object->object}}"></a-asset-item>
       <a-entity  gltf-model="#model" gps-new-entity-place="latitude: 32.085787 ; longitude: 36.0933741" scale="10 10 10"></a-entity>
      </a-scene>


      
      <?php }
      
      ?>

<?php } }?>

</body>
</html>