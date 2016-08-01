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
    protected $btTable = 'mauticVideos';
    protected $btInterfaceWidth = "600";
    protected $btInterfaceHeight = "400";

    public $mautic_base_url = "";
    public $mautic_gate_time = 15;
    public $mautic_form_id = null;
    public $mautic_width = 640;
    public $mautic_height = 360;
    public $mautic_src = null;
    
    public function getBlockTypeDescription() {
        return t("Add Mautic Video.");
    }
    
    public function getBlockTypeName() {
        return t("Mautic Video");
    }
    
    public function view() {
        $this->set('mautic_base_url', $this->mautic_base_url);
        $this->set('mautic_gate_time', $this->mautic_gate_time);
        $this->set('mautic_form_id', $this->mautic_form_id);
        $this->set('mautic_width', $this->mautic_width);
        $this->set('mautic_height', $this->mautic_height);
        $this->set('mautic_src', $this->mautic_src);
    } 
    
    public function save($args) {
        // Sanitize URL
        $args['mautic_base_url'] = trim($args['mautic_base_url'], ' \t\n\r\0\x0B/');
        $args['mautic_gate_time'] = isset($args['mautic_gate_time']) ? (int) $args['mautic_gate_time'] : 15;
        $args['mautic_form_id'] = isset($args['mautic_form_id']) ? (int) $args['mautic_form_id'] : null;
        $args['mautic_width'] = isset($args['mautic_width']) ? (int) $args['mautic_width'] : 640;
        $args['mautic_height'] = isset($args['mautic_height']) ? (int) $args['mautic_height'] : 360;
        $args['mautic_src'] = isset($args['mautic_src']) ? $args['mautic_src'] : null;

        parent::save($args);
    }
}
