## Docker (local dev) — quick reference

* App (nginx) → [http://localhost:8080](http://localhost:8080)
* MySQL (container) → 127.0.0.1:3307  (user: laravel / pass: secret / database: laravel)

Important notes:

* .env is not committed. Copy from .env.example and set DB_HOST=db and DB_PORT=3306 (the app connects to the DB container by container name).
* If you prefer to use your existing dbngin MySQL (port 3306), you can skip the `db` service and set DB_HOST=127.0.0.1 and DB_PORT=3306 in `.env` (but then migrations will run against that DB).
