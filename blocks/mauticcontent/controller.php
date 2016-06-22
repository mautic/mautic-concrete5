<?php

namespace Concrete\Package\Mautic\Block\Mauticcontent;
use \Concrete\Core\Block\BlockController;
use UserInfo;
use Loader;
use Config;
use Page;
use View;
defined('C5_EXECUTE') or die("Access Denied.");

class Controller extends BlockController
{
    protected $btTable = 'mauticDynamicContents';
    protected $btInterfaceWidth = "600";
    protected $btInterfaceHeight = "400";
    
    public $mautic_base_url = "";
    public $mautic_slot_name = "";
    public $mautic_slot_default_content = "";
    
    public function getBlockTypeDescription() {
        return t("Add Mautic Dynamic Content.");
    }
    
    public function getBlockTypeName() {
        return t("Mautic Dynamic Content");
    }
    
    public function view() { 
        $this->set('mautic_base_url', $this->mautic_base_url);
        $this->set('mautic_slot_name', $this->mautic_slot_name);
        $this->set('mautic_slot_default_content', $this->mautic_slot_default_content);
    } 
    
    public function save($args) { 
        $args['mautic_slot_name'] = isset($args['mautic_slot_name']) ? $args['mautic_slot_name'] : '';
        $args['mautic_slot_default_content'] = isset($args['mautic_slot_default_content']) ? $args['mautic_slot_default_content'] : '';

        // Sanitize URL
        $args['mautic_base_url'] = trim($args['mautic_base_url'], ' \t\n\r\0\x0B/');

        parent::save($args);
    }
}
