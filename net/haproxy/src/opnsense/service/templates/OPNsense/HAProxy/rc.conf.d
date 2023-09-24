{% if helpers.exists('Muro.HAProxy.general.enabled') and Muro.HAProxy.general.enabled|default("0") == "1" %}
haproxy_enable=YES
haproxy_setup="/usr/local/opnsense/scripts/Muro/HAProxy/setup.sh"
haproxy_pidfile="/var/run/haproxy.pid"
haproxy_config="/usr/local/etc/haproxy.conf"
{% if helpers.exists('Muro.HAProxy.general.storeOcsp') and Muro.HAProxy.general.storeOcsp|default("0") == "1" %}
haproxy_ocsp=YES
{% else %}
haproxy_ocsp=NO
{% endif %}
{% if helpers.exists('Muro.HAProxy.general.gracefulStop') and Muro.HAProxy.general.gracefulStop|default("0") == "1" %}
haproxy_hardstop=NO
{% else %}
haproxy_hardstop=YES
{% endif %}
{% if helpers.exists('Muro.HAProxy.general.seamlessReload') and Muro.HAProxy.general.seamlessReload|default("0") == "1" %}
haproxy_socket="/var/run/haproxy.socket"
haproxy_softreload=YES
{% else %}
haproxy_softreload=NO
{% endif %}
{% else %}
haproxy_enable=NO
{% endif %}
