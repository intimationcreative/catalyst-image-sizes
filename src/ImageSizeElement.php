<?php

namespace Intimation\Catalyst;

class ImageSizeElement extends Element {

    const ADD = 'add';
    const REMOVE = 'remove';

    public function init() {
        if ( array_key_exists( self::REMOVE, $this->config)) {
            array_map( 'remove_image_size', $this->config[ self::REMOVE ] );
        }

        if( array_key_exists(self::ADD, $this->config)) {
            array_walk( $this->config[ self::ADD ], function( $args, $name ) {
                add_image_size( $name, $args[0], $args[1], isset( $args[2] ) ? $args[2] : false );
            } );
        }
    }
}
