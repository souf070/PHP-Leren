# Maken van een controller

Een controller is een verkeersregelaar: hij ontvangt een aanvraag en kiest welke pagina je terugkrijgt.

Dit commando maakt `src/Controller/CarController.php` en `templates/car/index.html.twig` in een Symfony-project.

```powershell
# Laat Symfony een controller met een bijbehorende pagina maken.
php bin/console make:controller CarController
```

Bron: [Les 4](https://eduinsights.nl/lesson/01d5f84a-9f65-41e7-9fcb-c6433a647ace).

Dit is een kleine complete controller. Het Twig-bestand moet wel bestaan. De naam eindigt op Controller en staat in het enkelvoud.

```php
<?php

namespace App\Controller;

// Dit zijn de hulpmiddelen voor een controller, antwoord en route.
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CarController extends AbstractController
{
    // Bij /car voert Symfony de functie hieronder uit.
    #[Route('/car', name: 'app_car', methods: ['GET'])]
    public function index(): Response
    {
        // render laat een Twig-bestand omzetten naar HTML.
        return $this->render('car/index.html.twig');
    }
}
```
