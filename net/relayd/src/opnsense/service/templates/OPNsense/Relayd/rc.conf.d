# DO NOT EDIT THIS FILE -- Muro auto-generated file
{% if helpers.exists('Muro.relayd.general.enabled') and Muro.relayd.general.enabled|default("0") == "1" %}
osrelayd_enable="YES"
{% else %}
osrelayd_enable="NO"
{% endif %}
