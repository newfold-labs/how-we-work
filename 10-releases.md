# Releases

## Cadence

- We will issue new release on Wednesdays every other week (refer to the release calendar for specific releases).
- Updates must be included in a PR the Wednesday before the scheduled release date to be considered.
    - The PR should include a description of the updates and instructions for testing.
    - The PR should preferably include updated tests (see [Tests](12-tests.md) page for more) to document these updates, or at least a video showing the updates.
    - When creating the PR branch in the plugin repo so the github workflows function properly (packages can install and tests can run).
    - A PR with no description or test coverage is not able to be merged.

## Compatability

- All production code must be compatible with the 3 latest WordPress versions.
- All production code must be compatible with the latest version of PHP back to any version of PHP with more than 5% 
  usage as [per the WordPress stats page](https://wordpress.org/about/stats/#php_versions).
