# Een categorie kiezen in een formulier

Een EntityType is een keuzelijst met bestaande database-objecten. De gebruiker ziet een naam; Symfony koppelt het echte object aan de auto.

Dit is een kleine aanvulling om de relatie en het formulier bij elkaar te brengen. De Category-entity en Car.category met getter en setter moeten al bestaan. Voeg de use-regels bovenaan FormType toe, en de add-regel binnen buildForm().

```php
// Bovenaan FormType.php:
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

// Binnen buildForm(): kies een bestaande categorie.
$builder->add('category', EntityType::class, [
    'class' => Category::class,
    'choice_label' => 'name',
    'label' => 'Categorie',
    'placeholder' => 'Kies een categorie',
]);
```

Category heeft hiervoor een getName()-methode nodig. Maak eerst categorieën aan voordat je ze kunt kiezen. Dit is een leerfragment, geen wijziging aan de oorspronkelijke toetsbestanden.

Bron: [Les 12](https://eduinsights.nl/lesson/bb6dc316-a2b3-4107-9c5f-dd45bf5cd25a).
