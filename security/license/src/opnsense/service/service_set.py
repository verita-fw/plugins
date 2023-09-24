import xml.etree.ElementTree as ET
import ast
import sys
from decrypt_data import decrypt_license

def service_block_regular():
    """
    Function : To block Services By adding new URL in respective xml tag to block page

    rtype: Block Services

    Author: Veritawall Technologies Pvt. Ltd.

    """
    block_list = ["Postfix","Nginx","Bind","Unbound","DynDNS","Relayd"
                  ,"HAProxy", "CrowdSec", "Maltrail", "IDS"]

    for tag_name in block_list:

        file_path = '/usr/local/opnsense/mvc/app/models/Muro/'+tag_name+'/Menu/Menu.xml'

        tree = ET.parse(file_path)
        root = tree.getroot()

        target_tag = root.find(".//" + tag_name)

        new_url = "/expired.php"

        target_tag.set('url', new_url)  0

        tree.write(file_path)


def service_block_url():
    """
    Function : To block Services By replacing current URL in respective xml tag to block page

    rtype: Activate Services

    Author: Veritawall Technologies Pvt. Ltd.

    """
    block_list = ["Redis", "Rspamd", "DynDNS","ClamAV"]

    for tag_name in block_list:

        file_path = '/usr/local/opnsense/mvc/app/models/Muro/'+tag_name+'/Menu/Menu.xml'

        tree = ET.parse(file_path)
        root = tree.getroot()

        target_tag = root.find(".//" + tag_name)
        # target_log = root.find(".//" + tag_name+"LogFiles")

        new_url = "/expired.php"

        if target_tag is not None:
            target_tag.set('url', new_url)
        else:
            print("Element target_tag not found or is None.")

        # if target_log is not None:
        #     target_log.set('visibility', 'hidden')

        tree.write(file_path)

def service_active_url():
    """
    Function : To activate Services By replacing current URL in respective xml tag to original url

    rtype: Activate Services

    Author: Veritawall Technologies Pvt. Ltd.

    """
    #tag_name=["Redis","Rspamd","DynDNS","ClamAV"]
    for tag_name in url_list:

        url_services = {
            "Redis": "/ui/redis",
            "Rspamd": "/ui/rspamd",
            # "DynamicDNS": "/services_dyndns.php",
            "DynDNS": "/ui/dyndns/",
            "ClamAV": "/ui/clamav/general/index"
        }

        file_path = '/usr/local/opnsense/mvc/app/models/Muro/'+tag_name+'/Menu/Menu.xml'

        tree = ET.parse(file_path)
        root = tree.getroot()

        target_tag = root.find(".//" + tag_name)
        # target_log = root.find(".//" + tag_name+"LogFiles")

        new_url = url_services[tag_name]

        target_tag.set('url', new_url)

        # if target_log is not None and 'visibility' in target_log.attrib and target_log.get('visibility') == 'hidden':
        #     del target_log.attrib['visibility']

        tree.write(file_path)


def service_active_regular():
    """
    Function : To Activate Services By removing Blocked URL in respective xml tag

    rtype: Activate Services

    Author: Veritawall Technologies Pvt. Ltd.

    """
    for tag_name in regular_list:

        file_path = '/usr/local/opnsense/mvc/app/models/Muro/'+tag_name+'/Menu/Menu.xml'

        tree = ET.parse(file_path)
        root = tree.getroot()

        # Find the <Postfix> element
        element = root.find(".//"+tag_name)
        # target_log = root.find(".//"+tag_name+"LogFiles")

        # Remove the 'url' attribute
        if 'url' in element.attrib:
            del element.attrib['url']

        # if target_log is not None and 'visibility' in target_log.attrib and target_log.get('visibility') == 'hidden':
        #     del target_log.attrib['visibility']

        tree.write(file_path)

if __name__ == "__main__":

    result = decrypt_license()
    data = result[1]
    print(data)
    lic_service = data.get('Lic_service')

    service_list = {
        'IDS': ["IDS", "CrowdSec","Maltrail"],
        'AppF': ["Application Filter"],
        'URLF': ["URL Filter"],
        'Sndbx': ["Sandbox"],
        'Avirus': ["ClamAV"],
        'ASpam': ["Postfix"],
        'Email': ["Redis", "Rspamd"],
        'WAF': ["Nginx"],
        'DNS': ["Bind","DynDNS", "Unbound"],
        'SLB': ["HAProxy","Relayd"],
        'AAA':["FreeRADIUS"]
    }

    word_list = lic_service
    print("word list=",word_list)
    output_list = [
        value for key in word_list for value in service_list.get(key, [])]
    print("o/p list=",output_list)

    url = ["Redis", "Rspamd", "DynDNS", "ClamAV"]
    url_list = [item for item in output_list if item in url]

    regular_list = [item for item in output_list if item not in url_list]

    print(url_list, "<==URl |||| REg==>", regular_list)

if sys.argv[1] == 'activate':
    url1 = service_active_url()
    reg1 = service_active_regular()
if sys.argv[1] == 'block':
    url0 = service_block_url()
    reg0 = service_block_regular()
