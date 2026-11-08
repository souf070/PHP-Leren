# Gegevens toevoegen — Create

Create is een nieuwe auto toevoegen. Eerst maak je een leeg Car-object. Het formulier vult dat object in. Daarna controleer je of het formulier verstuurd én geldig is.

Deze methode hoort **in CarController**. Nodig bovenaan: `use App\Entity\Car;`, `use App\Form\FormType;`, `use Symfony\Component\HttpFoundation\Request;` en `use Doctrine\ORM\EntityManagerInterface;`.

```php
#[Route('/car-add', name: 'app_add_car', methods: ['GET', 'POST'])]
public function add(Request $request, EntityManagerInterface $entityManager): Response
{
    // Maak een lege auto en hang het formulier eraan.
    $car = new Car();
    $form = $this->createForm(FormType::class, $car);
    $form->handleRequest($request);

    // Sla alleen een geldige inzending op.
    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager->persist($car); // Zet klaar om te bewaren.
        $entityManager->flush();       // Schrijf echt naar de database.

        $this->addFlash('success', 'De auto is toegevoegd.');
        return $this->redirectToRoute('app_car');
    }

    return $this->render('car/add.html.twig', ['form' => $form]);
}
```

GET laat het formulier zien; POST verwerkt de inzending. Na opslaan stuur je de bezoeker door met een redirect. Daardoor maakt vernieuwen niet opnieuw dezelfde auto.

Een flash is een eenmalig bericht. Toon het in je basislayout met `{% for message in app.flashes('success') %}{{ message }}{% endfor %}`.

Bron: [Les 11](https://eduinsights.nl/lesson/99ef4705-2f75-470f-8782-0030635ec8b9).
