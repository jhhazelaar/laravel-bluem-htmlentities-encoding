# Laravel Bluem htlm entities and encode issue

Repo to reproduce bluem iban check with error with html entities and issue with encoding.

## Reproduce

- Clone repo
- Composer install requirements
- run `php artisan iban:check`

Example code is in `app/Console/Commands/IBANCheckCommand.php`
