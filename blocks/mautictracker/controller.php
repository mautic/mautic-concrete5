<?php

namespace Concrete\Package\Mautic\Block\Mautictracker;
use \Concrete\Core\Block\BlockController;
use UserInfo;
use Loader;
use Config;
use Page;
use View;
defined('C5_EXECUTE') or die("Access Denied.");

class Controller extends BlockController
{
    protected $btTable = 'mauticConfig';
    protected $btInterfaceWidth = "600";
    protected $btInterfaceHeight = "400";
    
    public $mautic_base_url = "";
    
    public function getBlockTypeDescription() {
        return t("Add Mautic Tracker.");
    }
    
    public function getBlockTypeName() {
        return t("Mautictracker");
    }
    
    public function view() {
        $page = Page::getCurrentPage();
        $nh = Loader::helper('navigation');
        $currentUrl = $nh->getCollectionURL($page);

        // Get additional data to send
        $attrs = array();
        $attrs['title']     = $page->getCollectionName();
        $attrs['referrer']  = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $currentUrl;
        $attrs['url']       = $currentUrl . (isset($_SERVER['QUERY_STRING']) ? ('?' . $_SERVER['QUERY_STRING']) : '');

        $encodedAttrs       = urlencode(base64_encode(serialize($attrs)));

        $this->set('mautic_base_url', $this->mautic_base_url . '?d=' . $encodedAttrs);
    } 
    
    public function save($args) {
        $args['mautic_base_url'] = isset($args['mautic_base_url']) ? $args['mautic_base_url'] : '';

        // Sanitize URL
        $args['mautic_base_url'] = trim($args['mautic_base_url'], ' \t\n\r\0\x0B/');

        parent::save($args);
    }
}
