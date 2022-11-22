# WordPress Project Starter

An opinionated starter for WordPress projects.

---

## Features

- [Composer](https://getcomposer.org/) for plugin management
- [WordPress Scripts](https://www.npmjs.com/package/@wordpress/scripts) for JavaScript and CSS bundling in the custom theme
- [TailwindCSS](https://tailwindcss.com/) support in the custom theme
- [Lefthook](https://www.npmjs.com/package/lefthook) for pre-commit hooks
- [Github Actions](https://docs.github.com/en/actions) for automated assertions and deployments via RSYNC
- Linting support for popular VS Code extensions like ESLint, Stylelint, Prettier, and PHP Sniffer & Beautifier

---

## Installation

For a new project, delete the `wp-content` directory and clone this repository in its place.

```bash
git clone https://github.com/gregrickaby/wordpress-project-starter wp-content
```

You could also use this repository [as a template](https://github.com/gregrickaby/wordpress-project-starter/generate) for a new project.

Run `npm i` to install the dependencies.

---

## Linting

This project uses ESLint, Stylelint, PHPCS, PHPCBF, and Prettier for code linting and formatting. It also has support for automatic fixing of many linting errors as you save via support for popular VS Code extensions.

If needed, you can still lint from the CLI. From the root of the repository, run the following commands:

`npm run format` - Formats all files using Prettier and PHPCBF

`npm run lint` - Runs ESLint, Stylelint, and PHPCS

Github Actions is also configured to lint code on each Pull Request. Learn more about configuring [branch projection rules](https://docs.github.com/en/repositories/configuring-branches-and-merges-in-your-repository/defining-the-mergeability-of-pull-requests/about-protected-branches) and [status checks](https://docs.github.com/en/repositories/configuring-branches-and-merges-in-your-repository/defining-the-mergeability-of-pull-requests/troubleshooting-required-status-checks).

---

## RSYNC Deployments

This project uses Github Actions to deploy to a remote server via RSYNC.

To use this feature, you'll need to add the following secrets to Github:

- `REMOTE_PRIVATE_KEY` - The private key of the remote server
- `REMOTE_HOST` - The hostname of the remote server
- `REMOTE_USER` - The username of the remote server
- `REMOTE_PATH` - The path to the `/wp-content` directory on the remote server

Learn how to [configure secrets with Github Actions](https://docs.github.com/en/actions/security-guides/encrypted-secrets#using-encrypted-secrets-in-a-workflow) and more about [configuring RSYNC deployments](https://github.com/easingthemes/ssh-deploy).

---
