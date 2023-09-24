{% if helpers.exists('Muro.puppetagent.general') and Muro.puppetagent.general.Enabled|default("0") == "1" %}
puppet_enable="YES"
{% else %}
puppet_enable="NO"
{% endif %}
