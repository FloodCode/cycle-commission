# Cycle Commission

### Requirements
- Composer
- MySQL server
- Redis server
- Nginx

### Nginx
###### Modify location directive in nginx site configuration file as folows:
```
location / {
        # First attempt to serve request as file, then
        # as directory, then fall back to displaying a 404.
        try_files $uri $uri/ =404;
}
```

### Installation
1. Clone this git repository
2. Execute `composer update`
3. Copy `.env.example` to `.env` and configure environment variables