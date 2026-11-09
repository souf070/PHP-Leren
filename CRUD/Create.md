# Create

Nieuwe gegevens toevoegen met een formulier.

## In `src/Controller/NaamController.php`

Plak binnen de klasse uit [LEESMIJ](LEESMIJ.md).

```php
#[Route('/naam-add', name: 'app_naam_create', methods: ['GET', 'POST'])]
public function create(Request $request, EntityManagerInterface $entityManager): Response
{
    $item = new Naam();
    $form = $this->createForm(NaamType::class, $item);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager->persist($item);
        $entityManager->flush();

        return $this->redirectToRoute('app_naam', [], Response::HTTP_SEE_OTHER);
    }

    return $this->render('naam/add.html.twig', [
        'form' => $form,
    ]);
}
```

## In `templates/naam/add.html.twig`

Kopieer het hele blok naar dit Twig-bestand.

```twig
{% extends 'base.html.twig' %}

{% block title %}Toevoegen{% endblock %}

{% block body %}
    <h1>Toevoegen</h1>

    {{ form_start(form) }}
        {{ form_widget(form) }}
        <button type="submit">Opslaan</button>
    {{ form_end(form) }}

    <a href="{{ path('app_naam') }}">Terug</a>
{% endblock %}
```
