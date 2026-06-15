# Fetch Docs — Shared Documentation for Any Project

Automatically clones the [how-we-work](https://github.com/newfold-labs/how-we-work) documentation into your project during dependency installation. The docs land in `.docs/how-we-work/`, which is git-ignored so they never get committed into your repo.

## Setup

### Prerequisites

- **Git** must be installed and available on the system `PATH`.

### 1. Add the `.gitignore` entry

Add the following to your project's `.gitignore`:

```
.docs/
```

### 2. Copy the script

Copy the appropriate script file into a `scripts/` directory at the root of your project:

| Project type | Script to copy            |
|-------------|---------------------------|
| PHP         | `scripts/fetch-docs.php`  |
| JavaScript  | `scripts/fetch-docs.js`   |

### 3. Wire up the post-install hook

#### PHP (Composer)

Add the following to your `composer.json`:

```json
{
    "scripts": {
        "fetch-docs": "NewfoldLabs\\Scripts\\FetchDocs::fetch",
        "post-install-cmd": [
            "@fetch-docs"
        ],
        "post-update-cmd": [
            "@fetch-docs"
        ]
    },
    "autoload": {
        "classmap": [
            "scripts/"
        ]
    }
}
```

If your `composer.json` already has `scripts` or `autoload` sections, merge the entries into the existing objects rather than replacing them.

After adding the autoload entry, run `composer dump-autoload` once so Composer picks up the new class.

#### JavaScript (npm)

Add the following to your `package.json`:

```json
{
    "scripts": {
        "fetch-docs": "node scripts/fetch-docs.js",
        "postinstall": "npm run fetch-docs"
    }
}
```

If your `package.json` already has a `scripts` section, merge these entries in. If a `postinstall` script already exists, chain the commands:

```json
{
    "scripts": {
        "postinstall": "existing-command && npm run fetch-docs"
    }
}
```

## Usage

Once set up, the docs are fetched automatically — no extra steps needed.

| Command              | What happens                                            |
|---------------------|---------------------------------------------------------|
| `composer install`  | Installs dependencies, then clones/updates the docs     |
| `composer update`   | Updates dependencies, then clones/updates the docs      |
| `npm install`       | Installs dependencies, then clones/updates the docs     |

You can also fetch the docs manually at any time:

```bash
# PHP
composer run fetch-docs

# JavaScript
npm run fetch-docs
```

## How it works

1. On first run, the script performs a **shallow clone** (`git clone --depth 1`) into `.docs/how-we-work/`.
2. On subsequent runs, it does a **fast-forward pull** (`git pull --ff-only`) to grab the latest changes.
3. If the clone or pull fails (e.g. no network), a warning is printed but the install **is not blocked** — it fails gracefully so CI and offline development are not disrupted.

## File structure

```
your-project/
├── scripts/
│   ├── fetch-docs.php    ← PHP projects
│   └── fetch-docs.js     ← JavaScript projects
├── .docs/
│   └── how-we-work/      ← cloned automatically (git-ignored)
├── .gitignore             ← contains .docs/
├── composer.json          ← PHP hook config
└── package.json           ← JavaScript hook config
```
