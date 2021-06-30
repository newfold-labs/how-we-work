# PHP

We classify the PHP we write into two distinct flavors:
* **WordPress**: Plugins, Themes, Newfold Modules & WP-CLI Packages
* **General**: Laravel, PHP CLI scripts, etc

## WordPress PHP

While WordPress supports PHP 5.6.20+, our minimum supported version is PHP 7.0+.

The one caveat is that we expect all products to support PHP 5.6 with graceful degredation and no fatal errors, throwing up a notice to upgrade. [MODULE COMING SOON]

### Best Practices

In general, we follow the WordPress Core PHP Coding Standards.

Some additional best practices we emphasize:
* All strings should be translatable and appropriately namespaced.
* Use PHP Namespaces for classes, functions and constants.
* Reuse Core APIs, methods and interfaces whenever possible and Newfold branding isn't important.
* Never register anonymous functions to WordPress Hooks.
* Minimize reading and writing the filesystem whenever possible.
* All HTTP GET requests should have transient-based cache unless realtime updates are essential.
* All media and files should be properly stored in the WordPress Directory Structure and ideally managed via WordPress' PHP and REST APIs.
* Avoid adding custom WP-API REST Endpoints when Core equivalents exist.
* Avoid direct MySQL queries using the $wpdb global. Absolutely escape any custom queries.
* Avoid JSON string storage in metadata tables.

### Security

General Hard Rule: Late-escape all output, sanitize and validate all input, always always check user permissions.

Some miscelaneous rules
* Always use nonces and current_user_can(), even when relying on WP-Admin cookie authentication.
* WP-API endpoints are strongly preferred to Admin AJAX callbacks.

### Patterns

[STUB]

### Libraries

In general, we look first to libraries that ship in WordPress such as simplepie and phpmailer.

Otherwise, we expect all PHP packages to have a GPL-compatible license, have robust test coverage, be actively maintained and ideally have regular security audits.

### Testing

WordPress Code should have PHPUnit tests for all mission-critical functions. All WordPress interfaces should have Cypress integration tests.

## General PHP

### Best Practices
[STUB]

### Security
[STUB]

### Patterns
[STUB]

### Libraries
[STUB]
