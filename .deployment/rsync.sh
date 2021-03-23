#!/bin/bash

cd "$RELEASES_DIR"

# Create an exclude list of mu-plugins that WPEngine doesn't want deleted.
echo "force-strong-passwords
wpe-wp-sign-on-plugin
wpengine-common
mu-plugin.php
slt-force-strong-passwords.php
wpe_bnseosnvlsoier_private_ips.php
x_disable_wpesec.php
wpe-wp-sign-on-plugin.php
wpengine-security-auditor.php" >> exclude.txt

# rsync latest release to release folder.
rsync -vrxc --delete ${TIMESTAMP_DIR}/plugins/. ${PUBLIC_DIR}/wp-content/plugins
rsync -vrxc --delete ${TIMESTAMP_DIR}/themes/. ${PUBLIC_DIR}/wp-content/themes
rsync -vrxc --delete --exclude-from="exclude.txt" ${TIMESTAMP_DIR}/mu-plugins/. ${PUBLIC_DIR}/wp-content/mu-plugins

rm exclude.txt
