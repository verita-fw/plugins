#!/usr/local/bin/python
import sys
from decrypt_data import decrypt_license
from datetime import datetime

def show_lic():
    """
    : This function return a value of license type,
      license service, Start date and End date.

    :rtype: list
    :Author: Veritawall Technologies Pvt. Ltd.
    """
    
    return [lic_type, lic_service, date_str, end_date]


def check_valid_lic():
    """
    :This function return a boolean value.

    :rtype: boolean
    :Author: Veritawall Technologies Pvt. Ltd.
    """
    if not data:
        return False
    startdate_obj = datetime.strptime(date_str.strip(), "%Y-%m-%d").date()
    enddate_obj = datetime.strptime(end_date.strip(), "%Y-%m-%d").date()
    current_date = datetime.now().date()
    if startdate_obj <= current_date <= enddate_obj:
        return True
    else:
        return False

def lic_status():
    """
    :This function return a value of license type,
     license service and End date.

    :rtype: list
    :Author: Veritawall Technologies Pvt. Ltd.
    """
    valid_lic = check_valid_lic()
    if not valid_lic:
        return ["", "", ""]
    if lic_type == 'Demo':
        return [lic_type, lic_service, end_date]
    elif lic_type == 'AppLic':
        
        return [lic_type, lic_service, end_date]


if __name__ == "__main__":
    detail = decrypt_license()
    data = detail[1]
    start_date = data.get('Start_date')
    date_str= start_date
    end_date = data.get("End_date")
    lic_type = data.get('License_Type')
    lic_service = data.get('Lic_service')
    
    if sys.argv[1] == 'lic_status':
        str1 = lic_status()
        print(str1)
    if sys.argv[1] == 'show_lic':
        str1 = show_lic()
        print(str1)