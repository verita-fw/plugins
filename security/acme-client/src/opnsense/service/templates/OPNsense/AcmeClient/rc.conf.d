{% if helpers.exists('Muro.AcmeClient.settings.enabled') and Muro.AcmeClient.settings.enabled|default("0") == "1" %}
acme_http_challenge_enable=YES
acme_http_challenge_conf="/var/etc/lighttpd-acme-challenge.conf"
acme_http_challenge_pidfile="/var/run/lighttpd-acme-challenge.pid"
acme_http_challenge_setup="/usr/local/opnsense/scripts/Muro/AcmeClient/setup.sh"
{% else %}
acme_http_challenge_enable=NO
{% endif %}
