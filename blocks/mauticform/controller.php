<?php

namespace Concrete\Package\Mautic\Block\Mauticform;
use \Concrete\Core\Block\BlockController;
use UserInfo;
use Loader;
use Config;
use Page;
use View;
defined('C5_EXECUTE') or die("Access Denied.");

class Controller extends BlockController
{
    protected $btTable = 'mauticForms';
    protected $btInterfaceWidth = "600";
    protected $btInterfaceHeight = "400";
    
    public $mautic_base_url = "";
    public $mautic_form_id = "";
    
    public function getBlockTypeDescription() {
        return t("Add Mautic Form.");
    }
    
    public function getBlockTypeName() {
        return t("Mautic Form");
    }
    
    public function view() { 
        $this->set('mautic_base_url', $this->mautic_base_url);
        $this->set('mautic_form_id', $this->mautic_form_id);
    } 
    
    public function save($args) { 
        $args['mautic_form_id'] = isset($args['mautic_form_id']) ? $args['mautic_form_id'] : '';

        // Sanitize URL
        $args['mautic_base_url'] = trim($args['mautic_base_url'], " \t\n\r\0\x0B/");

        parent::save($args);
    }
}
