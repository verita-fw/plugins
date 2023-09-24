{% if helpers.exists('Muro.Rspamd.general.enabled') and Muro.Rspamd.general.enabled == '1' and helpers.exists('Muro.Rspamd.av.whitelist') and Muro.Rspamd.av.whitelist != '' %}
{%   for host in Muro.Rspamd.av.whitelist.split(',') %}
{{ host }}
{%   endfor %}
{% endif %}
