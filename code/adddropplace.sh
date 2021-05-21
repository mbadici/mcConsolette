#!/bin/bash
ldapmodify -D cn=admin,cn=config  -Y EXTERNAL -H ldapi:///  -f maildropplace.ldif 
