{% if not helpers.empty('Muro.DynDNS.general.enabled') and Muro.DynDNS.general.backend == 'opnsense' %}
ddclient_opn_enable="YES"
{% else %}
ddclient_opn_enable="NO"
{% endif %}
