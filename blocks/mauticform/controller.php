<?php

namespace Concrete\Package\Mautic\Block\Mauticform;

use \Concrete\Core\Block\BlockController;
use Concrete\Core\Support\Facade\Package;

defined('C5_EXECUTE') or die("Access Denied.");

class Controller extends BlockController
{
    /**
     * @var string
     */
    protected $btTable = 'mauticForms';

    /**
     * @var string
     */
    protected $btInterfaceWidth = "600";

    /**
     * @var string
     */
    protected $btInterfaceHeight = "400";

    /**
     * @var string
     */
    public $mautic_base_url = "";

    /**
     * @var string
     */
    public $mautic_form_id = "";

    /**
     * @return string
     */
    public function getBlockTypeDescription()
    {
        return t("Add Mautic Form.");
    }

    /**
     * @return string
     */
    public function getBlockTypeName()
    {
        return t("Mautic Form");
    }

    public function view()
    {
        $this->set('mautic_base_url', $this->mautic_base_url);
        $this->set('mautic_form_id', $this->mautic_form_id);
    }

    public function add()
    {
        if (!$this->mautic_base_url) {
            $pkg = Package::getByHandle('mautic');

            $this->mautic_base_url = $pkg->getFileConfig()->get('mautic.base_url');
            $this->set('mautic_base_url', $this->mautic_base_url);
        }
    }

    /**
     * @param array $args
     */
    public function save($args)
    {
        $args['mautic_form_id'] = isset($args['mautic_form_id']) ? $args['mautic_form_id'] : '';

        // Sanitize URL
        $args['mautic_base_url'] = trim($args['mautic_base_url'], " \t\n\r\0\x0B/");

        parent::save($args);
    }
}
