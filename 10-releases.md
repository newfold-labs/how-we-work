# Releases

## Cadence

- New releases will be issued on Wednesdays every other week (refer to the release calendar for specific dates).
- Updates must be included in a PR by the Wednesday before the scheduled release date to be considered.
    - The PR should include a description of the updates and instructions for testing.
    - Preferably, the PR should include updated tests (see [Tests](12-tests.md) for more information), or at least a video demonstrating the updates.
    - Ensure the PR branch is created in the plugin repository for proper GitHub workflow functionality (package installations and test runs) and branch names follow convention (see [Version Control](9-version-control.md)).
    - PRs without a description or test coverage cannot be merged.

## Compatibility

- All production code must be compatible with the three latest WordPress versions.
- All production code must be compatible with the latest PHP version and any PHP version with more than 5% usage as [per the WordPress stats page](https://wordpress.org/about/stats/#php_versions).

## Release Process, Coordination, and Flow

We have a weekly internal release coordination meeting to discuss the day's release (if applicable) and set up the following release. If you have a PR against the plugin you want included in next week's release, it should be submitted by this call. Please join the call to discuss your PR. Items included and rejected will be discussed. Attendance is optional but recommended for anyone with items they want included in the plugin. All engineering and product team members are welcome to join and participate.

All changes to brand plugins must be made in the form of mergeable PRs against the plugin, often as module updates. PRs need to be submitted by Wednesday to be considered for inclusion in the following Wednesday's release. All other changes are considered out-of-cycle releases and require approval by an engineering director or product VP.

After the meeting, any mergeable and approved PRs will be merged into the `develop` branch of the respective plugin. A `release` branch will then be created from `develop` in preparation for the following week's scheduled release. This `release` branch will have an associated PR targeting `main`, creating builds/artifacts for testing throughout the week. The goal is to create a release PR on Wednesday for the following Wednesday's release, giving everyone a full week to test (treating it like a private beta or release candidate) and making it clear what is included in the release.

In the event a hotfix release is needed, we'll branch from `main` to address the fix.

To further assist in release planning and coordination, we'll use milestones in GitHub to indicate the target release for each PR. These milestones will reference the date initially, and once we've determined the release version, we will add that to the milestone title as well.

### Rolling Release

1. PRs submitted in a mergeable state before the Wednesday call will be considered for the following release.
2. During the Wednesday call:
   - Review PRs tagged for the upcoming milestone and validate the milestone or bump the PR to the following milestone if deemed not mergeable.
   - Merge any remaining approved PRs to the `develop` branch. These can also be merged earlier throughout the cycle when they are approved (PRs do not need to wait for the call to be merged once they are mergeable and approved).
3. End of Day Wednesday:
   - Create a `release` branch from `develop` and create a release PR targeting `main`.
   - Share build files for testing (product managers, engineers, and QA are expected to test the release candidate).
4. Testing:
   - Any issues found during testing will need a clear discussion to determine if the fix is minor enough to be included in the release (PRs for fixes should target the release branch). If a fix cannot be made in time, we will either delay the release or revert the error-prone commit in the release branch, with the expectation that it can be fixed prior to the next release. This will be evaluated on a case-by-case basis, considering the time remaining before release, the severity of the issue, and the expected timeline to fix the issue.
5. Release Wednesday:
   - Merge the release PR into `main` and tag the release. Close the milestone as complete.
   - Merge `main` back to `develop` and start the release process over. Any items discussed in our weekly call should be ready to merge to `develop` and create a new `release` branch and PR. If there are no mergeable PRs, no release branch/PR will be created for the week, but planning for the next release will still be discussed in the call.
