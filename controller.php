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
}

?>
