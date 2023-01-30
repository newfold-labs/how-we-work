# Module Development

Newfold modules are self-contained pieces of functionality that can be used to extend the functionality of a brand
plugin. Modules are developed in their own repositories and are installed as dependencies of brand plugins.

## Expectations

- A single team will be responsible for the development and maintenance of a specific module. This team is referred
  to as the "module owners".
- The module owners are responsible for requesting an architectural review from the WordPress COE team in the early
  stages of any new development.
- The module owners are responsible for following
  the [GitFlow](https://www.atlassian.com/git/tutorials/comparing-workflows/gitflow-workflow) branching model
  and [semantic versioning](https://semver.org/) when
  developing and releasing the module.
- The module owners are responsible for overseeing all code reviews and releases within their module repository.
- The module owners are responsible for writing tests for all new functionality and updating tests for existing
  functionality. Currently, these tests are to live in the brand plugin repositories.
- The module owners are responsible for creating and testing **pre-releases** of the brand plugins that use the module.
- When the module owners determine that a module release and brand plugin pre-release is ready for production, it is
  their responsibility to create a PR against the brand plugin's `develop` branch to update the module version.

## Workflow

The following is a high-level overview of the workflow for developing and releasing a module.

### Pre-Development

- The module owners should request that the WordPress COE team create a repository for your module in the Newfold
  Labs GitHub organization.
- The module repository should be scaffolded before development starts. This can be done by the module owners or the
  WordPress COE team.
- The module owners will need to request that the WordPress COE team add any GitHub secrets to the module repository
  in order to use the GitHub Actions workflows.
- The module owners will need to request an [architectural review](13-architectural-reveiw.md) from the WordPress COE team before a new module
  is allowed to be released.
- After a successful architectural review, the module owners follow the development flow in the next section.

### Development

1. Do all development work in feature branches in the module repository, following the branch naming conventions on the
   [Version Control](9-version-control.md#branch-naming) page. Be sure to start all feature branches from the
   `develop` branch.
2. Create a pull request against the `develop` branch in the module repository when a feature branch is ready for
   review, and merge it only when automated checks pass and at least one other developer approves it.
3. Once all features are in the `develop` branch, start preparing for a release.
4. Create a release branch from the `develop` branch, following the branch naming conventions in
   the [Version Control](9-version-control.md#branch-naming) page.
5. Tag a pre-release version (e.g. `1.0.0-rc.1`) on the module repository.
6. Test the pre-release locally.
7. Create a feature branch on any applicable brand plugin repositories, update the module version to the pre-release
   version, implement any additional integrations, and verify proper coverage via automated tests.
8. Tag a pre-release on the brand plugin repository (e.g. `1.0.0-alpha.1`) for your feature branch, and test the alpha
   release using the build created via GitHub Actions. **Be sure to check the "Set as a pre-release" checkbox when
   creating the release!**
9. If issues are found in the module, create a new PR against the release branch in the module repo with any required
   fixes, repeat steps 5-8 and be sure to increment the release candidate version.
10. If issues are specific to the brand plugin, apply any fixes to the feature branch in the brand plugin repo and
    repeat steps 8-9, making sure to increment the pre-release version.
11. If no issues are found, merge the release branch in the module repository into the `main` branch, tag a new
    production release (e.g. `1.0.0`) and update the feature branch in the brand plugin(s) to use the new release.
12. Create a new pull request from the feature branch in the brand plugin against the `develop` branch. Select at
    least 2 members of the WordPress COE team as reviewers, and notify the WordPress COE team in the `General`
    channel of the `Press 1, 2, 4 Coordination` team in Microsoft Teams.

At this point, your PR has been officially submitted. Code must be submitted by Wednesday the week before a
release is scheduled to go out in order to make it into that release. If any issues are found, the WordPress COE
team may request changes to the PR. If the PR is not ready to be merged by the end of the week, it will be pushed
to the next release.

Keep in mind that the WordPress COE team will **NOT** conduct a full code review of the PR unless you specifically
request it. However, they will review the PR for any obvious issues such as failing tests, missing tests, missing
documentation, failing or missing GitHub Action checks, etc.
