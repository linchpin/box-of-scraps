# Box of Scraps

Box of scraps is a WordPress theme scaffold used when building sites @ [Linchpin](https://linchpin.com). While it can be used as a stand alone, the team typically utilizes with [deploy-scaffold](https://github.com/linchpin/deploy-scaffold)

## Latest Release [1.1.1] - 08-24-2022


![Linchpin](https://github.com/linchpin/brand-assets/raw/master/box-of-scraps.gif)

## How do I use it?

The best approach is to download the latest release zip as a starting point. The release will have everything you need to get started excluding any `composer` or `npm` dependencies.

## Installing Dependencies

### Composer

By default, there are only development related `composer` dependencies, though you can utilize them as needed.

### Yarn/npm and Dependencies

You can use either `yarn` or `npm` to install dependencies. Front end css that is not part of the theme.json is
handled by a library called [Bulma](https://bulma.io/). All CSS is compiled from SCSS([Sass](http://sass-lang.com))  files.


## String Replacements

The following list of strings need to be replaced when creating your theme based on Box of Scraps

| String            | Location                                      |
|-------------------|-----------------------------------------------|
| `box-of-scraps`   | Typically used for "domain" for translations  |
| `BoxOfScraps`     | NameSpace within PHP files and classes        |
| `BOX_OF_SCRAPS`   | Constants within PHP                          |
| `boxofscraps`     | ???                                           |
| `Box of Scraps`   | Labels and random things                      |

![Linchpin](https://github.com/linchpin/brand-assets/raw/master/github-opensource-banner.png)