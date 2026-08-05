<section id="home" class="svgimage-hero section-animate" aria-label="Apresentação da Dash Brasil">
    <canvas class="svgimage-canvas" aria-hidden="true"></canvas>

    <div class="svgimage-copy">
        <p class="svgimage-eyebrow">Dash Brasil</p>
        <h1>Soluções digitais para o seu negócio<span class="orange-dot">.</span></h1>
        <p>
            Estratégia, tecnologia e experiência para criar produtos digitais que funcionam no dia a dia
            e crescem junto com o seu negócio.
        </p>
    </div>

    <p class="svgimage-hint" aria-hidden="true">Arraste para girar · role para animar</p>
</section>

<style>
    .svgimage-hero {
        position: relative;
        isolation: isolate;
        width: min(1200px, 100%);
        min-height: calc(100vh - 110px);
        margin: 0 auto;
        overflow: hidden;
        color: #fff;
    }

    .svgimage-canvas {
        position: absolute;
        inset: 0;
        z-index: 0;
        display: block;
        width: 100%;
        height: 100%;
        cursor: grab;
        pointer-events: auto;
        touch-action: pan-y;
        user-select: none;
    }

    .svgimage-canvas.is-dragging {
        cursor: grabbing;
    }

    .svgimage-copy {
        position: relative;
        z-index: 1;
        width: min(520px, calc(100% - 48px));
        margin: clamp(48px, 10vh, 110px) 24px 48px;
        padding: 30px;
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 24px;
        background: rgba(3, 11, 29, 0.35);
        box-shadow: 0 30px 80px rgba(0, 0, 0, 0.35);
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
    }

    .svgimage-eyebrow {
        margin: 0 0 14px;
        color: rgba(255, 255, 255, 0.68);
        font-size: 0.78rem;
        font-weight: 800;
        letter-spacing: 0.12em;
        text-transform: uppercase;
    }

    .svgimage-copy h1 {
        margin: 0 0 20px;
        color: #fff;
        font-size: clamp(2.4rem, 5vw, 4.8rem);
        line-height: 0.98;
    }

    .svgimage-copy > p:last-child {
        margin: 0;
        color: rgba(255, 255, 255, 0.72);
        font-size: clamp(1rem, 1.6vw, 1.2rem);
        line-height: 1.65;
    }

    .svgimage-hint {
        position: absolute;
        right: 24px;
        bottom: 20px;
        z-index: 1;
        margin: 0;
        color: rgba(255, 255, 255, 0.55);
        font-size: 0.78rem;
        letter-spacing: 0.03em;
        pointer-events: none;
        user-select: none;
    }

    @media (max-width: 768px) {
        .svgimage-hero {
            min-height: calc(100vh - 150px);
        }

        .svgimage-copy {
            width: calc(100% - 32px);
            margin: 32px 16px;
            padding: 22px;
        }

        .svgimage-copy h1 {
            font-size: clamp(2.2rem, 12vw, 3.5rem);
        }

        .svgimage-hint {
            right: 16px;
            bottom: 14px;
            font-size: 0.7rem;
        }
    }
</style>

<script type="module">
    import * as THREE from "https://cdn.jsdelivr.net/npm/three@0.179.1/build/three.module.js";

    const hero = document.querySelector('.svgimage-hero');
    const canvas = hero?.querySelector('.svgimage-canvas');

    if (hero && canvas) {
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(38, 1, 0.1, 100);
        camera.position.set(0, 0.15, 13);

        const renderer = new THREE.WebGLRenderer({ canvas, antialias: true, alpha: true });
        renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
        renderer.outputColorSpace = THREE.SRGBColorSpace;
        renderer.toneMapping = THREE.ACESFilmicToneMapping;
        renderer.toneMappingExposure = 1.3;
        renderer.shadowMap.enabled = true;
        renderer.shadowMap.type = THREE.PCFSoftShadowMap;

        scene.add(new THREE.HemisphereLight(0xcbdcff, 0x02040a, 2.2));

        const keyLight = new THREE.DirectionalLight(0xffffff, 5.5);
        keyLight.position.set(5, 7, 10);
        keyLight.castShadow = true;
        scene.add(keyLight);

        const blueLight = new THREE.PointLight(0x096fff, 35, 24, 2);
        blueLight.position.set(-5, 1.5, 6);
        scene.add(blueLight);

        const rimLight = new THREE.PointLight(0xffffff, 22, 20, 2);
        rimLight.position.set(5, -2, 5);
        scene.add(rimLight);

        const whiteMaterial = new THREE.MeshPhysicalMaterial({
            color: 0xf8f9ff,
            metalness: 0.32,
            roughness: 0.19,
            clearcoat: 1,
            clearcoatRoughness: 0.08,
            reflectivity: 1,
        });

        const blueMaterial = new THREE.MeshPhysicalMaterial({
            color: 0x0868ff,
            metalness: 0.42,
            roughness: 0.16,
            clearcoat: 1,
            clearcoatRoughness: 0.06,
            reflectivity: 1,
        });

        const extrusion = {
            depth: 0.62,
            bevelEnabled: true,
            bevelThickness: 0.10,
            bevelSize: 0.09,
            bevelOffset: 0,
            bevelSegments: 8,
            curveSegments: 48,
        };

        const logo = new THREE.Group();
        scene.add(logo);

        const whiteShape = new THREE.Shape();
        whiteShape.moveTo(-1.72, 2.52);
        whiteShape.lineTo(0.92, 2.52);
        whiteShape.bezierCurveTo(2.76, 2.52, 4.10, 1.10, 4.10, -0.72);
        whiteShape.bezierCurveTo(4.10, -2.55, 2.68, -4.00, 0.88, -4.00);
        whiteShape.lineTo(0.18, -4.00);
        whiteShape.lineTo(0.77, -2.75);
        whiteShape.bezierCurveTo(1.94, -2.75, 2.83, -1.87, 2.83, -0.72);
        whiteShape.bezierCurveTo(2.83, 0.43, 1.93, 1.27, 0.78, 1.27);
        whiteShape.lineTo(-0.98, 1.27);
        whiteShape.closePath();

        const whiteGeometry = new THREE.ExtrudeGeometry(whiteShape, extrusion);
        whiteGeometry.computeVertexNormals();
        const whiteMesh = new THREE.Mesh(whiteGeometry, whiteMaterial);
        whiteMesh.castShadow = true;
        whiteMesh.receiveShadow = true;
        whiteMesh.position.z = -0.05;
        logo.add(whiteMesh);

        const blueShape = new THREE.Shape();
        blueShape.moveTo(-3.58, 0.05);
        blueShape.lineTo(0.70, 0.05);
        blueShape.bezierCurveTo(1.10, 0.05, 1.42, -0.28, 1.42, -0.68);
        blueShape.bezierCurveTo(1.42, -0.82, 1.38, -0.96, 1.32, -1.10);
        blueShape.lineTo(0.12, -4.00);
        blueShape.lineTo(-1.35, -4.00);
        blueShape.lineTo(-0.12, -1.20);
        blueShape.lineTo(-4.15, -1.20);
        blueShape.closePath();

        const blueGeometry = new THREE.ExtrudeGeometry(blueShape, { ...extrusion, depth: 0.72 });
        blueGeometry.computeVertexNormals();
        const blueMesh = new THREE.Mesh(blueGeometry, blueMaterial);
        blueMesh.castShadow = true;
        blueMesh.receiveShadow = true;
        blueMesh.position.z = 0.08;
        logo.add(blueMesh);

        const box = new THREE.Box3().setFromObject(logo);
        const center = box.getCenter(new THREE.Vector3());
        logo.position.sub(center);
        logo.scale.setScalar(0.92);
        logo.rotation.x = THREE.MathUtils.degToRad(-6);

        const initialPosition = logo.position.clone();
        const target = {
            rotationX: THREE.MathUtils.degToRad(-6),
            rotationY: 0,
            rotationZ: 0,
            positionX: initialPosition.x,
            positionY: initialPosition.y,
            scale: 0.92,
            cameraZ: 13,
        };

        const interaction = {
            dragging: false,
            pointerId: null,
            lastX: 0,
            lastY: 0,
            rotationX: 0,
            rotationY: 0,
        };

        const clamp = (value, minimum, maximum) => Math.min(Math.max(value, minimum), maximum);
        const lerp = (start, end, progress) => start + ((end - start) * progress);
        const smoothstep = (minimum, maximum, value) => {
            const progress = clamp((value - minimum) / (maximum - minimum), 0, 1);
            return progress * progress * (3 - (2 * progress));
        };

        const poses = [
            { x: -6, y: 0, z: 0, px: 1.8, py: 0, scale: 0.92, camera: 13 },
            { x: 0, y: 58, z: -2, px: 2.1, py: 0, scale: 0.98, camera: 12.4 },
            { x: 0, y: -58, z: 2, px: 1.5, py: 0, scale: 0.98, camera: 12.4 },
            { x: 70, y: 5, z: 0, px: 1.8, py: -0.45, scale: 1.02, camera: 11.8 },
        ];

        const updateScrollAnimation = () => {
            const rect = hero.getBoundingClientRect();
            const travel = Math.max(hero.offsetHeight, 1);
            const progress = clamp(-rect.top / travel, 0, 1);
            const scaledProgress = progress * (poses.length - 1);
            const currentIndex = Math.min(Math.floor(scaledProgress), poses.length - 2);
            const localProgress = smoothstep(0, 1, scaledProgress - currentIndex);
            const currentPose = poses[currentIndex];
            const nextPose = poses[currentIndex + 1];

            target.rotationX = THREE.MathUtils.degToRad(lerp(currentPose.x, nextPose.x, localProgress));
            target.rotationY = THREE.MathUtils.degToRad(lerp(currentPose.y, nextPose.y, localProgress));
            target.rotationZ = THREE.MathUtils.degToRad(lerp(currentPose.z, nextPose.z, localProgress));
            target.positionX = initialPosition.x + lerp(currentPose.px, nextPose.px, localProgress);
            target.positionY = initialPosition.y + lerp(currentPose.py, nextPose.py, localProgress);
            target.scale = lerp(currentPose.scale, nextPose.scale, localProgress);
            target.cameraZ = lerp(currentPose.camera, nextPose.camera, localProgress);
        };

        const resize = () => {
            const width = hero.clientWidth;
            const height = hero.clientHeight;
            renderer.setSize(width, height, false);
            camera.aspect = width / height;
            camera.updateProjectionMatrix();
            updateScrollAnimation();
        };

        const finishDragging = (event) => {
            if (!interaction.dragging || event.pointerId !== interaction.pointerId) {
                return;
            }

            interaction.dragging = false;
            interaction.pointerId = null;
            canvas.classList.remove('is-dragging');

            if (canvas.hasPointerCapture(event.pointerId)) {
                canvas.releasePointerCapture(event.pointerId);
            }
        };

        canvas.addEventListener('pointerdown', (event) => {
            if (event.pointerType === 'mouse' && event.button !== 0) {
                return;
            }

            interaction.dragging = true;
            interaction.pointerId = event.pointerId;
            interaction.lastX = event.clientX;
            interaction.lastY = event.clientY;
            canvas.classList.add('is-dragging');
            canvas.setPointerCapture(event.pointerId);
        });

        canvas.addEventListener('pointermove', (event) => {
            if (!interaction.dragging || event.pointerId !== interaction.pointerId) {
                return;
            }

            const movementX = event.clientX - interaction.lastX;
            const movementY = event.clientY - interaction.lastY;
            interaction.lastX = event.clientX;
            interaction.lastY = event.clientY;

            interaction.rotationY += movementX * 0.012;
            interaction.rotationX = clamp(
                interaction.rotationX + (movementY * 0.012),
                THREE.MathUtils.degToRad(-75),
                THREE.MathUtils.degToRad(75),
            );
        });

        canvas.addEventListener('pointerup', finishDragging);
        canvas.addEventListener('pointercancel', finishDragging);

        const animate = () => {
            requestAnimationFrame(animate);
            const smoothness = 0.075;

            const rotationX = target.rotationX + interaction.rotationX;
            const rotationY = target.rotationY + interaction.rotationY;

            logo.rotation.x += (rotationX - logo.rotation.x) * smoothness;
            logo.rotation.y += (rotationY - logo.rotation.y) * smoothness;
            logo.rotation.z += (target.rotationZ - logo.rotation.z) * smoothness;
            logo.position.x += (target.positionX - logo.position.x) * smoothness;
            logo.position.y += (target.positionY - logo.position.y) * smoothness;
            logo.scale.setScalar(logo.scale.x + ((target.scale - logo.scale.x) * smoothness));
            camera.position.z += (target.cameraZ - camera.position.z) * smoothness;

            renderer.render(scene, camera);
        };

        window.addEventListener('scroll', updateScrollAnimation, { passive: true });
        window.addEventListener('resize', resize);
        resize();
        animate();
    }
</script>
