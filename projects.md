# Projects

## Philosophies
* Fail on "paper" before going to code.
[STUB]

## Starting a Project

When starting a project, whether pioneering a new product or enhancing an existing product, we always start by...
- [ ] Review any existing code that's related in our organization
- [ ] Review similar products in the WordPress ecosystem
- [ ] Discover & Review any libraries we plan to use or that can serve as prior art
- [ ] When UI is involved, review any relevant Component Libraries (@wordpress/components, @newfold/components, Bluebird UI, etc)
- [STUB]

## Peer Architecture & Coding

Many hands make light work. Two (or more) minds are better than one.

When architecting a solution, it's strongly encouraged to vet your plans with a teammate.

Peer Coding is encouraged when both parties think it would be beneficial.

Peer Debugging and "Sanity Checks" are strongly encouraged, particularly when deadlines are involved.

## Submitting a Pull Request

During development, well before you're preparing for review, a draft PR should be opened such that GitHub Actions can begin running integration tests and other validation against changes so there aren't surprises once you think you're done.

* [ ] Code is linted and follows established Coding Standards for language.
* [ ] Code is checked for local development testing, error-logging and placeholder content.
* [ ] Code is translatable and accessible.
* [ ] Code has inline documentation and adequate supporting documentation.
* [ ] Code has been thoroughly executed on Newfold hosting platform(s) where it will run for customers.
* [ ] PR has adequate instructions for testing and validating new changes.
* [ ] PR has useful Title and Commits.
* [ ] If new/major refactor, provide a couple screenshots.
[STUB]

## Reviewing a Pull Request

* [ ] Above all, watch for potential security issues, issues that could fatal a website, issues that could lock up a server, etc.
* [ ] Does this have translatable strings?
* [ ] Does this pass accessibility checks?
* [ ] Does this need to be tested across multiple browsers, versions of X, etc?
* [ ] Does this interface render well at multiple common screensizes?
* [ ] Does this rely on API calls? Are errors handled gracefully?
* [ ] Does this code present performance concerns in high-traffic or large-database environments?
* [ ] Are there defensive checks for accessing collection properties?
* [ ] Have authorization and user permissions been appropriately checked?
[STUB]

## Definition of Done
* [ ] Code is linted and follows established Coding Standards for language.
* [ ] Code is checked for local development testing, error-logging and placeholder content.
* [ ] Code is translatable and accessible.
* [ ] Code has inline documentation and adequate supporting documentation.
* [ ] Code has been thoroughly executed on Newfold hosting platform(s) where it will run for customers.
* [ ] Code has received one or more peer reviews.
[STUB]

