# Delete

Een record verwijderen via POST met een CSRF-token.

## In `src/Controller/NaamController.php`

Plak binnen de klasse uit [LEESMIJ](LEESMIJ.md).

```php
#[Route('/naam-delete/{id}', name: 'app_naam_delete', requirements: ['id' => '\d+'], methods: ['POST'])]
public function delete(int $id, Request $request, NaamRepository $repository, EntityManagerInterface $entityManager): Response
{
    $item = $repository->find($id);

    if ($item === null) {
        throw $this->createNotFoundException('Niet gevonden.');
    }

    $token = $request->request->getString('_token');

    if (!$this->isCsrfTokenValid('delete_naam_' . $id, $token)) {
        return new Response('Ongeldig formulier.', Response::HTTP_FORBIDDEN);
    }

    $entityManager->remove($item);
    $entityManager->flush();

    return $this->redirectToRoute('app_naam', [], Response::HTTP_SEE_OTHER);
}
```

## In `templates/naam/_delete_form.html.twig`

Kopieer het hele blok naar dit Twig-bestand.

```twig
<form method="post" action="{{ path('app_naam_delete', {id: item.id}) }}">
    <input type="hidden" name="_token"
           value="{{ csrf_token('delete_naam_' ~ item.id) }}">

    <button type="submit">Verwijderen</button>
</form>
```

De detailpagina uit [Read](Read.md) voegt dit formulier al toe met `include`.
