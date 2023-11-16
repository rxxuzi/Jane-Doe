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