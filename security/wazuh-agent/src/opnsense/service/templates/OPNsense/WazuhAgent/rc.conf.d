wazuh_agent_setup="/usr/local/opnsense/scripts/wazuh/setup.php"
wazuh_agent_enable={% if not helpers.empty('Muro.WazuhAgent.general.enabled') %}"YES"{% else %}"NO"{% endif %}
