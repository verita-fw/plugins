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
class MachinesController extends ApiControllerBase
{
    /**
     * retrieve list of registered machines
     * @return array of machines
     * @throws \Muro\Base\ModelException
     * @throws \ReflectionException
     */
    public function getAction()
    {
        $backend = new Backend();
        $bckresult = json_decode(trim($backend->configdRun("IDPS (Secondary Engine) machines-list")), true);
        if ($bckresult !== null) {
            // only return valid json type responses
            return $bckresult;
        }
        return array("message" => "unable to list machines");
    }
}
