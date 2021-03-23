#!/bin/bash

# Shared variables for bash scripts.
export DEPLOYMENT_DIR=$(pwd)
export TIMESTAMP_DIR="$(dirname "$DEPLOYMENT_DIR")"
export RELEASES_DIR="$(dirname "$TIMESTAMP_DIR")"
export PRIVATE_DIR="$(dirname "$RELEASES_DIR")"
export PUBLIC_DIR="$(dirname "$PRIVATE_DIR")"

# Make all the bash scripts executable.
chmod +x *.sh

# Run bash scripts.
bash ./backup.sh
bash ./rsync.sh
bash ./finish.sh
