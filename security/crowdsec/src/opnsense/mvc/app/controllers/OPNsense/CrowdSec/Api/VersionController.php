<?php

// SPDX-License-Identifier: MIT
// SPDX-FileCopyrightText: © 2021 CrowdSec <info@crowdsec.net>

namespace Muro\CrowdSec\Api;

use Muro\Base\ApiControllerBase;
use Muro\CrowdSec\CrowdSec;
use Muro\Core\Backend;

/**
 * @package Muro\CrowdSec
 */
class VersionController extends ApiControllerBase
{
    /**
     * retrieve version description
     * @return version description
     * @throws \Muro\Base\ModelException
     * @throws \ReflectionException
     */
    public function getAction()
    {
        $backend = new Backend();
        return $backend->configdRun("IDPS (Engine Secondary) version");
    }
}
