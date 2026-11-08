# Symfony — uitleg per onderwerp

Kies hieronder één onderwerp. Je krijgt steeds een korte uitleg met een klein codevoorbeeld.

De oorspronkelijke toetsbestanden staan in **b toets**. Deze map uitleg bevat alleen leesmateriaal: er is geen extra Symfony-app gebouwd of geïnstalleerd.

De voorbeelden zijn **losse leerstukjes voor een Symfony 7.4-project**. Een stukje dat “binnen de controller” hoort, plak je niet los in een PHP-bestand. Verschillende onderwerpen laten soms dezelfde route opnieuw zien: het zijn alternatieve voorbeelden, niet allemaal tegelijk toe te voegen acties.

| Onderwerp | Open dit bestand |
|---|---|
| Project starten en mappen | [01 — Project aanmaken](01-project-aanmaken.md) |
| Controller | [02 — Controller maken](02-controller-maken.md) |
| Routes en id's | [03 — Routes en parameters](03-routes-en-parameters.md) |
| Data, if en for in Twig | [04 — Data naar Twig](04-data-naar-twig.md) |
| Extends, blocks en include | [05 — Layout en navigatie](05-layout-en-navigatie.md) |
| Afbeeldingen en Bootstrap-kaarten | [06 — Afbeeldingen en kaarten](06-afbeeldingen-en-kaarten.md) |
| Entity en getters/setters | [07 — Entity maken](07-entity-maken.md) |
| Migratie en database | [08 — Migratie maken](08-migratie-maken.md) |
| Repository, find en findAll | [09 — Data ophalen](09-data-ophalen.md) |
| FormType en Twig-formulier | [10 — Formulier maken](10-formulier-maken.md) |
| Create, persist en flush | [11 — Toevoegen](11-toevoegen-create.md) |
| Invoer controleren | [12 — Validatie](12-validatie.md) |
| ManyToOne en OneToMany | [13 — Relaties](13-relaties-maken.md) |
| Categorie-keuzelijst | [14 — Relatie in formulier](14-relatie-in-formulier.md) |
| Gegevens uit twee tabellen | [15 — Master-detail](15-master-detail.md) |
| Bar, line en pie | [16 — Grafiek](16-grafiek-maken.md) |
| Update | [17 — Wijzigen](17-wijzigen-update.md) |
| Delete, POST en CSRF | [18 — Verwijderen](18-verwijderen-delete.md) |
| Gerichter zoeken | [19 — QueryBuilder](19-querybuilder.md) |

## De vier CRUD-woorden

Create = toevoegen. Read = bekijken. Update = wijzigen. Delete = verwijderen.

Browser → route → controller → database/repository → Twig → browser.

MVC: Model is je gegevenslaag met entities, View is Twig, Controller is de verkeersregelaar.

## Welke Edulinsights-inhoud is gebruikt?

De eerder gelezen theorie van les 3–8 en 11–15 is per onderwerp uitgelegd in eigen woorden en voorbeelden. Les 9 is een herhaling van eerdere stof; les 10 had nog geen inhoud. De inhoud van les 16 kon niet worden gelezen: het QueryBuilder-bestand is duidelijk gemarkeerd als eigen aanvulling. Ook het korte EntityType-voorbeeld is een aanvulling om het formulier aan de relatie te koppelen.

Dit is geen letterlijke kopie van alle presentaties en opdrachten. De bestaande toetscode blijft ongewijzigd. De verbeterde voorbeelden bij verwijderen en onbekende id's staan alleen in deze uitleg.

Tip voor VS Code: open een .md-bestand en druk op **Ctrl+Shift+V** voor een leesbare weergave.
