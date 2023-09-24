{% if helpers.exists('Muro.ProxySSO.EnableSSO') and Muro.ProxySSO.EnableSSO|default("0") == "1" %}
squid_krb5_ktname="/usr/local/etc/squid/squid.keytab"
{% endif %}
