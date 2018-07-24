# WP My Plugin
Plugin for wordpress, this is an example of readme file

## Version 0.0.1

## Requirements
- WordPress >= 4.4.1
- WooCommerce >= 3.6.0
- php >= 5.6

## Install in production environment
Run `composer install --no-dev`

## Support languages
- Spanish Colombia (es_CO)
- Spanish (es)
- English (en)

## Start with Docker
### Requirements
- docker 17.04.0+
- docker-compose 1.17.0

### Running with docker directly
```
> docker-compose up -d
> docker exec -u 1000:1000 -it wp_my_plugin_wordpress composer install -d ./wp-content/plugins/wp-my-plugin
```

### If support for Makefile exists
```
> make install
```

The container listen in port 8080: `http://127.0.0.1:8080/`