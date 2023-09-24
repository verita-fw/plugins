{% if helpers.exists('Muro.Rspamd.general.enabled') and Muro.Rspamd.general.enabled == '1' and helpers.exists('Muro.Rspamd.graylist.whitelist_ip') and Muro.Rspamd.graylist.whitelist_ip != '' %}
{%   for host in Muro.Rspamd.graylist.whitelist_ip.split(',') %}
{{ host }}
{%   endfor %}
{% endif %}
