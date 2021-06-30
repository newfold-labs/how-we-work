# JavaScript

We classify the JavaScript we write into two distinct flavors:
* **WordPress**: Plugins, Themes, Newfold Modules
* **General**: Gatsby, General React, Alpine, etc

## WordPress

### Best Practices

In general, we follow the WordPress Core JS Coding Standards and the Gutenberg Project's standards.

Some additional best practices we emphasize:
* All strings should be translatable with @wordpress/i18n and appropriately namespaced.
* All production JavaScript should be run through @wordpress/scripts or our @newfold/scripts abstraction to avoid re-shipping @wordpress and 3rd-party vendor code, assure proper polyfills and have manifest files that can be referenced programatically.
* Reuse our Newfold Component Library whenever possible.
* Use @wordpress/api-fetch for all HTTP requests.
* Use @wordpress/data for all custom frontend stores.
* For interfaces in the Block Editor, use @wordpress/components.
* For interfaces outside the Block Editor, see the approved list of @wordpress/components below.

#### React & @wordpress/element
* Hooks are preferred over Higher-Order Components, both in custom code and in Gutenberg Packages.
* The entire interface passed to `render()` should be wrapped in `react-error-boundary` as well as error-prone components that rely on API calls. An error state should be created or a <Fragment> should be provided.
* Use of `dangerouslySetInnerHTML` is strongly discouraged, except for markup returned from WP-API (that has proper escaping).

### Style
[STUB]

### Testing
Cypress integration tests are expected for all interfaces. Please aim to write evergreen tests that aren't locked to specific text unless you're writing tests to validate translation.

### Libraries
WordPress has a vast amount of JavaScript available, including React (@wordpress/element), a Redux-like equivalent (@wordpress/data), Lodash AND Underscores, jQuery, Backbone, many other 3rd party vendor scripts and @wordpress packages from the Gutenberg Project. These are always preferred to 3rd party libraries such as Axios. Modern vendor scripts like React are preferred to Backbone and jQuery.

## General

### Best Practices
[STUB]

### Style
[STUB]

### Testing
Cypress integration tests are expected for all customer-facing products.

### Libraries
We are primarily a React shop. We dabble with Alpine when React is overkill and it already comes in a product (i.e. Hiive UI).
[STUB]