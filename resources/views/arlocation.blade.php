<?php
use App\Http\Controllers\projectcontroller;
use App\Models\project;
use App\Models\location;
use App\Models\objectt;
?>
<html>

<head>
<title>AR.js A-Frame Location-based</title>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/aframe/1.4.2/aframe.min.js"></script>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/ar.js/2.2.2/aframe-ar.min.js'></script> -->
<!-- <script type='text/javascript' src='https://raw.githack.com/AR-js-org/AR.js/master/three.js/build/ar-threex-location-only.js'></script> -->
<!-- <script src="https://aframe.io/releases/1.0.4/aframe.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aframe/1.4.2/aframe.min.js"></script>
<script type='text/javascript'src='https://raw.githack.com/AR-js-org/AR.js/master/three.js/build/ar-threex-location-only.js'></script>
<script type='text/javascript' src='https://raw.githack.com/AR-js-org/AR.js/master/aframe/build/aframe-ar.js'></script>
<!-- <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/ar.js/2.2.2/aframe-ar.min.js'></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>

<script src="https://cdn.jsdelivr.net/gh/donmccurdy/aframe-extras@v6.1.1/dist/aframe-extras.misc.min.js"></script>
<script src="https://unpkg.com/super-hands@^3.0.3/dist/super-hands.min.js"></script>
<script type="module">
import aframeExtrasAnimationMixer from 'https://cdn.jsdelivr.net/npm/aframe-extras.animation-mixer@6.1.1/+esm'
</script>

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
        gps-entity-place="latitude: {{ $location->latitude }}; longitude: {{ $location->longitude }};" >
            <a-text value="{{$object->textobject}}" position="0 1 0" color="red" transparent="true"></a-text>
        </a-entity>
    </a-entity>
    </a-scene>
   

    <?php }
      
      ?>
    <?php } }?>

</body>

</html>