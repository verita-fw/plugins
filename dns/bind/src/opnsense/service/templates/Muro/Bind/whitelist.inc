{% if helpers.exists('Muro.bind.general.enabled') and Muro.bind.general.enabled == '1' %}
{%   if helpers.exists('Muro.bind.dnsbl.enabled') and Muro.bind.dnsbl.enabled == '1' %}
{%     if helpers.exists('Muro.bind.dnsbl.type') and Muro.bind.dnsbl.type != '' %}
{%       if helpers.exists('Muro.bind.dnsbl.whitelists') and Muro.bind.dnsbl.whitelists != '' %}
{%         for whitelist in Muro.bind.dnsbl.whitelists.split(',') %}
{{ whitelist }}		IN	CNAME	rpz-passthru.
*.{{ whitelist }}	IN	CNAME	rpz-passthru.
{%         endfor %}
{%       endif %}
{%     endif %}
{%   endif %}
{% endif %}
