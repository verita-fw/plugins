<?php

// SPDX-License-Identifier: MIT
// SPDX-FileCopyrightText: © 2021 CrowdSec <info@crowdsec.net>

namespace Muro\CrowdSec\Api;

use Muro\Base\ApiMutableModelControllerBase;

/**
 * @package Muro\CrowdSec
 */
class GeneralController extends ApiMutableModelControllerBase
{
    protected static $internalModelName = 'general';
    protected static $internalModelClass = '\Muro\CrowdSec\General';
}
