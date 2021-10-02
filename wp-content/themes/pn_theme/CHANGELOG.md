# Changelog

## 1.1.2 -> 1.1.3

1. Default theme directory has been renamed to 'pn_theme'.
2. ACF, PN-WP-Helpers & Query Monitor are now automatically activated on theme activation found in new functions file, `functions/plugins.php`.
3. Default posts, pages and comments are now removed by default.
4. Default permalinks set to '/%postname%/'.
4. Added Composer/NPM updates.
5. Incremented theme version to 1.1.3.

## 1.1.1 -> 1.1.2

1. Stylelint has been integrated into the mix commands so that it does not have to be run manually.

## 1.1.0 -> 1.1.1

1. Stylelint has been added to the project to enforce rules that need to be followed in our .scss files. To view the rules please see the `.stylelintrc.js` file for more info.
2. Husky has been added to run stylelint tests at the pre-commit and pre-push stage to ensure that no errors are pushed to the repository.

## 1.0.5 -> 1.1.0

1. Composer has been added to the project, it will need to be installed by running `composer install` inside the theme directory. This will run the same logic which `tests/setup` used to run, which has been removed.

2. Tests have been removed from the project root and moved into the theme directory. Tests now have to be run inside the theme directory and not inside the project root. The command to run the tests is the same as it was before, `tests/run`.

3. Webpack has been removed in favor of Laravel Mix, please see `package.json` for the relevant scripts which can be run inside the theme directory.

4. The `resources/scss/utils/` directory has been overhauled with a variety of new mixins:
    1. Added `utils/aspect-ratio` - Which includes a variety of mixins used to adjust the aspect ratio of elements.
    2. Added `utils/breakpoints` - Which includes a variety of custom breakpoints.
    3. Added `utils/focal-point` - Which includes a variety of custom mixins to adjust the focal point on elements.
    4. Added `utils/functions` - Which includes a few functions used to handle icons.
    5. Added `utils/position` - Which includes mixins which allow changing the position of elements.
    6. Renamed `utils/mixins` to `utils/helpers`. This will include various helpers which do not fit under the other categories.

5. `package.json` has been cleaned up and removed unnecessary packages.

6. Renamed `index.js` to `app.js` and changed paths in functions file.

7. Added `css-nano` to `webpack.mix.js`.

8. Renamed `starter_acf()` in `functions/acf.php` to `pn_starter_acf` and changed the default name of the settings page to 'General Settings'.
