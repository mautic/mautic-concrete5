<?php

namespace Concrete\Package\Mautic\Block\Tracker;
use \Concrete\Core\Block\BlockController;
use UserInfo;
use Loader;
use Config;
use Page;
use View;
defined('C5_EXECUTE') or die("Access Denied.");

class Controller extends BlockController
{
    protected $btTable = 'btMautic';
    protected $btInterfaceWidth = "600";
    protected $btInterfaceHeight = "400";
    
    public $mautic_base_url = "";
    
    public function getBlockTypeDescription() {
        return t("Add Mautic Tracker.");
    }
    
    public function getBlockTypeName() {
        return t("Tracker");
    }
    
    public function view(){ 
        $this->set('mautic_base_url', $this->mautic_base_url);
    } 
    
    public function save($args) { 
        $args['mautic_base_url'] = isset($args['mautic_base_url']) ? $args['mautic_base_url'] : '';
        parent::save($args);
    }
}