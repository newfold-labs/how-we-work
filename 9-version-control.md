# Version Control

We use [Git](https://git-scm.com/) to manage our code and use [GitFlow](https://www.atlassian.com/git/tutorials/comparing-workflows/gitflow-workflow) as our workflow. Whenever possible, simply create a branch on the project repo rather than forking to another repository. This is because there are some workflows that only run on the main repository (such as build steps and cypress cloud test submission). For testing it is important to have these workflows and artifacts in place. If you do not have proper permission to create a branch on the repository in question, please request access.

## Branch Naming

For each branch type defined by GitFlow, the following branch naming patterns are acceptable:

| Branch Type | Pattern |
| --- | --- |
| main | `main` (preferred)<br/>`master`<br/>`trunk` |
| hotfix | `hotfix/*` - where `*` represents the semantic version number (e.g. `hotfix/1.2.1`) |
| release | `release/*` - where `*` represents the semantic version number (e.g `release/1.2.0`) |
| develop | `develop` |
| feature | `feature/*` - new feature<br/>`add/*` - new feature<br/>`update/*` - improve an existing feature<br/>`fix/*` - non-urgent bugfixes<br/>`try/*` - experiments<br/><br/>The asterisks can be replaced with a descriptive name, or a ticket number. |

## Releases and Pre-Releases

All production releases for brand plugins should be tagged by the WordPress COE team. Module releases and brand 
plugin pre-releases can be tagged by anyone, but **MUST** be
[marked on GitHub as a pre-release](https://docs.github.com/en/repositories/releasing-projects-on-github/managing-releases-in-a-repository#:~:text=To%20notify%20users%20that%20the%20release%20is%20not%20ready%20for%20production%20and%20may%20be%20unstable%2C%20select%20This%20is%20a%20pre%2Drelease.).

Failure to properly name and mark a release as a pre-release can result in the release being automatically deployed to production.

### Tagging

Release version tags should adhere to [semantic versioning](https://semver.org/) an only be tagged on the applicable
branches:

| Tag | Branch                   | Examples |
| --- |--------------------------| --- |
| X.Y.Z | `main`, `master`, `trunk` | `1.2.0` |
| X.Y.Z-rc.N | `hotfix/1.2.1`           | `1.2.1-rc.1`, `1.2.1-rc.2` |
| X.Y.Z-rc.N | `release/1.2.0`          | `1.2.0-rc.1` `1.2.0-rc.2` |
| X.Y.Z-alpha.N | `develop`                | `1.2.2-alpha.1`, `1.2.2-alpha.2` |
| X.Y.Z-beta.N | `develop`                | `1.2.2-beta.1`, `1.2.2-beta.2` |

Capital letters represent the numbers that are changeable. Lowercase letters represent the numbers that are fixed.

**X** = major version number<br/>
**Y** = minor version number<br/>
**Z** = patch version number<br/>
**N** = release candidate, alpha, or beta number

#### Notes on versioning

- An alpha release is open to adding new features
- A beta release is open to adding bugfixes
- A release candidate is a stable release that is not ready for production

## Code Review & Release Restrictions

- All teams will handle code reviews and releases internally for any repositories they are responsible for.
- All teams can request a code review from the WordPress COE team at any time. 
- All teams are expected to request an architectural review from the WordPress COE team in the early stages of any 
  new development.
- All code merged into the `develop` branch of any repository must be done as a pull request which is to be reviewed by
  at least one other member from the same team.
- All releases on the `main` branch for **brand plugins** must be handled by the WordPress COE team.
- All releases on the `main` branch for **modules** must be handled by the team that owns the module.
- All **pre-releases** on the `develop`, `release/*`, or `hotfix/*` branches can be done by anyone on 
  any repository as long as the proper conventions are followed.
- Tests should be written for all new code, or updated for existing code, by the team developing the functionality 
  or making the change.
- No pull requests are to be merged until it has:
    - At least one code review
    - All tests pass
    - Linting passes
    - Tests are written for any new features or code changes

## GitHub Actions

| Stage | Trigger | Actions |
| --- | --- | --- |
| Feature | On push to a feature branch | Run linting and tests. Run a build (plugins & themes only) |
| Develop | On push or PR to the develop branch<br/> On alpha or beta release | Run linting and tests. Run a build (plugins & themes only)<br/> Run linting and the full test matrix. Run a build (plugins & themes only) |
| Release | On push or PR to a release branch<br/> On a release candidate release | Run linting and tests. Run a build (plugins & themes only)<br/> Run linting and the full test matrix. Run a build (plugins & themes only) |
| Hotfix | On push or PR to a hotfix branch<br/> On a release candidate release | Run linting and tests. Run a build (plugins & themes only)<br/> Run linting and the full test matrix. Run a build (plugins & themes only) |
| Main | On push to the main branch | Run linting and full test matrix. Run a build (plugins & themes only) |

