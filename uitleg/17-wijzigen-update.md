# Gegevens wijzigen — Update

Update verandert een bestaande auto. Je haalt hem eerst op met find(). Geef die auto aan het formulier mee: de vakjes zijn dan al ingevuld.

Deze methode hoort **in CarController**, met dezelfde imports als bij Create en de CarRepository-import uit onderwerp 09.

```php
#[Route('/car-update/{id}', name: 'app_update_car',
    requirements: ['id' => '\d+'], methods: ['GET', 'POST'])]
public function update(int $id, Request $request,
    CarRepository $repository, EntityManagerInterface $entityManager): Response
{
    $car = $repository->find($id);
    if ($car === null) {
        throw $this->createNotFoundException('Auto niet gevonden.');
    }

    // Het formulier begint met de bestaande waarden.
    $form = $this->createForm(FormType::class, $car);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager->flush();
        return $this->redirectToRoute('app_car');
    }

    return $this->render('car/update.html.twig', ['form' => $form]);
}
```

De update-Twig kan hetzelfde formulier tonen als bij Create. Alleen het opschrift en de knoptekst veranderen.

De les en jouw toets gebruiken ook persist() bij wijzigen. Doctrine volgt een met find() opgehaalde auto al, dus persist() is hier overbodig; flush() schrijft de wijzigingen.

Bron: [Les 15](https://eduinsights.nl/lesson/0223d6eb-3616-4298-936b-a2da98f80f37).
