# Repository Naming

## Issues

There are a few issues we've run into regarding repository naming:

- Inconsistent naming of repositories.
- Confusion around what to name repositories.
- Naming conflicts, such as when a WordPress theme, plugin, or site all have the same name.
- Difficulty searching repositories by technology or platform on GitHub.
- Lack of clarity around what technologies or platform a repository is associated with.
- Legacy repository names due to company or brand name changes. For example, when Endurance suddenly became NewFold,
  most of our repositories also needed to be renamed.

## Naming

The repository naming conventions outlined in this document aim to address all of the [issues](#Issues) previously
mentioned. Most importantly, it cuts down on confusion around what a new repository should be named.

In its simplest terms, the naming convention is:

```
{platform}-{type}-{name}
```

Example:

> Let's say we want to rename the Bluehost WordPress plugin repository to meet our naming conventions. Currently, it is 
> named `bluehost-wordpress-plugin`. The new name would become `wp-plugin-bluehost`. The platform is WordPress, so we 
> abbreviate it to `wp`. This ensures that repository names aren't too long. The project type is a WordPress plugin, 
> so we use `plugin` since the WordPress bit is already defined. The name is just `bluehost` since this is a brand plugin.
>
> We'll also want to make sure that we document proper [cloning process](#Cloning) in the readme file and add the 
> [custom installer name](#Composer-Installers) in the `composer.json`. Additionally, we should assign the following 
> tags: `wordpress`, `wordpress-plugin`, `composer`, `php`, `js`, `react`, `scss`, and `webpack`. (See documentation 
> under the 
> [Tagging](#Tagging) section)

In some cases, it makes sense to simplify the naming. For example, we have a Satis repository that is simply
named `satis`. This name should remain unchanged. The reason being, the platform, type, and name would all be
`satis` and it doesn't make much sense to have a repository named `satis-satis-satis`. In cases of such repetition, we
will simply merge any duplicates together.

Another example of simplification would be our `scaffolding-templates` repository. Since this repository can span 
multiple platforms, we drop the platform prefix. Since this repository applies to multiple project types, we drop 
the type. What we are left with is just the base name.

This naming convention keeps company and brand names out of the repository name in most cases. This ensures that
repositories are evergreen and don't suddenly have legacy names when a company or brand name is changed. The few
exceptions to this would be brand-specific repositories such as the Bluehost and HostGator WordPress plugins.

Below are example repository names grouped by platform.

### AWS Repository Naming

| Name                     | Type
| ------------------------ | ----------
| `aws-lambda-{name}`      | AWS Lambda Function

### Cloudflare Repository Naming

| Name                     | Type
| ------------------------ | ----------
| `cf-worker-{name}`       | Cloudflare Worker

### Gatsby Repository Naming

| Name                     | Type
| ------------------------ | ----------
| `gatsby-{name}`          | Gatsby Monorepo
| `gatsby-plugin-{name}`   | Gatsby Plugin
| `gatsby-site-{name}`     | Gatsby Site
| `gatsby-theme-{name}`    | Gatsby Theme

### GitHub Repository Naming

| Name                     | Type
| ------------------------ | ----------
| `gh-action-{name}`       | GitHub Action

### Laravel Repository Naming

| Name                     | Type
| ------------------------ | ----------
| `laravel-{name}`         | Laravel App
| `laravel-package-{name}` | Laravel Package

### WordPress Repository Naming

| Name                     | Type
| ------------------------ | ----------
| `wp-cli-{name}`          | WordPress CLI Package
| `wp-dropin-{name}`       | WordPress Drop-in
| `wp-module-{name}`       | NewFold WordPress Module
| `wp-plugin-{name}`       | WordPress Plugin
| `wp-plugin-mu-{name}`    | WordPress MU Plugin
| `wp-site-{name}`         | WordPress Site
| `wp-site-network-{name}` | WordPress Multisite
| `wp-theme-{name}`        | WordPress Theme

## Considerations

### Cloning

The name of a repository is used as the directory name when cloning a Git repository. In the event that a cloned
repository needs a specific directory name that doesn't match the repository name, a sample clone command should be
included in the installation section of the documentation.

For example:

```
git clone git@github. com:bluehost/how-we-work.git folder-name
```

### Composer Installers

Repositories that use Composer's [custom installers](https://github.com/composer/installers) will get installed to a
custom location based on the package type. In our case, package types of `wordpress-plugin`', and `wordpress-theme`, are
used frequently. WordPress themes and plugins will typically have a desired directory name that may be at odds with the
naming conventions outlined here. In such cases, we will
utilize [custom install names](https://github.com/composer/installers#custom-install-names).

### GitHub Actions

For WordPress plugins released on WordPress.org, we use
the [10Up WordPress plugin deploy action](https://github.com/10up/action-wordpress-plugin-deploy). If the repository
name doesn't match the plugin slug/directory name, then the `SLUG` must be provided as an environmental variable when
using this GitHub Action.

## Tagging

Tags are a great way of being able to narrow down to a specific platform, technology, or project type. Tags can be
searched by using the `topic:` prefix.

For example:

[https://github.com/orgs/bluehost/repositories?q=topic%3Aaws-lambda&type=all&language=&sort=](https://github.com/orgs/bluehost/repositories?q=topic%3Aaws-lambda&type=all&language=&sort=)

### Platform Tags

| Tag          | Platform
| ------------ | ----------
| `aws`        | Amazon
| `cloudflare` | Cloudflare
| `gatsby`     | Gatsby
| `gh`         | GitHub
| `google`     | Google
| `laravel`    | Laravel
| `wp`         | WordPress

### Technology Tags

| Tag         | Technology
| ----------- | ----------
| `composer`  | Composer
| `js`        | JavaScript
| `node`      | Node
| `php`       | PHP
| `react`     | React
| `postcss`   | PostCSS
| `satis`     | Satis
| `scss`      | SCSS
| `vue`       | Vue
| `webpack`   | WebPack

### Project Type Tags

| Tag                   | Project Type
| --------------------- | ----------
| `aws-lambda`          | AWS Lambda Function
| `cloudflare-worker`   | Cloudflare Worker
| `gatsby-plugin`       | Gatsby Plugin
| `gatsby-site`         | Gatsby Site
| `gatsby-theme`        | Gatsby Theme
| `github-action`       | GitHub Action
| `laravel-app`         | Laravel App
| `laravel-package`     | Laravel Package
| `wordpress-dropin`    | WordPress Drop-in
| `wordpress-network`   | WordPress Multisite
| `wordpress-plugin`    | WordPress Plugin
| `wordpress-plugin-mu` | WordPress MU Plugin
| `wordpress-site`      | WordPress Site
| `wordpress-theme`     | WordPress Theme
| `wp-cli-package`      | WordPress CLI Package
| `wp-module-newfold`   | NewFold WordPress Module
