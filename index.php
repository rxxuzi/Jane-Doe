<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/container.css">
    <link rel="stylesheet" href="css/clock.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/coin.css">
    <title>JANE DOE</title>
</head>
<body>

<div class="container">
    <div class="time-container"></div>
    <div class="real-time"></div>
</div>

<div class="ticker">
    <ul class="coin-container"></ul>
</div>

<div class="news-container"></div>

<script src="js/main.js"></script>
<script src="js/realTime.js"></script>
<script src="js/coin.js"></script>


<script src="https://aframe.io/releases/1.3.0/aframe.min.js"></script>
<script>

    // Components here...

    AFRAME.registerComponent( 'max-anisotropy', {
        dependencies: [ 'material', 'geometry' ],
        init: function() {

            var el = this.el;
            var material = el.getObject3D( 'mesh' ).material;

            if( material.map ) material.map.anisotropy = el.sceneEl.renderer.capabilities.getMaxAnisotropy();
            if( material.map ) material.map.needsUpdate = true;

        }
    } );

    AFRAME.registerComponent( 'canvas-updater', {
        dependencies: [ 'material', 'geometry' ],
        tick: function() {

            var el = this.el;
            var material = el.getObject3D( 'mesh' ).material;

            if( material.displacementMap ) material.displacementMap.needsUpdate = true;
            if( material.map ) material.map.needsUpdate = true;

        }
    } );

</script>

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

<script>

    // Scripting here...

    const CameraRig = document.getElementById( 'CameraRig' );
    const CameraRigView = document.getElementById( 'CameraRigView' );
    const ARight = document.getElementById( 'ARight' );
    const ARight_BRight = document.getElementById( 'ARight_BRight' );
    const ARight_BLeft = document.getElementById( 'ARight_BLeft' );
    const ALeft = document.getElementById( 'ALeft' );
    const ALeft_BRight = document.getElementById( 'ALeft_BRight' );
    const ALeft_BLeft = document.getElementById( 'ALeft_BLeft' );
    const CameraRigAnimations = {
        l: 'property: rotation; from: 0 0 0; to: 0 90 0; loop: 0; easing: linear; dur: 5000; startEvents: play;',
        r: 'property: rotation; from: 0 0 0; to: 0 -90 0; loop: 0; easing: linear; dur: 5000; startEvents: play;'
    };

    var TorusVisibility = [ false, false, false, false, false, false ];
    var ThisAnimation, NextAnimation;

    function Init() {

        console.log( 'Init()' );

        Init_TorusSrc( 4 );

        ( Math.random() < 0.5 ? Pick_ALeft : Pick_ARight )();
        ResetCamera();

    }

    function ResetCamera() {

        console.log( 'ResetCamera()' );

        ( NextAnimation == 'r' ? Pick_ARight : Pick_ALeft )();

        ARight.setAttribute( 'visible', TorusVisibility[ 0 ] );
        ARight_BRight.setAttribute( 'visible', TorusVisibility[ 1 ] );
        ARight_BLeft.setAttribute( 'visible', TorusVisibility[ 2 ] );
        ALeft.setAttribute( 'visible', TorusVisibility[ 3 ] );
        ALeft_BRight.setAttribute( 'visible', TorusVisibility[ 4 ] );
        ALeft_BLeft.setAttribute( 'visible', TorusVisibility[ 5 ] );

        CameraRig.setAttribute( 'rotation', '0 0 0' );
        CameraRig.setAttribute( 'position', ThisAnimation == 'r' ? '10 0 0' : '-10 0 0' );
        CameraRig.setAttribute( 'animation', CameraRigAnimations[ ThisAnimation ] );

        CameraRigView.setAttribute( 'rotation', '0 0 0' );
        CameraRigView.setAttribute( 'position', ThisAnimation == 'r' ? '-10 0 0' : '10 0 0' );

        CameraRig.emit( 'play', 'null', false );

    }

    function Pick_ARight() {

        console.log( 'Pick_ARight()' );

        ThisAnimation = 'r';
        if( Math.random() < 0.5 ) {
            NextAnimation = 'r';
            TorusVisibility = [ true, true, false, false, false, false ];
        } else {
            NextAnimation = 'l';
            TorusVisibility = [ true, false, true, false, false, false ];
        }

    }

    function Pick_ALeft() {

        console.log( 'Pick_ALeft()' );

        ThisAnimation = 'l';
        if( Math.random() < 0.5 ) {
            NextAnimation = 'r';
            TorusVisibility = [ false, false, false, true, true, false ];
        } else {
            NextAnimation = 'l';
            TorusVisibility = [ false, false, false, true, false, true ];
        }

    }

    CameraRig.addEventListener( 'animationcomplete', ResetCamera );

    function PickBetween( min, max ) {

        var min = Math.ceil( min );
        var max = Math.floor( max );
        return Math.floor( Math.random() * ( max - min + 1 ) + min );

    }

    function Init_TorusSrc( factor ) {

        if( !parseInt( factor ) ) factor = 1;

        const TorusSrcA = document.getElementById( 'TorusSrcA' );
        TorusSrcA.setAttribute( 'width', 256*factor );
        TorusSrcA.setAttribute( 'height', 256*factor );

        // Empty...

        const TorusCtxA = TorusSrcA.getContext( '2d' );
        TorusCtxA.fillStyle = 'rgb(0,0,0)';
        TorusCtxA.fillRect( 0, 0, 256*factor, 256*factor );

        // Sparks...

        for( let i = 0; i < 10; i ++ ) {

            let _x = PickBetween( 0, 256*factor );
            let _y = PickBetween( 0, 15 );

            let TorusGrdA1 = TorusCtxA.createLinearGradient( _x-(256*factor), 0, _x, 0 );
            TorusGrdA1.addColorStop( 0, 'rgba(255,255,255,0.0)' );
            TorusGrdA1.addColorStop( 1, 'rgba(255,255,255,1.0)' );
            TorusCtxA.fillStyle = TorusGrdA1;
            TorusCtxA.fillRect( _x-(256*factor), (_y*(16*factor))+(4*factor), 256*factor, 8*factor );

            let TorusGrdA2 = TorusCtxA.createLinearGradient( _x, 0, _x+(256*factor), 0 );
            TorusGrdA2.addColorStop( 0, 'rgba(255,255,255,0.0)' );
            TorusGrdA2.addColorStop( 1, 'rgba(255,255,255,1.0)' );
            TorusCtxA.fillStyle = TorusGrdA2;
            TorusCtxA.fillRect( _x, (_y*(16*factor))+(4*factor), 256*factor, 8*factor );

        }

        // Copy and flip to B...

        const TorusSrcB = document.getElementById( 'TorusSrcB' );
        TorusSrcB.setAttribute( 'width', 256*factor );
        TorusSrcB.setAttribute( 'height', 256*factor );

        const TorusCtxB = TorusSrcB.getContext( '2d' );
        TorusCtxB.scale( -1, -1 );
        TorusCtxB.drawImage( TorusSrcA, TorusSrcB.width * -1, TorusSrcB.height * -1 );

    }

    Init();

</script>
</body>
</html>
