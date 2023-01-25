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

## Best Practices

When writing end-to-end tests, test functionality not code. For example, "This page is the color I expect and all 
text is visible", NOT "this page has the CSS class I expect".
