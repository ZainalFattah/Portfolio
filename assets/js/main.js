import * as THREE from 'https://cdn.skypack.dev/three@0.132.2';
import { GLTFLoader } from 'https://cdn.skypack.dev/three@0.132.2/examples/jsm/loaders/GLTFLoader.js';
import { OrbitControls } from 'https://cdn.skypack.dev/three@0.132.2/examples/jsm/controls/OrbitControls.js';

// Scene
const scene = new THREE.Scene();

// Canvas
const canvas = document.getElementById('three-canvas');

// Sizes
const sizes = {
    width: canvas.parentElement.clientWidth,
    height: canvas.parentElement.clientHeight
};

// Camera
const camera = new THREE.PerspectiveCamera(45, sizes.width / sizes.height, 0.1, 1000);
camera.position.set(0, 1, 5);
scene.add(camera);

// Renderer
const renderer = new THREE.WebGLRenderer({
    canvas: canvas,
    antialias: true,
    alpha: true // Make canvas transparent
});
renderer.setSize(sizes.width, sizes.height);
renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
renderer.outputEncoding = THREE.sRGBEncoding;

// Controls
const controls = new OrbitControls(camera, renderer.domElement);
controls.enableDamping = true;
controls.autoRotate = true;
controls.autoRotateSpeed = 0.8;
controls.enableZoom = false; // Optional: disable zoom for a cleaner look

// Lighting
const ambientLight = new THREE.AmbientLight(0xffffff, 0.8);
scene.add(ambientLight);

const directionalLight = new THREE.DirectionalLight(0xffffff, 1.5);
directionalLight.position.set(3, 3, 3);
scene.add(directionalLight);

// GLTF Loader
const loader = new GLTFLoader();
loader.load(
    'assets/models/modelku.glb',
    (gltf) => {
        const model = gltf.scene;
        model.scale.set(1.5, 1.5, 1.5); // Adjust scale if needed
        model.position.y = -1; // Adjust position
        scene.add(model);
    },
    undefined,
    (error) => {
        console.error('An error happened while loading the model:', error);
    }
);

// Handle Window Resize
window.addEventListener('resize', () => {
    // Update sizes
    sizes.width = canvas.parentElement.clientWidth;
    sizes.height = canvas.parentElement.clientHeight;

    // Update camera
    camera.aspect = sizes.width / sizes.height;
    camera.updateProjectionMatrix();

    // Update renderer
    renderer.setSize(sizes.width, sizes.height);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
});

// Animation Loop
const animate = () => {
    controls.update(); // Update controls on each frame
    renderer.render(scene, camera);
    requestAnimationFrame(animate);
};

animate();

