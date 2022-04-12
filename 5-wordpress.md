# WordPress

We're proud to help millions of customers get online with WordPress.

## Minimum Supported Versions

_Last updated: March 2022_

### WordPress Core

We officially support the last two major releases of WordPress in our products. We always strive for more and expect products to gracefully degrade whenever possible, prompting users to update.

_Major releases of WordPress are 5.6, 5.7, 5.8 not WordPress 3.x or WordPress 4.x._

### Browser Support

We follow the @wordpress/browserlist-config. We do not support any version of Internet Explorer.

Generally we support:
* Browsers with >1% usage.
* Last 2 Firefox, Safari, iOS Edge and Opera versions.
* Last 1 Android, Chrome Android versions.

### PHP

WordPress provides recommendations and minimums.

At writing (April 2022), WordPress recommends PHP 7.4 and supports 5.6.20+.

We currently support two point releases below WordPress' recommendation -- all our products must work 100% two point releases below the recommendation.

We expect our code to execute error-free in any minimum version WordPress supports. However, we do not expect our products to be fully-functional or even functional with PHP 5.x. Reduced functionality or throwing up an upgrade screen are both acceptable if faced with writing PHP 5.x-7.1 compatible code.

## There's enterprise WordPress... and then there's enterprise shared WordPress hosting. 

We run into many of the security and performance requirements of Enterprise-grade WordPress in our products, while uniquely needing to be resilient, efficient and considerate to the fact they run in millions of different configurations for a wide spectrum of customers.

In most enterprise WordPress environments, engineers can exercise tight, end-to-end control over the server, site configuration and available features.

In enterprise shared hosting, we need to keep customers safe and fast, while giving them as much control as we can. Even in our managed server environments, we often can't get prescriptive about WordPress Plugins or Themes.

So we need to balance smart defaults and recommendations to help users who don't know their technical requirements, with flexibility and control for users who do.
