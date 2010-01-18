#!/bin/bash

# This script creates symlinks from the local GIT repo into your EE install. It also copies some of the extension icons.

dirname=`dirname "$0"`

echo "
You are about to create absolute symlinks for LG TinyMCE
--------------------------------------------------------

The symlinks use absolute paths so they are for development purposes only.

The following directories must be writable:

system/extensions/fieldtypes
system/language/english

Enter the full path to your ExpressionEngine install *without a trailing slash* [ENTER]:
"
read ee_path
echo "
Enter your ee system folder name [ENTER]:
"
read ee_system_folder

# extensions
#ln -f -s ../addons/lg.better_meta.ee_addon/system/extensions/fieldtypes/lg_tiny_mce ../../../ee-admin/extensions/fieldtypes/lg_tiny_mce
ln -s "$dirname"/system/extensions/fieldtypes/lg_tiny_mce "$ee_path"/"$ee_system_folder"/extensions/fieldtypes/lg_tiny_mce

# language
# ln -f -s ../../addons/lg.better_meta.ee_addon/system/language/english/lang.lg_tiny_mce.php ../../../ee-admin/language/english/lang.lg_tiny_mce.php
ln -s "$dirname"/system/language/english/lang.lg_tiny_mce.php "$ee_path"/"$ee_system_folder"/language/english/lang.lg_tiny_mce.php