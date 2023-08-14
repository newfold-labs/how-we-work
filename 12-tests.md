# Tests

## Types of Testing

### Unit Tests

We utilize PHPUnit for unit testing. Where applicable, unit tests should be written for all new code, or updated
for existing code, by the team developing the functionality or making the change.

### Component Tests

Cypress should be used for component-based testing of React components. Where applicable, component tests should be
written for all new code, or updated for existing code, by the team developing the functionality or making the change.

### End-to-End Tests

Cypress should be used for end-to-end testing of the WordPress environment. Where applicable, end-to-end tests should be
written for all new code, or updated for existing code, by the team developing the functionality or making the change.

#### Module Tests

Each module should include end-to-end cypress tests. The tests should be located in the directory `tests/cypress/integration/`. Brand plugins will load tests for each module in that plugin via the cypress configuration and can test module functoinality in PRs and when publishing releases. Tests should reference cypress environment variables for things like paths which expect the brand. So for instance `'/wp-admin/admin.php?page=bluehost#/settings'` would become `'/wp-admin/admin.php?page=' + Cypress.env('pluginId') + '#/settings')` so it can be implemented in any brand plugin. If any more environment variables are needed they can be added to the `cypress.config.js` file in the plugins for now. If these need to be located in the module, we can work out a way to load them dynamically too.

For more examples, please refer to the ctb or staging modules which have both been updated to include tests and even show how to use fixtures.

This is a change from previous practice where all tests were located in the plugin. The reason for the change is to move the tests into the module so the code they can be located closer to the code they are testing. This also helps with duplication of test files since each test was copied into each brand plugin. When a test needed changing in a module it required updating the test in the each plugin. This adjustment allows the tests to be located closer to the code for which they are written and decrease duplication of test files.

This change also brings us closer to the long term goal of having workflows in the module to run tests before tagging a release. For the time being, we'll need to be sure that tests pass locally before tagging a release so we don't need a series of module releases to get passing tests in the plugin.

## Best Practices

When writing end-to-end tests, test functionality not code. For example, "This page is the color I expect and all 
text is visible", NOT "this page has the CSS class I expect".
