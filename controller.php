<?php
namespace Concrete\Package\Mautic;

use Concrete\Core\Support\Facade\Application;
use \Concrete\Core\Page\Single as SinglePage;
use Concrete\Core\Package\Package;
use Concrete\Core\Block\BlockType\BlockType;
use Concrete\Core\Page\Page;
use Concrete\Core\View\View;
use Concrete\Package\Mautic\Asset\Tracker;

defined('C5_EXECUTE') or die(_("Access Denied."));

class Controller extends Package
{
    /**
     * @var string
     */
    protected $pkgHandle = "mautic";

    /**
     * @var string
     */
    protected $appVersionRequired = "5.7.5";

    /**
     * @var string
     */
    protected $pkgVersion = "1.1";

    /**
     * @var bool
     */
    protected $pkgAutoloaderMapCoreExtensions = true;

    /**
     * @return string
     */
    public function getPackageName()
    {
        return t('Mautic');
    }

    /**
     * @return string
     */
    public function getPackageDescription()
    {
        return t('Mautic Integration Plugin');
    }

    public function install()
    {
        $pkg = parent::install();

        // install list block
        BlockType::installBlockType('mauticform', $pkg);
        BlockType::installBlockType('mauticcontent', $pkg);
        BlockType::installBlockType('mauticvideo', $pkg);

        SinglePage::add('/dashboard/system/mautic', $pkg);
        SinglePage::add('/dashboard/system/mautic/settings', $pkg);
    }

    public function on_start()
    {
        $app = Application::getFacadeApplication();
        $url = $this->getFileConfig()->get('mautic.base_url');
        $app->singleton(
            Tracker::class,
            function () use ($url) {
                $tracker = new Tracker();
                $tracker->setUrl($url);

                return $tracker;
            }
        );

        $app->make('director')->addListener(
            'on_before_render',
            function ($event) use ($app) {
                /** @var Page $page */
                $page = Page::getCurrentPage();
                if ($page && !$page->isEditMode() && !$page->isAdminArea()) {
                    /** @var View $view */
                    $view = $event->getArgument('view');

                    $view->addHeaderAsset($app->make(Tracker::class));
                }
            }
        );
    }
}