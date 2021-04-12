# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [1.0.7] - 04-01-2021
### Added
- Added a new release-cleanup.sh that will remove unneeded files when a release is created
- Added a CHANGELOG.md to the default box-of-scraps files. Including the default keepachangelog formatting
### Update
- Updated .distignore to remove some unneeded files from the distribution version on github
- Updated the release workflow
- Updated the default package.json

### Update
- Making sure the deployment ID is passed along in order to show status properly
## [1.0.5] - 03-25-2021
### Update
- Making sure the deployment ID is passed along in order to show status properly

## [1.0.3] - 03-25-2021
### Update
- Adjusting Production Workflow based on deploy-scaffold

## [1.0.2] - 03-25-2021
### Update
- Adjusting Production Workflow based on deploy-scaffold

## [1.0.1] - 03-24-2021
### Update
- Deploy workflow

## [1.0.0] - 03-24-2021
### Added
- Created a default release
- Changelog body should now be displayed within the release
- This latest.md will automatically be merged into your README.md as the top entry within the **CHANGELOG.md** when running the `changelog.sh`
