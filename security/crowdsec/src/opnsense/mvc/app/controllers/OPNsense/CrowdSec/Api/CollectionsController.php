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
class CollectionsController extends ApiControllerBase
{
    /**
     * retrieve list of collections
     * @return array of collections
     * @throws \Muro\Base\ModelException
     * @throws \ReflectionException
     */
    public function getAction()
    {
        $backend = new Backend();
        $bckresult = json_decode(trim($backend->configdRun("IDPS (Engine Secondary) collections-list")), true);
        if ($bckresult !== null) {
            // only return valid json type responses
            return $bckresult;
        }
        return array("message" => "unable to list collections");
    }
}
