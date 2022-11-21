# WordPress Project Starter

A simple starter for WordPress projects.

---

## Features

- [Composer](https://getcomposer.org/) for Plugin management
- [Lefthook](https://www.npmjs.com/package/lefthook) for Pre-commit hooks
- [WordPress Scripts](https://www.npmjs.com/package/@wordpress/scripts) for JavaScript and CSS bundling
- [TailwindCSS](https://tailwindcss.com/) support in the Theme
- [Github Actions](https://docs.github.com/en/actions) automated assertions for PHP, JS, and CSS linting

---

## Installation

For a new project, delete the `wp-content` directory and clone this repository in its place.

```bash
git clone https://github.com/gregrickaby/wordpress-project-starter wp-content
```

Run `composer install && npm install`

---

## Usage

The root directory holds a minimal set of configs on purpose.

`composer.json` is simply for installing WordPress plugins via Composer for the project.

`package.json` is for installing [Lefthook](https://www.npmjs.com/package/lefthook), which handles pre-commit hooks for git.

`.nvmrc` is for configuring NVM-- the Node Version Manager.

`lefthook.yml` is for configuring Lefthook.

`.gitignore` is for ignoring files that should not be committed to the repository.

---

## Plugin & Theme Development

The `plugins/custom-plugin` directory holds a fully working custom plugin, and `themes/custom-theme` holds a fully working custom theme. Both with their own set of config and linting built upon [WordPress Scripts](https://www.npmjs.com/package/@wordpress/scripts).

---
