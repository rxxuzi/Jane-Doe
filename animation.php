<?php

function isDisplayAnimation($b){
    if($b){
        echo '
        <script src="https://aframe.io/releases/1.3.0/aframe.min.js"></script>
        <script src="js/animation/background.js"></script>
        
        <a-scene antialias="true" fog="type: linear; color: #F02050; far: 20;" animation="property: fog.color; from: #F02050; to: #5020F0; loop: true; easing: easeInOutSine; dur: 5000; dir: alternate;" vr-mode-ui="enabled: false;">
        
            <a-assets>
                <canvas id="TorusSrcA" width="256" height="256" crossorigin="anonymous"></canvas>
                <canvas id="TorusSrcB" width="256" height="256" crossorigin="anonymous"></canvas>
            </a-assets>
        
            <a-entity id="CameraRig">
                <a-entity id="CameraRigView">
                    <a-camera position="0 0 0" rotation="0 0 0" look-controls-enabled="false" wasd-controls-enabled="false"
                              animation="property: rotation; from: 0 0 -90; to: 0 0 90; loop: true; easing: easeInOutSine; dur: 30000; dir: alternate;"
                    ></a-camera>
                </a-entity>
            </a-entity>
        
            <a-entity id="ARight" position="10 0 0" rotation="-90 0 90">
                <a-torus
                        arc="90" radius="10" segments-radial="16" radius-tubular="1" segments-tubular="16" wireframe="true" color="#5020F0"
                        material="shader: flat; side: back;"
                        animation="property: radius-tubular; from: 1; to: 0.5; easing: linear; dir: alternate; dur: 15000; loop: true;"
                        animation__2="property: color; from: #5020F0; to: #F02050; loop: true; easing: easeInOutSine; dur: 5000; dir: alternate;"
                ></a-torus>
                <a-torus
                        arc="90" radius="10" segments-radial="16" radius-tubular="1.01" segments-tubular="16" color="#F02050"
                        material="src: #TorusSrcA; shader: flat; repeat: 1.0009765625 1.0009765625; offset: 0 0; side: back;"
                        animation="property: radius-tubular; from: 1.01; to: 0.51; easing: linear; dir: alternate; dur: 15000; loop: true;"
                        animation__2="property: color; from: #F02050; to: #5020F0; loop: true; easing: easeInOutSine; dur: 5000; dir: alternate;"
                        animation__3="property: material.offset; from: 1 0; to: 0 0; easing: linear; dur: 5000; loop: true;"
                        canvas-updater max-anisotropy
                ></a-torus>
            </a-entity>
            <a-entity id="ARight_BRight" position="10 0 0" rotation="-90 0 0" visible="true">
                <a-torus
                        arc="90" radius="10" segments-radial="16" radius-tubular="1" segments-tubular="16" wireframe="true" color="#5020F0"
                        material="shader: flat; side: back;"
                        animation="property: radius-tubular; from: 1; to: 0.5; easing: linear; dir: alternate; dur: 15000; loop: true;"
                        animation__2="property: color; from: #5020F0; to: #F02050; loop: true; easing: easeInOutSine; dur: 5000; dir: alternate;"
                ></a-torus>
                <a-torus
                        arc="90" radius="10" segments-radial="16" radius-tubular="1.01" segments-tubular="16" color="#F02050"
                        material="src: #TorusSrcA; shader: flat; repeat: 1.0009765625 1.0009765625; offset: 0 0; side: back;"
                        animation="property: radius-tubular; from: 1.01; to: 0.51; easing: linear; dir: alternate; dur: 15000; loop: true;"
                        animation__2="property: color; from: #F02050; to: #5020F0; loop: true; easing: easeInOutSine; dur: 5000; dir: alternate;"
                        animation__3="property: material.offset; from: 1 0; to: 0 0; easing: linear; dur: 5000; loop: true;"
                        canvas-updater max-anisotropy
                ></a-torus>
            </a-entity>
            <a-entity id="ARight_BLeft" position="10 0 -20" rotation="-90 0 -90" visible="true">
                <a-torus
                        arc="90" radius="10" segments-radial="16" radius-tubular="1" segments-tubular="16" wireframe="true" color="#5020F0"
                        material="shader: flat; side: back;"
                        animation="property: radius-tubular; from: 1; to: 0.5; easing: linear; dir: alternate; dur: 15000; loop: true;"
                        animation__2="property: color; from: #5020F0; to: #F02050; loop: true; easing: easeInOutSine; dur: 5000; dir: alternate;"
                ></a-torus>
                <a-torus
                        arc="90" radius="10" segments-radial="16" radius-tubular="1.01" segments-tubular="16" color="#F02050"
                        material="src: #TorusSrcB; shader: flat; repeat: 1.0009765625 1.0009765625; offset: 0 0.5; side: back;"
                        animation="property: radius-tubular; from: 1.01; to: 0.51; easing: linear; dir: alternate; dur: 15000; loop: true;"
                        animation__2="property: color; from: #F02050; to: #5020F0; loop: true; easing: easeInOutSine; dur: 5000; dir: alternate;"
                        animation__3="property: material.offset; from: 0 0.5; to: 1 0.5; easing: linear; dur: 5000; loop: true;"
                        canvas-updater max-anisotropy
                ></a-torus>
            </a-entity>
        
            <a-entity id="ALeft" position="-10 0 0" rotation="-90 0 0" visible="true">
                <a-torus
                        arc="90" radius="10" segments-radial="16" radius-tubular="1" segments-tubular="16" wireframe="true" color="#5020F0"
                        material="shader: flat; side: back;"
                        animation="property: radius-tubular; from: 1; to: 0.5; easing: linear; dir: alternate; dur: 15000; loop: true;"
                        animation__2="property: color; from: #5020F0; to: #F02050; loop: true; easing: easeInOutSine; dur: 5000; dir: alternate;"
                ></a-torus>
                <a-torus
                        arc="90" radius="10" segments-radial="16" radius-tubular="1.01" segments-tubular="16" color="#F02050"
                        material="src: #TorusSrcB; shader: flat; repeat: 1.0009765625 1.0009765625; offset: 0 0.5; side: back;"
                        animation="property: radius-tubular; from: 1.01; to: 0.51; easing: linear; dir: alternate; dur: 15000; loop: true;"
                        animation__2="property: color; from: #F02050; to: #5020F0; loop: true; easing: easeInOutSine; dur: 5000; dir: alternate;"
                        animation__3="property: material.offset; from: 0 0.5; to: 1 0.5; easing: linear; dur: 5000; loop: true;"
                        canvas-updater max-anisotropy
                ></a-torus>
            </a-entity>
            <a-entity id="ALeft_BRight" position="-10 0 -20" rotation="-90 0 180">
                <a-torus
                        arc="90" radius="10" segments-radial="16" radius-tubular="1" segments-tubular="16" wireframe="true" color="#5020F0"
                        material="shader: flat; side: back;"
                        animation="property: radius-tubular; from: 1; to: 0.5; easing: linear; dir: alternate; dur: 15000; loop: true;"
                        animation__2="property: color; from: #5020F0; to: #F02050; loop: true; easing: easeInOutSine; dur: 5000; dir: alternate;"
                ></a-torus>
                <a-torus
                        arc="90" radius="10" segments-radial="16" radius-tubular="1.01" segments-tubular="16" color="#F02050"
                        material="src: #TorusSrcA; shader: flat; repeat: 1.0009765625 1.0009765625; offset: 0 0; side: back;"
                        animation="property: radius-tubular; from: 1.01; to: 0.51; easing: linear; dir: alternate; dur: 15000; loop: true;"
                        animation__2="property: color; from: #F02050; to: #5020F0; loop: true; easing: easeInOutSine; dur: 5000; dir: alternate;"
                        animation__3="property: material.offset; from: 1 0; to: 0 0; easing: linear; dur: 5000; loop: true;"
                        canvas-updater max-anisotropy
                ></a-torus>
            </a-entity>
            <a-entity id="ALeft_BLeft" position="-10 0 0" rotation="-90 0 90" visible="true">
                <a-torus
                        arc="90" radius="10" segments-radial="16" radius-tubular="1" segments-tubular="16" wireframe="true" color="#5020F0"
                        material="shader: flat; side: back;"
                        animation="property: radius-tubular; from: 1; to: 0.5; easing: linear; dir: alternate; dur: 15000; loop: true;"
                        animation__2="property: color; from: #5020F0; to: #F02050; loop: true; easing: easeInOutSine; dur: 5000; dir: alternate;"
                ></a-torus>
                <a-torus
                        arc="90" radius="10" segments-radial="16" radius-tubular="1.01" segments-tubular="16" color="#F02050"
                        material="src: #TorusSrcB; shader: flat; repeat: 1.0009765625 1.0009765625; offset: 0 0.5; side: back;"
                        animation="property: radius-tubular; from: 1.01; to: 0.51; easing: linear; dir: alternate; dur: 15000; loop: true;"
                        animation__2="property: color; from: #F02050; to: #5020F0; loop: true; easing: easeInOutSine; dur: 5000; dir: alternate;"
                        animation__3="property: material.offset; from: 0 0.5; to: 1 0.5; easing: linear; dur: 5000; loop: true;"
                        canvas-updater max-anisotropy
                ></a-torus>
            </a-entity>
        
            <a-sky color="#000000"></a-sky>
        
        </a-scene>
        
        <script src="js/animation/script.js"></script>
        ';
    }
}
