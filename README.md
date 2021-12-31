# Box of Scraps

Box of scraps is a WordPress theme scaffold used when building sites @ [Linchpin](https://linchpin.com). While it can be used as a stand alone, the team typically utilizes with [deploy-scaffold](https://github.com/linchpin/deploy-scaffold)

## How do I use it?

The best approach is to download the latest release zip as a starting point. The release will have everything you need to get started excluding any `composer` or `npm` dependencies.

## Installing Dependencies

### Composer

By default, there are only development related `composer` dependencies, though you can utilize them as needed.

### Yarn/npm

For our frontend, we have numerous dependencies that will be listed here in the future. We typically utilize `yarn` over `npm` for our dependency management, though both will work. If you choose one over the other be sure to mark it within your project.

## String Replacements

The following list of strings need to be replaced when creating your theme based on Box of Scraps

| String | Location                                     |
| ------ |----------------------------------------------|
| `box-of-scraps` | Typically used for "domain" for translations |
| `BoxOfScraps` | NameSpace within PHP files and classes       |
| `BOX_OF_SCRAPS` | Constants within PHP                         |
| `boxofscraps` | ???                                          |
| `Box of Scraps` | Labels and random things |