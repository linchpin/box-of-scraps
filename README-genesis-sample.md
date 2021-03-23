# %%SITENAME%%

This repo contains all of the plugins and themes for the [%%SITENAME%% Website](https://%%SITEURL%%). This site is built on the %%GENESISTHEME%% theme of the Genesis Framework, so only plugin files shall be modified, with the exception of Genesis and %%GENESISTHEME%% theme updates.

## Getting Setup Locally

1. Delete the following folders in _wp-content_:  
    1. _mu-plugins_
    2. _plugins_
    3. _themes_
2. Clone the repo into _wp-content_ (`git clone git@github.com:linchpin/%%REPONAME%%.git`)
3. Move everything from _%%REPONAME%%_ folder into _wp-content_ and delete _%%REPONAME%%_
4. Run `composer install`
5. Go to plugin folder (`cd plugins/%%PLUGINNAME%%`)
6. Run `yarn install; gulp build:production`


## Adding and Updating Plugins

Most of the plugins are installed via Composer. If the plugin is available in the WordPress plugin directory, it should be listed in the `composer.json` file.

For premium plugins and private plugins that aren't in the WordPress plugin directory, they can be added directly to the `plugins` folder. These plugins are noted below with their names in __bold__.

## Changelog

## %%VERSIONNUM%%
* Initial Commit
