<?php

namespace Concrete\Package\Mautic\Block\Mautictracker;

use Concrete\Core\Block\BlockController;
use Page;
use Request;
use URL;
use Localization;

defined('C5_EXECUTE') or die("Access Denied.");

class Controller extends BlockController
{
    protected $btTable = 'mauticConfig';
    protected $btInterfaceWidth = "600";
    protected $btInterfaceHeight = "400";
    protected $btCacheBlockRecord = true;
    protected $btCacheBlockOutput = true;
    protected $btCacheBlockOutputOnPost = true;
    protected $btCacheBlockOutputForRegisteredUsers = false;

    public $mautic_base_url = "";

    public function getBlockTypeDescription()
    {
        return t("Add Mautic Tracker.");
    }

    public function getBlockTypeName()
    {
        return t("Mautic Tracker");
    }

    public function view()
    {
        $page = Page::getCurrentPage();
        $request = Request::getInstance();
        $currentUrl = (string) URL::to($request->getPathInfo());

        // Get additional data to send
        $attrs = array();
        $attrs['title'] = $page->getCollectionName();
        $attrs['language'] = Localization::activeLocale();
        $attrs['referrer'] = ($request->headers->get('referer')) ? $request->headers->get('referer') : $currentUrl;
        $attrs['url'] = ($request->getQueryString()) ? $currentUrl . '?' . $request->getQueryString() : $currentUrl;

        $encodedAttrs = urlencode(base64_encode(serialize($attrs)));

        $this->set('mautic_base_url', $this->mautic_base_url);
        $this->set('encodedAttrs',    '?d=' . $encodedAttrs);
    }

    public function save($args)
    {
        $args['mautic_base_url'] = isset($args['mautic_base_url']) ? $args['mautic_base_url'] : '';

        // Sanitize URL
        $args['mautic_base_url'] = trim($args['mautic_base_url'], " \t\n\r\0\x0B/");

        parent::save($args);
    }
}
