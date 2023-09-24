{# Default setting is enabled, so that no GUI interaction is required. #}
{% if not (helpers.exists('Muro.QemuGuestAgent.general.LogDebug')) or Muro.QemuGuestAgent.general.Enabled|default("0") != "0" %}
{%   set optional_flags = [] %}
{%   do optional_flags.append('-d -l /var/log/qemu-ga.log') %}
{%   if helpers.exists('Muro.QemuGuestAgent.general.LogDebug') and Muro.QemuGuestAgent.general.LogDebug|default("0") == "1" %}
{%     do optional_flags.append('-v') %}
{%   endif %}
{%   if helpers.exists('Muro.QemuGuestAgent.general.DisabledRPCs') and not helpers.empty('Muro.QemuGuestAgent.general.DisabledRPCs') %}
{%     do optional_flags.append('--blacklist=' ~ Muro.QemuGuestAgent.general.DisabledRPCs) %}
{%   endif %}
qemu_guest_agent_setup="/usr/local/opnsense/scripts/Muro/QemuGuestAgent/setup.sh"
qemu_guest_agent_enable="YES"
qemu_guest_agent_flags="{{optional_flags|join(' ')}}"
{% else %}
qemu_guest_agent_enable="NO"
{% endif %}
