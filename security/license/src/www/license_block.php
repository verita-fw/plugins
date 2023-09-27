<?php

$c1 = "service suricata onestop"; //IDS
$c2 = "service maltrailsensor onestop"; // 
$c3 = "service crowdsec onestop"; //
$c4 = "service clamav onestop"; // Avirus
$c5 = "service postfix onestop"; // Aspam
$c6 = "service rspamd onestop"; //Email
$c7 = "service redis onestop"; //
$c8 = "service nginx onestop"; //WAF
$c9 = "service service dnscrypt-proxy onestop"; //DNS
$c10 = "service unbound onestop"; //
$c11 = "service bind onestop"; //
$c12 = "service haproxy onestop"; //SLB
$c13 = "service os-relayd onestop"; //

$command = "/usr/local/bin/python3 /usr/local/opnsense/service/service_status.py lic_status";
$output = shell_exec($command);

if (trim($output) === "true") {
    $command_lic = "/usr/local/bin/python3 /usr/local/opnsense/service/service_status.py lic_only";
    $out = shell_exec($command_lic);
    $list = eval("return " . $out . ";");

    $service_list = array(
        "IDS/IPS" => array($c1, $c2, $c3),
        "Avirus" => array($c4),
        "ASpam" => array($c5),
        "Email" => array($c6, $c7),
        "WAF" => array($c8),
        "DNS" => array($c9, $c10, $c11),
        "SLB" => array($c12, $c13)
    );
    foreach ($list as $service_name => $values) {
        if (isset($service_list[$service_name])) {
            $commands = $service_list[$service_name];
            foreach ($commands as $command) {
                // Check if the command is not in the $list before executing it
                if (!in_array($command, $list)) {
                    shell_exec($command);
                }
            }
        }
    }


} else {

    $list = array($c1, $c2, $c3, $c4, $c5, $c6, $c7, $c8, $c9, $c10, $c11, $c12);

    foreach ($list as $item) {
        shell_exec($item);
    }
}

?>