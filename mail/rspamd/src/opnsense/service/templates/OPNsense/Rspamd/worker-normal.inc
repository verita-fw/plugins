{% if helpers.exists('Muro.Rspamd.general.enabled') and Muro.Rspamd.general.enabled == '1' %}
bind_socket = "/var/run/rspamd/normal.sock mode=0666 owner=rspamd";
{% endif %}
