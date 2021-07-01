# Present

We currently use (sometimes case insensitive):
* **General Prefixes**: `bluehost`, `bh`, `eig`, `endurance`, `nf`, `mm`
* `\Bluehost\Plugin` in `bluehost-wordpress-plugin`
* `\Newfold\Plugin` in `bluehost-wordpress-plugin`
* `BWA` for component prefixes in `bluehost-wordpress-plugin`
* `\Bluehost\Maestro` in `maestro-connector`
* Modules:
    * `\Endurance_WP_Plugin_Updater`
    * `Endurance\WP\Module\Data`
    * 
* `@bluehost` in `content-platform`

# Proposal
 
Generally move prefixing to `nf*`

## WP-API Namespacing

All Plugins/Modules use `/newfold/{PRODUCT}/v{VERSION}/{ENDPOINT}` regardless of brand.

Ex:
* `/newfold/staging/v3/deply`
* `/newfold/plugin/v2/error`
* `/newfold/bluehost/v1/unique-bluehost-event`
* `/newfold/maestro/v4/action`
* `/newfold/builder/v0/action` (beta/alpha accomodation)
* `/newfold/data/v3/batch`
* `/newfold/notifications/v2`

## PHP Namespaces / Code Splitting 

* `\Newfold` ("super"/"primary" package shared as generic classes between any plugin or module)
    * `\Newfold\Account()` (interact with Newfold Platform account data)
    * `\Newfold\Asset()` (generic class for registering and enqueueing CSS & JavaScript as dependencies)
    * `\Newfold\CLI_Command()` (abstract base)
    * `\Newfold\Database_Routine()` (shared class for running database upgrade routines)
    * `\Newfold\HTTP()` (contains a `cache()` method with standardized transient caching)
    * `\Newfold\Hiive_API()` (extends HTTP)
    * `\Newfold\Permissions()` (generic class for checking user permissions)
    * `\Newfold\Plugin_Updater()`
    * `\Newfold\REST_Endpoint()` (abstract base)
    * `\Newfold\Safe_Boot()` (shared class any plugin or theme can implement to assure platform compat)

* `\Newfold\Plugin` (For all hosting plugins, "THE" plugin, not any plugin -- this could be Platform_Plugin, but brevity?)
    * `\Newfold\Plugin\Install()`
    * `\Newfold\Plugin\Module_Loader()`
    * `\Newfold\Plugin\Updates()`
    * `\Newfold\Plugin\Upgrader()` (runs database routines in plugin and modules)
* `\Newfold\Bluehost_Plugin`
* `\Newfold\HostGator_Plugin`
* `\Newfold\WebCom_Plugin`
* `\Newfold\Maestro``
* `\Newfold\Migrator

* `\Newfold\Module\Admin`
    * `\Newfold\Module\Admin\Admin_Bar()`
    * `\Newfold\Module\Admin\Dashboard_Widget()`
    * `\Newfold\Module\Admin\Mods()`
    * `\Newfold\Module\Admin\Notifications()`
    * `\Newfold\Module\Admin\UI()`
* `\Newfold\Module\Business_Reviews`
* `\Newfold\Module\Builder`
* `\Newfold\Module\Data`
* `\Newfold\Module\Default_Content`
* `\Newfold\Module\Gutenframe`
* `\Newfold\Module\Integrations`
    * `\Newfold\Module\Integrations\AIOSEO()`
    * `\Newfold\Module\Integrations\Creative_Email()`
    * `\Newfold\Module\Integrations\Constant_Contact()`
    * `\Newfold\Module\Integrations\Ecomdash()`
    * `\Newfold\Module\Integrations\Jetpack()`
    * `\Newfold\Module\Integrations\WP_Forms()`
    * `\Newfold\Module\Integrations\WooCommerce()`
* `\Newfold\Module\Mojo_Products`
* `\Newfold\Module\Performance` (née endurance-page-cache)
* `\Newfold\Module\Site_Curtain`
    * `\Newfold\Module\Site_Curtain\Base()`
    * `\Newfold\Module\Site_Curtain\Coming_Soon()`
    * `\Newfold\Module\Site_Curtain\Maintenance()`
* `\Newfold\Module\Staging`
* `\Newfold\Module\Spam_Prevention`
* `\Newfold\Module\SSO`
* `\Newfold\Modue\Tours`
* `\Newfold\Module\WP_API`
* `\Newfold\Module\WP_Cron`
* `\Newfold\Module\WP_CLI`
* `\Newfold\Module\WP_Login`

* `\Newfold\Content_Platform`
* `\Newfold\Content_Platform\Related_Products`
* `\Newfold\Content_Platform\Theme`

* `\Newfold\Hiive` (very low priority if ever as its an isolated environment we control)

# JavaScript Namespacing

Content Platform
* `@newfold\platform`
* `@newfold\platform-components`
* `@newfold\bluehost-blog`
* `@newfold\bluehost-resources`
* `@newfold\corporate-blog`
* `gatsby-theme-bluehost` (extends gatsby-theme-newfold)
* `gatsby-theme-corporate` (extends gatsby-theme-newfold)
* `gatsby-theme-newfold`

WordPress
* `@newfold\scripts` - @wordpress/scripts abstraction that works for Plugins, Modules (Themes?)
* `@newfold\dx-webpack-plugin`
* `@newfold\licenses-webpack-plugin`
* `@newfold\components`

