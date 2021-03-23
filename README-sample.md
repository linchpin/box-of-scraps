# %%SITENAME%%

This repo is utilized to centralize/control all **code** for [%%SITENAME%% Website](https://%%SITEURL%%).

Plugins and Themes can be maintained in the following ways

- As a composer dependency **(The recommended way)** 
- As a plugin within this repo stored within the `plugins/` directory : Typically you will see a `client-functionality` WordPress

Composer Packages will come from https://wpackagist.org or from https://packagist.linchpin.com see this projects `composer.json` file for more examples

## Getting Started

###...From scratch
The following process assumes you are starting from a new project (maybe utilizing a clean WordPress install but really has no other content)

### Manual Process (A good way to learn/understand how it works)
1. Visit the root web directory of your project Ex. `~/vvv/project-name/public_html/`
1. Delete the following folders in `wp-content`:  
    1. `mu-plugins`
    2. `plugins`
    3. `themes`
2. Clone this repo into _wp-content_ (`git clone git@github.com:linchpin/%%REPONAME%%.git`)
3. Move everything from _%%REPONAME%%_ folder into _wp-content_ and delete _%%REPONAME%%_
4. Run `composer install`
5. Go to the theme folder (`cd themes/%%THEMENAME%%`)
6. Run `yarn install; gulp build:production`

### A script to move things around

If you are utilizing Local WP you can use the following script to help automate the process

```shell
  # Purpose: Run this after you have sync'd a site from WP Engine so that it pulls down the appropriate repo and moves things around as needed.
  # @var site-install-dir : Directory of the site we're migrating (after install to local)
  # @var site-hash: The hash ID created by local when a site is created
  # @var site-git-project-slug: This is the GitHub project slug
  # @var site-domain: the live site domain
  # @var site-local-domain: the local site domain
  cd ~/Local\ Sites/<site-install-dir>/app/public
  # Create a backup
  mv wp-content wp-content-backup
  git clone git@github.com:linchpin/<site-git-project-slug>.git wp-content
  # Re-Sync our original content from the backup folder excluding some assets
  rsync -v --exclude 'plugins' --exclude 'mu-plugins' --exclude 'themes' --exclude 'debug.log' wp-content-backup/ wp-content/
  rm -rf wp-content-backup
  cd wp-content
  # Install our dependent libraries
  composer install
  # Site shell script is created when you Open Site Shell (so this may not work initially) unless you do this step first.
  ~/Library/Application\ Support/Local/ssh-entry/<site-hash>.sh
  wp search-replace https://<site-domain>/ https://<site-domain-local>/
```

## Adding and Updating Open Source Plugins (wordpress.org)

As mentioned previously, most of the plugins (and sometimes themes) are installed via Composer as dependencies.

If the plugin is available in the WordPress.org plugin directory, it should be available on https://wpackagist.org and subequently added as a dependencies within this projects  `composer.json` file.

### Managing Premium Plugins

For premium plugins and private plugins that aren't in the WordPress.org plugin directory you also have some flexibility regarding how they are managed.

1. If the plugin was created and is **ONLY** for this client, it can be added to the `plugins` directory of this project 
2. If the plugin is utilized by multiple clients and is a private/premium plugin you can check its availability on https://packagist.linchpin.com .

Plugins within this repo are noted below with their names in __bold__.

## Deploying to Production and Staging Environments

The deployment is controlled by GitHub Actions.
To deploy code to the staging environment, simply merge your code to the staging branch and push to the repository.
To deploy code to the production environment, do a pull request to the master branch and then tag a release. It will need another developer to review and accept your pull request before it will be deployed.

### Installing Composer for Mac
To quickly install Composer in the current directory, run the following commands in your terminal.

```shell
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
mv composer.phar /usr/local/bin/composer
php -r "unlink('composer-setup.php');"
```

The 4 lines above will download the installer into the current directory, run the installer, and then remove the installer.


## Changelog

See CHANGELOG.md for changes
