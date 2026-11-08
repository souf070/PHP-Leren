# Routes en parameters

Een route koppelt een adres aan een functie. Eén controller mag meerdere routes hebben. De routenaam is een bijnaam voor links; `{id}` is het nummer uit de URL.

Dit zijn twee methoden **binnen CarController**. Gebruik de Route- en Response-imports uit het vorige onderwerp.

```php
// /car-info opent de algemene informatie.
#[Route('/car-info', name: 'app_car_info', methods: ['GET'])]
public function info(): Response
{
    return new Response('Hier vind je informatie over auto’s.');
}

// Bij /car-nummer/5 wordt $id het getal 5.
#[Route('/car-nummer/{id}', name: 'app_car_nummer',
    requirements: ['id' => '\d+'], methods: ['GET'])]
public function nummer(int $id): Response
{
    return new Response('Je koos auto nummer ' . $id);
}
```

In Twig maak je zo een link naar nummer 5:

```twig
{# path zoekt de route en vult id in. #}
<a href="{{ path('app_car_nummer', {id: 5}) }}">Auto 5</a>
```

Gebruik unieke routenamen. GET vraagt gegevens op; POST verstuurt een formulier.

Bron: [Les 6](https://eduinsights.nl/lesson/03842e52-6c37-4eeb-8fcf-f8e37f071724).
