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


    const TorusSrcB = document.getElementById( 'TorusSrcB' );
    TorusSrcB.setAttribute( 'width', 256*factor );
    TorusSrcB.setAttribute( 'height', 256*factor );

    const TorusCtxB = TorusSrcB.getContext( '2d' );
    TorusCtxB.scale( -1, -1 );
    TorusCtxB.drawImage( TorusSrcA, TorusSrcB.width * -1, TorusSrcB.height * -1 );

}

Init();
