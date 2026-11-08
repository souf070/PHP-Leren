# Data ophalen met een repository

Een repository is een zoekloket voor één entity. `findAll()` geeft een lijst objecten. `find($id)` geeft één object of null als het nummer niet bestaat.

Maker maakt normaal ook `CarRepository` aan. Voeg in CarController bovenaan `use App\Repository\CarRepository;` toe. De methoden hieronder horen **binnen die controller**.

```php
// READ: alle auto's ophalen.
#[Route('/car', name: 'app_car', methods: ['GET'])]
public function index(CarRepository $carRepository): Response
{
    $cars = $carRepository->findAll();

    return $this->render('car/index.html.twig', ['cars' => $cars]);
}

// READ: één auto ophalen.
#[Route('/car/{id}', name: 'app_view_car',
    requirements: ['id' => '\d+'], methods: ['GET'])]
public function view(int $id, CarRepository $carRepository): Response
{
    $car = $carRepository->find($id);

    // Zonder auto geven we 404, niet een kapotte pagina.
    if ($car === null) {
        throw $this->createNotFoundException('Auto niet gevonden.');
    }

    return $this->render('car/view.html.twig', ['car' => $car]);
}
```

In de overzichtspagina gebruik je een for-loop over `cars`. In de detailpagina toon je bijvoorbeeld `{{ car.model }}`.

Je kunt ook via `$entityManager->getRepository(Car::class)` bij hetzelfde zoekloket komen. De EntityManager regelt daarnaast het bewaren van objecten.

Bron: [Les 8](https://eduinsights.nl/lesson/053e2b4c-5cf7-4b77-a1cc-982a264b9339).
