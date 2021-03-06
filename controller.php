<?php

namespace Concrete\Package\SingleMap;
use Package;
use BlockType;

class Controller extends Package
{
    protected $pkgHandle = 'single_map';
    protected $appVersionRequired = '5.7.5.8';
    protected $pkgVersion = '0.9';

    public function getPackageName()
    {
        return t('Single Map');
    }

    public function getPackageDescription()
    {
        return t('Embed a single google map with options');
    }

    public function install()
    {
        $pkg = parent::install();
        BlockType::installBlockTypeFromPackage('single_map', $pkg);
    }
    public function on_start()
    {
        $al = \Concrete\Core\Asset\AssetList::getInstance();
        $al->register(
            'javascript', 'googleMapsAPI', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyC_eOliAR35peqAtdN6NquzIMQinPqwx5Q&callback=initMap', array('local' => false)
        );

        $al->register(
            'javascript', 'gmapsjs', 'blocks/single_map/vendor/hpneo/gmaps.js', array(), 'single_map'
        );

        $al->registerGroup('googleMapsAPI',array(
			      array('javascript','gmapsjs'),
            array('javascript','googleMapsAPI'),
		    ));
	  }

}

?>
