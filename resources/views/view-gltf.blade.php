
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
</head>
<body>
    
<!-- <script src="https://cdn.jsdelivr.net/npm/three@0.136.0/build/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.136.0/examples/js/loaders/GLTFLoader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.136.0/examples/js/loaders/DRACOLoader.js"></script> -->

    <script type="module">
 // Instantiate a loader
// const loader = new THREE.GLTFLoader();
// const scene = new THREE.Scene();
// // Optional: Provide a DRACOLoader instance to decode compressed mesh data
// const dracoLoader = new THREE.DRACOLoader();
// dracoLoader.setDecoderPath( '/examples/jsm/libs/draco/' );
// loader.setDRACOLoader( dracoLoader );

// // Load a glTF resource
// loader.load(
// 	// resource URL
// 	'gltf/scene.gltf',
// 	// called when the resource is loaded
// 	function ( gltf ) {

// 		scene.add( gltf.scene );

// 		gltf.animations; // Array<THREE.AnimationClip>
// 		gltf.scene; // THREE.Group
// 		gltf.scenes; // Array<THREE.Group>
// 		gltf.asset; // Object

// 	},
// 	// called while loading is progressing
// 	function ( xhr ) {

// 		console.log( ( xhr.loaded / xhr.total * 100 ) + '% loaded' );

// 	},
// 	// called when loading has errors
// 	function ( error ) {

// 		console.log( 'An error happened' );

// 	}
// );

// const loader =  new THREE.GLTFLoader();
// const scene = new THREE.Scene();

// loader.load( 'gltf/scene.gltf', function ( gltf ) {
// // console.log('fff');	
// 	scene.add( gltf.scene );

// }, undefined, function ( error ) {

// 	console.error( error );

// } );




// // Set up the renderer
// const renderer = new THREE.WebGLRenderer();
// renderer.setSize(window.innerWidth, window.innerHeight);
// document.body.appendChild(renderer.domElement);

// // Create the main scene
// const scene = new THREE.Scene();

// // Create the glTF loader
// const loader = new THREE.GLTFLoader();

// // Load the glTF model
// loader.load('gltf/scene.gltf', function(gltf) {

//   // Create an offscreen render target
//   const target = new THREE.WebGLRenderTarget(window.innerWidth, window.innerHeight);

//   // Create a scene to render the model to the offscreen render target
//   const rtScene = new THREE.Scene();
//   rtScene.add(gltf.scene);

//   // Render the scene to the offscreen render target
//   renderer.setRenderTarget(target);
//   renderer.render(rtScene, new THREE.PerspectiveCamera());
//   renderer.setRenderTarget(null);

//   // Create a plane with the texture from the offscreen render target
//   const plane = new THREE.Mesh(
//     new THREE.PlaneGeometry(window.innerWidth, window.innerHeight),
//     new THREE.MeshBasicMaterial({map: target.texture})
//   );
//   scene.add(plane);

// }, undefined, function(error) {
//   console.error(error);
// });

</script>
<script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
<script nomodule src="https://unpkg.com/@google/model-viewer/dist/model-viewer-legacy.js"></script>
<!-- Use it like any other HTML element -->
<model-viewer id="toggle-poster" src="gltf/scene.gltf" controls
auto-rotate poster="assets/poster2.png"></model-viewer>
<script>
    const posters = ['poster.png', 'poster2.png'];
    let i = 0;
    setInterval(() =>
        document.querySelector('#toggle-poster').setAttribute('poster',
            `assets/${posters[i++ % 2]}`), 2000);
</script>
</body>
</html>