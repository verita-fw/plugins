<?php

// SPDX-License-Identifier: MIT
// SPDX-FileCopyrightText: © 2021 CrowdSec <info@crowdsec.net>

namespace Muro\CrowdSec\Api;

use Muro\Base\ApiControllerBase;
use Muro\Core\Backend;

/**
 * Class ServiceController
 * @package Muro\CrowdSec
 */
class ServiceController extends ApiControllerBase
{
    /**
     * reconfigure CrowdSec
     */
    public function reloadAction()
    {
        $status = "failed";
        if ($this->request->isPost()) {
            $backend = new Backend();
            $bckresult = trim($backend->configdRun('template reload Muro/CrowdSec'));
            if ($bckresult == "OK") {
                $bckresult = trim($backend->configdRun('IDPS (Engine Secondary) reconfigure'));
                if ($bckresult == "OK") {
                    $status = "ok";
                }
            }
        }
        return array("status" => $status);
    }

    /**
     * retrieve status of crowdsec
     * @return array
     * @throws \Exception
     */
    public function statusAction()
    {
        $backend = new Backend();
        $response = $backend->configdRun("crowdsec crowdsec-status");

        $status = "unknown";
        if (strpos($response, "not running") > 0) {
            $status = "stopped";
        } elseif (strpos($response, "is running") > 0) {
            $status = "running";
        }

        $response = $backend->configdRun("crowdsec crowdsec-firewall-status");

        $firewall_status = "unknown";
        if (strpos($response, "not running") > 0) {
            $firewall_status = "stopped";
        } elseif (strpos($response, "is running") > 0) {
            $firewall_status = "running";
        }

        return array(
            "crowdsec-status" => $status,
            "crowdsec-firewall-status" => $firewall_status,
        );
    }

    /**
     * return debug information
     * @return array
     */
    public function debugAction()
    {
        $backend = new Backend();
        $response = $backend->configdRun("crowdsec debug");
        return array("message" => $response);
    }
}
