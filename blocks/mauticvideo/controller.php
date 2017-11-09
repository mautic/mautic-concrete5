<?php

namespace Concrete\Package\Mautic\Block\Mauticvideo;

use \Concrete\Core\Block\BlockController;
use Concrete\Core\Support\Facade\Package;

defined('C5_EXECUTE') or die("Access Denied.");

/**
 * Class Controller
 */
class Controller extends BlockController
{
    /**
     * @var string
     */
    protected $btTable = 'mauticVideos';

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
     * @var int
     */
    public $mautic_gate_time = 15;

    /**
     * @var null
     */
    public $mautic_form_id = null;

    /**
     * @var int
     */
    public $mautic_width = 640;

    /**
     * @var int
     */
    public $mautic_height = 360;

    /**
     * @var null
     */
    public $mautic_src = null;

    /**
     * @return string
     */
    public function getBlockTypeDescription() {
        return t("Add Mautic Video.");
    }

    /**
     * @return string
     */
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
    public function save($args) {
        // Sanitize URL
        $args['mautic_base_url'] = trim($args['mautic_base_url'], " \t\n\r\0\x0B/");
        $args['mautic_gate_time'] = isset($args['mautic_gate_time']) ? (int) $args['mautic_gate_time'] : 15;
        $args['mautic_form_id'] = isset($args['mautic_form_id']) ? (int) $args['mautic_form_id'] : null;
        $args['mautic_width'] = isset($args['mautic_width']) ? (int) $args['mautic_width'] : 640;
        $args['mautic_height'] = isset($args['mautic_height']) ? (int) $args['mautic_height'] : 360;
        $args['mautic_src'] = isset($args['mautic_src']) ? $args['mautic_src'] : null;

        parent::save($args);
    }
}
