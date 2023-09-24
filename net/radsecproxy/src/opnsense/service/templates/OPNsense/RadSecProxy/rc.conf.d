{% if helpers.exists('Muro.radsecproxy.general.enabled') and Muro.radsecproxy.general.enabled == '1' %}
radsecproxy_enable="YES"
{% else %}
radsecproxy_enable="NO"
{% endif %}
radsecproxy_user="root"
radsecproxy_group="wheel"
