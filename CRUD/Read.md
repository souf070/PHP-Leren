# Read

Alle gegevens ophalen en één record bekijken.

## In `src/Controller/NaamController.php`

Plak binnen de klasse uit [LEESMIJ](LEESMIJ.md).

```php
#[Route('/naam', name: 'app_naam', methods: ['GET'])]
public function index(NaamRepository $repository): Response
{
    $items = $repository->findAll();

    return $this->render('naam/index.html.twig', [
        'items' => $items,
    ]);
}

#[Route('/naam/{id}', name: 'app_naam_view', requirements: ['id' => '\d+'], methods: ['GET'])]
public function view(int $id, NaamRepository $repository): Response
{
    $item = $repository->find($id);

    if ($item === null) {
        throw $this->createNotFoundException('Niet gevonden.');
    }

    return $this->render('naam/view.html.twig', [
        'item' => $item,
    ]);
}
```

## In `templates/naam/index.html.twig`

Kopieer het hele blok naar dit Twig-bestand.

```twig
{% extends 'base.html.twig' %}

{% block title %}Overzicht{% endblock %}

{% block body %}
    <h1>Overzicht</h1>

    <a href="{{ path('app_naam_create') }}">Toevoegen</a>

    <ul>
        {% for item in items %}
            <li>
                Nummer: {{ item.id }}
                <a href="{{ path('app_naam_view', {id: item.id}) }}">Bekijken</a>
                <a href="{{ path('app_naam_update', {id: item.id}) }}">Wijzigen</a>
            </li>
        {% else %}
            <li>Geen gegevens gevonden.</li>
        {% endfor %}
    </ul>
{% endblock %}
```

## In `templates/naam/view.html.twig`

Kopieer het hele blok naar dit Twig-bestand.

```twig
{% extends 'base.html.twig' %}

{% block title %}Bekijken{% endblock %}

{% block body %}
    <h1>Gegevens bekijken</h1>

    <p>Nummer: {{ item.id }}</p>

    <a href="{{ path('app_naam_update', {id: item.id}) }}">Wijzigen</a>
    <a href="{{ path('app_naam') }}">Terug</a>

    {{ include('naam/_delete_form.html.twig', {item: item}) }}
{% endblock %}
```

Voor een eigen veld kun je bijvoorbeeld `{{ item.naam }}` toevoegen, als dat veld bestaat. Het verwijderformulier staat in [Delete](Delete.md).
