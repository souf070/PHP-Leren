# CRUD

- [Create — toevoegen](Create.md)
- [Read — overzicht en detail](Read.md)
- [Update — wijzigen](Update.md)
- [Delete — verwijderen](Delete.md)

## Eenmalig klaarzetten

- Gebruik een bestaand Symfony 7.4-webapp-project met databaseverbinding, Twig, Forms en CSRF ingeschakeld.
- `Naam` = je entity, bijvoorbeeld `Product`. `naam` = de URL- en mapnaam, bijvoorbeeld `product`. Pas dit in alle vier onderdelen hetzelfde aan.
- Maak je eigen velden met Maker; daarna gebruikt het formulier die velden.
- Kopieer **alle vier onderdelen**: de pagina's gebruiken elkaars routes en het verwijderformulier.

Database nog niet aangemaakt? Eerst `symfony console doctrine:database:create`.

```powershell
symfony console make:entity Naam
symfony console make:migration
symfony console doctrine:migrations:migrate
symfony console make:form NaamType Naam
symfony console make:controller NaamController
```

## Begin met deze controller

Vervang de inhoud van `src/Controller/NaamController.php` door dit blok. Plak daarna de methoden uit de vier onderwerpen **binnen de klasse**, op de plek van de opmerking. Zo krijg je geen dubbele index()-methode.

```php
<?php

namespace App\Controller;

use App\Entity\Naam;
use App\Form\NaamType;
use App\Repository\NaamRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class NaamController extends AbstractController
{
    // Plak hier de methoden uit Create, Read, Update en Delete.
}
```

## Basislayout

Gebruik voor deze voorbeelden deze eenvoudige `templates/base.html.twig`. Zo zijn er geen oude menu-links naar Car-routes.

```twig
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{% block title %}CRUD{% endblock %}</title>
</head>
<body>
    {% block body %}{% endblock %}
</body>
</html>
```

## Kort onthouden

- Startpagina = `/naam`.
- Create en Update gebruiken `NaamType`. De Opslaan-knop staat in Twig; voeg in NaamType geen extra SubmitType toe.
- Read toont standaard `item.id`. Voeg voor je eigen velden bijvoorbeeld `{{ item.naam }}` toe als jouw entity een naam-veld met getNaam() heeft.
- Delete werkt met POST en een gecontroleerd CSRF-token.

De bestanden in deze map zijn kopieervoorbeelden. Je originele toetsbestanden worden niet aangepast.
