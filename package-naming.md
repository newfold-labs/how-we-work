# Package Naming

As a general rule, all package names should match the repository name on GitHub.

## Composer Packages

Composer packages follow this [naming convention](https://getcomposer.org/doc/04-schema.md#name):

```
vendor-name/project-name
```

The vendor name for any Composer package should match the GitHub user or organization name. This ensures that vendor 
names only change when a repository moves to another GitHub account or the GitHub user/organization is renamed. 

The project name should match the name of the GitHub repository URL slug.

As a result, Composer package names can be reliably deduced from the GitHub repository URL.

Example:

> The Bluehost Satis repository lives at [https://github.com/bluehost/satis](https://github.com/bluehost/satis). The 
> vendor name would be `bluehost/satis`.

## Node Packages

Node packages follow this naming convention:

```
project-name
```

OR

```
@organization/project-name
```

The organization name, if used, should match the GitHub account name.

The project name should always match the name of the GitHub repository URL slug.
