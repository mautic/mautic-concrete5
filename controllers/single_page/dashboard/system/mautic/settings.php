<?php
namespace Concrete\Package\Mautic\Controller\SinglePage\Dashboard\System\Mautic;

use \Concrete\Core\Page\Controller\DashboardPageController;
use Concrete\Core\Support\Facade\Package;

class Settings extends DashboardPageController
{
    public function view()
    {
        /** @var \Concrete\Core\Package\Package $pkg */
        $pkg = Package::getByHandle('mautic');
        $url = $pkg->getFileConfig()->get('mautic.base_url');
        $this->set('url', $url);

        $this->set('token', $this->token);
    }

    public function submit()
    {
        if (!$this->token->validate('submit')) {
            $this->error->add($this->token->getErrorMessage());
        }

        $url = $this->post('mautic_base_url');
        if (!$url) {
            $this->error->add(t('Mautic URL is required.'));
        } elseif (strpos($url, 'http://') === false) {
            $this->error->add(t('Mautic URL is invalid.'));
        }

        if (!$this->error->has()) {
            /** @var \Concrete\Core\Package\Package $pkg */
            $pkg = Package::getByHandle('mautic');
            $pkg->getFileConfig()->save('mautic.base_url', trim($url, " \t\n\r\0\x0B/"));

            // redirect to not cause double post
            $this->redirect('/dashboard/system/mautic/settings', 'success');
        }
    }

    public function success()
    {
        $this->set('message', t("Settings have been updated."));
        $this->view();
    }
}