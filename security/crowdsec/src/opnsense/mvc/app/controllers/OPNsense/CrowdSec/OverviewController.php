<?php

// SPDX-License-Identifier: MIT
// SPDX-FileCopyrightText: © 2021 CrowdSec <info@crowdsec.net>

namespace Muro\CrowdSec;

/**
 * Class OverviewController
 * @package Muro\CrowdSec
 */
class OverviewController extends \Muro\Base\IndexController
{
    public function indexAction()
    {
        $this->view->pick('Muro/CrowdSec/overview');
    }
}
