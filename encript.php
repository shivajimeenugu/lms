<?php class encryption{
        private $config;

        public function __construct( $options=array() ){
            $this->config=array_merge(
                array(
                    'cipher'    =>  MCRYPT_RIJNDAEL_256,
                    'mode'      =>  MCRYPT_MODE_ECB,
                    'key'       =>  FALSE,
                    'iv'        =>  FALSE,
                    'size'      =>  FALSE,
                    'base64'    =>  TRUE,
                    'salt'      =>  FALSE
                ),
                $options
            );
        }
        private function getivs( $config=object ){
            $config->size=mcrypt_get_iv_size( $config->cipher, $config->mode );
            $config->iv=mcrypt_create_iv( $config->size, MCRYPT_RAND );
        }
        public function encrypt( $data=NULL ){
            $config=(object)$this->config;
            $this->getivs( $config );
            $data=trim( $data );
            $module = mcrypt_module_open( $config->cipher, '', $config->mode, '' );
            mcrypt_generic_init( $module, $config->key, $config->iv );

            $output = $config->base64 ? base64_encode( mcrypt_generic( $module, $data ) ) : mcrypt_generic( $module, $data );

            mcrypt_generic_deinit( $module );
            mcrypt_module_close( $module );
            return $output;
        }
        public function decrypt( $data=NULL ){
            $config=(object)$this->config;
            $this->getivs( $config );
            mb_detect_order( 'auto' );
            $encoding=mb_detect_encoding( $data );
            if( !$data or is_null( $data ) or empty( $data ) or !$encoding or $data=='' or base64_decode( $data )=='' ) return FALSE;

            $module = mcrypt_module_open( $config->cipher, '', $config->mode, '' );
            mcrypt_generic_init( $module, $config->key, $config->iv );

            $output = $config->base64 ? rtrim( mdecrypt_generic( $module, base64_decode( $data ) ),"\0" ) : rtrim( mdecrypt_generic( $module, $data ),"\0" );

            mcrypt_generic_deinit( $module );
            mcrypt_module_close( $module );
            return urldecode( $output );
        }
}

?>