# Le réseau des artistes arthur1.soulie

Lancer le front:
```
cd artist-network-front && npm run serve
```

Lancer le back:
```
cd artist-network-app && php artisan run serve
```

Les 2 doivent être sur le même domaine. Le cas échéant enverra une erreur CORS.
```
127.0.0.1 app.artist-network.local
127.0.0.1 api.artist-network.local
```
