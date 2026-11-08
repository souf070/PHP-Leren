# Een master-detailpagina maken

Master is het lijstje waaruit je kiest. Detail is wat bij die keuze hoort. Klik op een categorie en toon de auto's uit die categorie.

De les gebruikt laptops; dit voorbeeld gebruikt auto's. Het gaat uit van de relatie uit onderwerp 13. Deze methode hoort **binnen CategoryController**, met de imports voor Route, Response en CategoryRepository.

```php
#[Route('/categorie/{id}', name: 'app_category_detail',
    requirements: ['id' => '\d+'], methods: ['GET'])]
public function detail(int $id, CategoryRepository $repository): Response
{
    // Zoek de gekozen categorie.
    $category = $repository->find($id);

    if ($category === null) {
        throw $this->createNotFoundException('Categorie niet gevonden.');
    }

    return $this->render('category/detail.html.twig', [
        'category' => $category,
    ]);
}
```

In `templates/category/detail.html.twig` volg je de relatie zo:

```twig
<h1>{{ category.name }}</h1>

{# category.cars roept getCars() op en volgt de relatie. #}
{% for car in category.cars %}
    <p>{{ car.vendor }} {{ car.model }}</p>
{% else %}
    <p>Er zijn nog geen auto's in deze categorie.</p>
{% endfor %}
```

Andersom kun je `{{ car.category.name }}` gebruiken. Controleer eerst met `{% if car.category %}` of er een categorie is als de koppeling leeg mag zijn.

Bron: [Les 13](https://eduinsights.nl/lesson/02381cd0-c6a1-4f44-a8de-008e30735987).
