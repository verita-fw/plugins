<?php

// SPDX-License-Identifier: MIT
// SPDX-FileCopyrightText: © 2021 CrowdSec <info@crowdsec.net>

namespace Muro\CrowdSec;

/**
 * Class GeneralController
 * @package Muro\CrowdSec
 */
class GeneralController extends \Muro\Base\IndexController
{
    public function indexAction()
    {
        $this->view->pick('Muro/CrowdSec/general');
        $this->view->generalForm = $this->getForm("general");
    }
}
