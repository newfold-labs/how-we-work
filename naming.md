# Naming

Logic and math get undue priority in software. Software is the intersection of math and language. 

Terrific logic and pristine math can be obfuscated by terrible language. Terrible logic and math can be hidden by beautiful language.

In reality, good software balances the two. Particularly when software is developed by teams,
naming conventions make a world of difference in communication and preventing silos.

## Best Practices

### Start generic, narrow to specific

* `nf-bluehost-widget-account` > `bluehost-account-widget`

`nf-bluehost-widget-settings` and `nf-hostgator-widget-settings` would follow the pattern. 

Thanks to this structure, `nf-`, `nf-bluehost-`, `-widget-` and `widget-settings` all become helpful strings for searching a codebase.

### Prefer specific to vague

Specificity creates natural ways to grow without needing to rename or rekey generic keys. It also reduces mystery that requires checking databases.

* `nf-account-data` > `nf-account`
* `nf-plugin-updates-cache` > `nf-plugins`

### Use singular equivalent to plural in loops

* `for post in posts` > `for post in items`
* `for post in posts` > `for object in objects`

### Parallelism

Parallelism is a language concept, not a software concept, but it does wonders in software.

Most words have logical pairings:
* Start & Stop
* Begin & End
* Create & Delete (b/c CRUD)
* Login & Logout
* Connect & Disconnect
* On & Off
* Insert & Remove

Try not to mispair and use the logical parallel for a word instead of intermixing.

### Watch out for jargon the belongs in docs, not in data keys and method/variable names
* Avoid data types that belong in type docs like `nf_process_billing_objects()` (`nf_process_bills()`)
* Avoid including API names that can be mentioned in docblocks like `nf_process_billing_post_meta()` (`nf_process_bill_data()`)
* Avoid descriptions in method names like `nf_process_and_http_post_to_billing_api_store_response()` (`nf_billing_sync()`)

## Namespacing

Our language-specific sections delve into standards, but in general we namespace our code for both safety and easy identification.

At Newfold, we use "nf" prefixes before anything in a global namespace.

Even when code is in a namespace like...

```javascript
import { Component } from '@newfold/package';
```
... prefixing can add clarity to avoid confusion and clearly denote our own code.
```javascript
import { Component } from '@wordpress/package';
import { Component } from 'vendor';
import { NFComponent } from '@newfold/package';
```

As a general rule, when writing brand-specific code, prefixes should combine Newfold and the Brand, making searching codebases for our code easier.
```javascript
import { NFBluehostBanner } from '@newfold/bluehost'
```

## Brevity vs. Clarity

When software first came on the scene, characters mattered and abbreviations and truncations were both common and necessary.

* arr
* obj
* str
* stdin

Today computers have more memory but short names still serve a purpose -- they're shorter to type! But in general, clarity often trumps brevity these days.

General Rule: Be as clear as possible, with a close secondary goal of being brief.

When we name folders, name files and name things in general, we lean towards `/includes` over `/inc`, `/scripts` over `/bin` or `/binary`.

## Prefer This, Not That

[STUB]
