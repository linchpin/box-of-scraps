#!/bin/bash

cd "$RELEASES_DIR"

# Remove the oldest release if there's more than 5 of them.
if [ `find . -mindepth 1 -maxdepth 1 -type d | wc -l` -gt 5 ]; then
	rm -rf "$(ls -t | tail -1)"
fi;
