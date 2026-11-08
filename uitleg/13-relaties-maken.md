# Relaties — ManyToOne en OneToMany

Een categorie is een bakje voor auto's. Eén bakje bevat meerdere auto's: OneToMany. Meerdere auto's horen bij één bakje: ManyToOne. Dat zijn twee kanten van dezelfde koppeling.

De voorbeeldtoets heeft nog geen Category. Onderstaande code laat alleen zien hoe je die relatie in een Symfony-project toevoegt. Maak eerst Category met een name-veld. Start daarna de generator voor Car.

```powershell
# Voeg een nieuwe entity met een name-veld toe.
php bin/console make:entity Category

# Voeg aan Car een property category van type relation toe.
php bin/console make:entity Car
```

Kies bij de relatie `Category`, daarna `ManyToOne`. Laat ook de andere kant `cars` genereren. Maker maakt de properties, getters, setters en ArrayCollection voor je.

Dit is het belangrijke stukje **binnen Car**:

```php
// Veel auto's kunnen dezelfde categorie hebben.
#[ORM\ManyToOne(inversedBy: 'cars')]
private ?Category $category = null;
```

Dit hoort **binnen Category**; voeg de Doctrine Collection-imports toe als je dit zelf schrijft:

```php
// Deze categorie heeft een lijst met auto's.
#[ORM\OneToMany(mappedBy: 'category', targetEntity: Car::class)]
private Collection $cars;

// Begin bij een nieuwe categorie met een lege lijst.
public function __construct()
{
    $this->cars = new ArrayCollection();
}
```

`mappedBy` wijst naar de property op de andere entity. `inversedBy` wijst terug naar het lijstje. Koppel objecten met `$car->setCategory($category)`, niet met een zelfgemaakte setCategoryId(). Daarna migratie maken en uitvoeren.

Andere soorten om te herkennen: OneToOne = één bij één; ManyToMany = meerdere aan beide kanten met een koppeltabel.

Bron: [Les 12](https://eduinsights.nl/lesson/bb6dc316-a2b3-4107-9c5f-dd45bf5cd25a).
