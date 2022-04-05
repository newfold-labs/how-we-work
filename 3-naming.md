# Naming

Consistient, predictable and clear naming standards set us up for maintainable, secure, testable and easier-to-learn codebases. 

Clear and tidy code makes it easier to catch issues, onboard and collaborate with coworkers, unlock our potential to scale and achieve the greatest possible quality.

While we recognize Newfold Labs codebases have often come from legacy codebases with some necessary compromises to these standards, they should be followed in all new codebases.

We have naming standards for...
* Projects (Packages & Repositories)
* Files & Directories
* Global namespaces

## General Principles

### Avoid inappropriate, expired and hurtful language

Strive for modern, inclusive and professional language.

* Do not use expired technical termonology, including ones with racist, abelist or gendered origins.
* Do not unnecessarily ascribe gendered pronouns.
* There is a time and place for humor, but good humor doesn't hurt.

If you have questions, please reach out to your manager or the Newfold Labs team.

### Jargon and data types belong in documentation

Technical jargon, description of mechanics and data types most often belong in inline documentation and README files, not in class names, function names, variable names or file names. If a name feels like it's describing mechanics or technical minutae instead of business purpose, it can likely be improved.

* `$response` over `$response_obj`
* `$theme` over `$theme_arr`
* `get_platform_config()` over `http_post_to_platform_api_for_config()`
* `update_site_log()` over `update_site_log_object_in_db()`

### Names never exist in a vaccuum

Consider the names of adjacent code & products within the organization and greater ecosystem (whether they're "well-named" or not). Names that are too similar are a tripping hazard and confusion point. 

Keep in mind not only what is currently named, but what's could come in the future.

### Aim for parallel language construction

`Contact` & `About` or `Contact Us` & `About Us` -- please don't mix and match.

Also maintain nomenclature -- don't call the same feature "options", "tools" and "preferences" in different places across an application interface, codebase and documentation. Some of this is inevitable overtime, but please strive to keep API endpoints, code, interface strings and documentation in sync.

### Use appropriate pairs

Don't intermix words like `start` and `end` -- words have natural pairs.

* `begin` and `end`
* `start` and `stop`|`finish`
* `on` and `off`
* `add` and `remove`
* Don't mix CRUD with get, set, etc.

### Avoid unnecessary truncation

Visually parsing abbreviations burns daylight and makes code less-readable. We're no longer in a time where we need to conserve characters due to memory limits.

With a few notable exceptions like `ID` for `identifier`, `JS` for `JavaScript`, and common ecosystem shortand like `${thing}_args` in WordPress, avoid excessive truncation. This aides with adoption across skill levels, language and makes code more readable.

* `$video_attributes` or `$video_meta` over `$video_attr`, `$video_att`, `$video_meta_atts`, etc.
* `$service_id` over `$s_id`.
* `$version` over `$ver`.

### Avoid redundancy

Calling a file `Admin_Page.php` when it's inside a folder called `/admin` creates redundancy both in file path and PHP Namespace:

* `/wp-plugin-brand/admin/Admin_Page.php`
* `WP\Plugin\Admin\Admin_Page.php`

In this case, the redundancy adds noise to process instead of beneficial clarity.

### Avoid oversimplifying

While at face value `wp-module-cache` is fairly simple and a decent name, it can be improved. It's not very clear exactly what the codebase does. File caching? Object caching? Fragment caching? Engineers know what caching is, but others may not.

While `wp-module-object-cache` is more specific, consider the broader picture:
* Is it desired to have separate modules for each kind of cache?
* Are there other related features? (i.e. `wp-module-asset-minification`)

Would `wp-module-performance` be better? It's broad like `wp-module-cache`, but talking about "the performance module" is something any stakeholder can understand. There can be specific files for each type of caching within the module. 

#### Far from a hard rule but a helpful framework...

* Product names should be driven by business purpose.
* File & folder names driven by technology, location or feature.
* Function names driven by task.

### Spell proper nouns (brand names and product names) correctly

Always check a company or product site for the proper spelling and casing.

| ❌ Common mistakes | ✅ Correct use
| ------------------ | --------------
| `Wordpress`        | WordPress
| `JetPack`          | Jetpack
| `Webpack`          | webpack
| `NewFold`          | Newfold
| `BlueHost`         | Bluehost
| `NPM`              | npm
| `Javascript`       | JavaScript
| `GMail`            | Gmail
