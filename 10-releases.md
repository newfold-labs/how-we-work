# Releases

## Cadence

- Scheduled releases are issued **on Wednesdays**, approximately every three weeks (refer to the release calendar for specific dates).
- **Version semantics:**
  - A scheduled release is typically a **minor** version bump.
  - An out-of-cycle release or hotfix is typically a **patch** version bump.
  - A major initiative update is a **major** release.

## Compatibility

- All production code must be compatible with the three latest WordPress versions.
- All production code must be compatible with the latest PHP version and any PHP version with more than 5% usage as [per the WordPress stats page](https://wordpress.org/about/stats/#php_versions).

## Release Planning (Jira)

We use **Jira releases** to collect work for a release. Tickets have a **Fix Version** field; attach the upcoming release to it so all work is tracked there. All work that goes into a release should have a ticket—no release work without a ticket.

We no longer use release coordination meetings or GitHub milestones for release planning; Jira releases and Fix Version are the source of truth.

**Cutoff:** The cutoff for “what’s in this release” is typically when the Release Candidate is created. Exceptions: issues that may cause a P3 event can be pulled in, and product leads can override what goes into a release.

## Release Process and Flow

Workflows (**Prepare Release** and the release workflow) are run in the **plugin repo on GitHub**, under the **Actions** tab.

### Preparing a Release

The week before a scheduled release (and ad hoc for out-of-cycle releases), we prepare the release:

- Run the **Prepare Release** workflow. It handles:
  - Version bump
  - Updates to build files
  - Updates to language files
- For a **normal (scheduled) release**, base the release off the `develop` branch.
- For **out-of-cycle releases** (e.g. hotfixes), typically base the release off `main`.

### Tests and QA

- **Tests must always pass** for a release.
- Ideally, give the QA team **about a week** to test the Release Candidate before the release goes out.

### Building and Publishing

The **release workflow** prepares and packages the release automatically but **does not push it to customers**. It builds a zip of the plugin and **attaches it to the GitHub release** once the build completes.

- We use an **R2 storage bucket** on the NewFold WP team Cloudflare account. Access and upload details are not documented here (this doc is public); release coordinators should know the process or ask team leads for access.
- After the release is built and **manually tested** by the release coordinator or deputy:
  1. Manually upload the release zip to the **prod free** bucket.
  2. The release system identifies the plugin and version and makes it available at our release endpoint.

So: build → manual testing by release coordinator/deputy → manual upload to prod free bucket → release system serves it at the release endpoint.

### Rollback and hotfixes

As distributed code, we can’t really “roll back” a release. Instead we **issue a hotfix release** (patch version).

If we catch issues **before** the release is placed on R2, we can:
- Delete the release in GitHub and delete the tag.
- Continue working on the Release Candidate in a new PR. The version is already bumped, so we don’t need to run Prepare Release again—just open a fresh PR for the code changes.

## Release lead checklist

Use this checklist when you are running a release (as release lead). Release lead (coordinator or deputy) can be any member of the plugin team. Adjust as needed for your release.

1. **Confirm planning**
   - [ ] Jira release exists for this version.
   - [ ] All work going into the release has tickets with **Fix Version** set to this release.
   - [ ] Ensure work from all tickets is release ready.
   - [ ] Module PRs are merged, module releases tagged, and module bumps included in the plugin.

2. **Prepare the release (week before scheduled release, or when ready for out-of-cycle)**
   - [ ] Base work off `develop` (scheduled) or `main` (out-of-cycle/hotfix).
   - [ ] Run the **Prepare Release** workflow (version bump, build files, language files).
   - [ ] Mark the **draft** PR as ready for review for the tests to run.
   - [ ] Ensure **tests pass**.
   - [ ] If any tests fail, diagnose and fix (in the test suite or by updating and tagging a new module release for flaky or broken tests that weren’t caught earlier).

3. **Release Candidate and QA**
   - [ ] Share Release Candidate for QA.
   - [ ] Allow QA time to test (ideally a week).
   - [ ] Create a change request for this release (Change Management in Newfold’s ServiceNow portal).
   - [ ] Address QA tickets.

4. **Build and publish**
   - [ ] Get required approvals on the Release Candidate PR.
   - [ ] Merge the Release Candidate PR to `main`.
   - [ ] Tag a GitHub release (use the "Generate release notes" button).
   - [ ] Wait for and watch the **release workflow** to produce the package (it does not push to customers).
   - [ ] **Manually test** the built package on a live site—verify no fatal issues or missing files.
   - [ ] **Manually upload** the release zip (from the GitHub release assets) to the **prod free** R2 bucket (NewFold WP team Cloudflare account). Ask team leads for access if needed.
   - [ ] Confirm the release is available at the release endpoint (`https://hiive.cloud/workers/release-api/plugins/newfold-labs/...`).

5. **Cleanup and Housekeeping**
   - [ ] Merge `main` into `develop` to ensure all release changes are reflected there.
   - [ ] Close the release in Jira: update ticket status to closed or move any incomplete tickets to the next release.
   - [ ] Mark the change request as complete (ServiceNow).
   - [ ] Post the release in our Teams **Product Delivery** channel.

### Summary Flow

1. **Planning:** Tickets have Fix Version set to the upcoming Jira release; module work is merged and tagged.
2. **Prepare:** Week before (or ad hoc for out-of-cycle), run the Prepare Release workflow from `develop` (or `main` for hotfixes). Mark draft PR ready for review, ensure tests pass.
3. **QA:** Share Release Candidate, create change request, allow QA time (ideally a week), address QA tickets.
4. **Release:** Get approvals, merge RC PR to `main`, tag GitHub release, run release workflow, manually test the package, upload zip to prod free R2 bucket, confirm availability at the release endpoint.
5. **Cleanup:** Merge `main` into `develop`, close Jira release, complete change request, post in Teams Product Delivery channel.
