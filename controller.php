<?php
namespace Concrete\Package\Mautic;
use Package;
use BlockType;
use SinglePage;
use Loader;

defined('C5_EXECUTE') or die(_("Access Denied."));

class Controller extends Package {
    protected $pkgHandle = "mautic";
    protected $appVersionRequired = "5.5";
    protected $pkgVersion = "1.0";
    
    public function getPackageName() {
        return t('Mautic');
    }

    public function getPackageDescription() {
        return t('Mautic Integration Plugin');
    }

	public function install() {
		$pkg = parent::install();
		// install list block
		BlockType::installBlockTypeFromPackage('mautictracker', $pkg);
        BlockType::installBlockTypeFromPackage('mauticform', $pkg);
        BlockType::installBlockTypeFromPackage('mauticcontent', $pkg);
	}
}