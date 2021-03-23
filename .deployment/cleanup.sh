#!/bin/bash

set -eo

TMP_DIR="$GITHUB_WORKSPACE/temp_archive"
mkdir "$TMP_DIR"

cd "$GITHUB_WORKSPACE/build"

# If there's no .gitattributes file, write a default one into place
if [ ! -e "$GITHUB_WORKSPACE/build/.distignore" ]; then
	echo "ℹ︎ Creating .distignore file"

	cat > ".distignore" <<-EOL
	/.gitattributes
	/.gitignore
	/.github
	/vendor
	/README.md
	/.editorconfig
	/composer.lock
	/composer.json
	/index.php
	EOL
fi;

echo "➤ Copying files to $TMP_DIR"

# This will exclude everything in the .gitattributes file with the export-ignore flag
rsync -rc --exclude-from="$GITHUB_WORKSPACE/build/.distignore" "$GITHUB_WORKSPACE/build/" "$TMP_DIR/" --delete
