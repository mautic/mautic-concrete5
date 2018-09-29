<?php
namespace Concrete\Package\Mautic\Controller\SinglePage\Dashboard\System;

use \Concrete\Core\Page\Controller\DashboardPageController;

class Mautic extends DashboardPageController
{
    public function view()
    {
        $this->redirect('/dashboard/system/mautic/settings');
    }
}
