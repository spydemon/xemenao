# Xemenao

## Tests

### Integration tests

First of all, you should flush your testing database manually with the following command:

```shell script
# To run on the xemenao-web Docker container
APP_ENV=dusk php artisan migrate:fresh
```

On the local environment, you can run them with:

```shell
# To run on the xemenao-web Docker container
APP_ENV=dusk php artisan dusk
```
