# Update

Bestaande gegevens ophalen, aanpassen en opslaan.

## In `src/Controller/NaamController.php`

Plak binnen de klasse uit [LEESMIJ](LEESMIJ.md).

```php
#[Route('/naam-update/{id}', name: 'app_naam_update', requirements: ['id' => '\d+'], methods: ['GET', 'POST'])]
public function update(int $id, Request $request, NaamRepository $repository, EntityManagerInterface $entityManager): Response
{
    $item = $repository->find($id);

    if ($item === null) {
        throw $this->createNotFoundException('Niet gevonden.');
    }

    $form = $this->createForm(NaamType::class, $item);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager->flush();

        return $this->redirectToRoute('app_naam', [], Response::HTTP_SEE_OTHER);
    }

    return $this->render('naam/update.html.twig', [
        'form' => $form,
    ]);
}
```

## In `templates/naam/update.html.twig`

Kopieer het hele blok naar dit Twig-bestand.

```twig
{% extends 'base.html.twig' %}

{% block title %}Wijzigen{% endblock %}

{% block body %}
    <h1>Wijzigen</h1>

    {{ form_start(form) }}
        {{ form_widget(form) }}
        <button type="submit">Opslaan</button>
    {{ form_end(form) }}

    <a href="{{ path('app_naam') }}">Terug</a>
{% endblock %}
```
