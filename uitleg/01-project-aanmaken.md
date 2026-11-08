# Project aanmaken

Symfony is een doos met kant-en-klare PHP-hulpmiddelen. Composer haalt de pakketten op. Symfony CLI helpt met opdrachten en de oefenserver.

Dit typ je in een terminal. Het maakt een nieuw oefenproject; het is nu alleen een voorbeeld en wordt niet automatisch uitgevoerd.

```powershell
# Kijk of de programma's er zijn.
php -v
composer --version
symfony version

# Maak een Symfony 7.4-project.
symfony new symfony-basis --version="7.4.*" --webapp

# Ga de projectmap in en start de server.
cd symfony-basis
symfony serve
```

Open het adres dat de terminal toont. Stop de server met **Ctrl+C**.

De belangrijkste mappen:

| Map | Wat zit erin? |
|---|---|
| src | Je PHP-code |
| templates | Twig-pagina's |
| config | Instellingen |
| public | De website-ingang en openbare plaatjes |
| migrations | Bouwplannen voor de database |
| var | Tijdelijke cache en logboeken |
| vendor | Pakketten van Composer |

Klassen schrijf je als `CarController` (PascalCase). Methoden en variabelen als `showCar` en `$carModel` (camelCase). Gebruik duidelijke namen en dezelfde inspringing.

Bron: [Les 3](https://eduinsights.nl/lesson/bd4d93fd-5926-47fb-8581-87ec8f91ceb8).
