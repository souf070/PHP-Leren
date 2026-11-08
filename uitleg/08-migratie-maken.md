# Een migratie maken en uitvoeren

Een migratie is een bouwplan voor je database. Eerst verander je de entity. Daarna laat je Symfony een bouwplan maken. Ten slotte voer je dat bouwplan uit.

Deze opdrachten voer je uit **vanuit een bestaand Symfony-project**. `DATABASE_URL` in je omgevingsinstellingen moet naar jouw oefendatabase wijzen.

```powershell
# Alleen nodig als jouw ingestelde database nog niet bestaat.
php bin/console doctrine:database:create

# Maak een bouwplan op basis van de gewijzigde entities.
php bin/console make:migration

# Voer de bestaande bouwplannen uit.
php bin/console doctrine:migrations:migrate

# Controleer of de database bij de entities past.
php bin/console doctrine:schema:validate
```

Een gegenereerde migratie staat in `migrations/Version....php`. `up()` voert wijzigingen uit; `down()` draait ze terug. Je hoeft de SQL meestal niet zelf te schrijven.

De les gebruikt onder andere MySQL met phpMyAdmin. Controleer daar de tabel en kolommen als je MySQL gebruikt. SQLite is een andere database en werkt niet via phpMyAdmin.

Onthoud: **entity → migratie maken → migratie uitvoeren**. Alleen `make:entity` uitvoeren maakt nog geen tabel.

Bron: [Les 7](https://eduinsights.nl/lesson/344db92d-ea26-4667-86ef-55e1a308c274).
