# Gegevens verwijderen — Delete

remove() zet een auto op de verwijderlijst. flush() voert het verwijderen echt uit.

Gebruik een POST-formulier met een CSRF-token: een verborgen bewijs dat bij jouw formulier hoort. Je oorspronkelijke toets gebruikt nog een gewone verwijderlink; hieronder staat het verbeterde leerpatroon.

Deze methode hoort **in CarController** met de imports uit Create en onderwerp 09.

```php
#[Route('/car-delete/{id}', name: 'app_delete_car',
    requirements: ['id' => '\d+'], methods: ['POST'])]
public function delete(int $id, Request $request,
    CarRepository $repository, EntityManagerInterface $entityManager): Response
{
    $car = $repository->find($id);
    if ($car === null) {
        throw $this->createNotFoundException('Auto niet gevonden.');
    }

    // Alleen het juiste verborgen kaartje mag deze auto verwijderen.
    if (!$this->isCsrfTokenValid('delete_car_' . $id,
        $request->request->getString('_token'))) {
        return new Response('Ongeldig formulier.', Response::HTTP_FORBIDDEN);
    }

    $entityManager->remove($car);
    $entityManager->flush();

    return $this->redirectToRoute('app_car');
}
```

Dit formulier komt op een Twig-pagina die `car` van de controller krijgt:

```twig
{# POST verstuurt de verwijderaanvraag; het token hoort bij deze auto. #}
<form method="post" action="{{ path('app_delete_car', {id: car.id}) }}">
    <input type="hidden" name="_token"
           value="{{ csrf_token('delete_car_' ~ car.id) }}">
    <button type="submit">Verwijderen</button>
</form>
```

De standaard Symfony-formulieren gebruiken ook CSRF-beveiliging. Een verwijderformulier dat je zelf met HTML bouwt, moet je zelf van een token en servercontrole voorzien.

Bron: [Les 15](https://eduinsights.nl/lesson/0223d6eb-3616-4298-936b-a2da98f80f37).
