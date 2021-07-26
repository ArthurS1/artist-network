# Artist-Network

This is an example web app.

Run frontend :
```
cd artist-network-front && npm run serve
```

Run backend :
```
cd artist-network-app && php artisan run serve
```

The two parts must be on the same domain or else you will encounter a CORS error
```
127.0.0.1 app.artist-network.local
127.0.0.1 api.artist-network.local
```
