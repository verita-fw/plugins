<?php

/*
 * Copyright (C) 2021 Axelrtgs
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 * 1. Redistributions of source code must retain the above copyright notice,
 *    this list of conditions and the following disclaimer.
 *
 * 2. Redistributions in binary form must reproduce the above copyright
 *    notice, this list of conditions and the following disclaimer in the
 *    documentation and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED ``AS IS'' AND ANY EXPRESS OR IMPLIED WARRANTIES,
 * INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * AUTHOR BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY,
 * OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 */

namespace Muro\AcmeClient\LeValidation;

use Muro\AcmeClient\LeValidationInterface;
use Muro\Core\Config;

/**
 * CF DNS API
 * @package Muro\AcmeClient
 */
class DnsCpanel extends Base implements LeValidationInterface
{
    public function prepare()
    {
        # https://github.com/acmesh-official/acme.sh/wiki/dnsapi#136-use-cpanel-dns-systems
        $this->acme_env['cPanel_Username'] = (string)$this->config->dns_cpanel_user;
        $this->acme_env['cPanel_Apitoken'] = (string)$this->config->dns_cpanel_token;
        $this->acme_env['cPanel_Hostname'] = (string)$this->config->dns_cpanel_hostname;
    }
}
