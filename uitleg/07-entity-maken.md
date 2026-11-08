# Een entity maken

Een entity beschrijft een soort ding. `Car` beschrijft auto's; één Car-object is één auto. Doctrine vertaalt eigenschappen naar databasekolommen.

Dit commando start de vragen om een entity te maken.

```powershell
# Kies bijvoorbeeld model als string en price als decimal.
php bin/console make:entity Car
```

Bron: [Les 7](https://eduinsights.nl/lesson/344db92d-ea26-4667-86ef-55e1a308c274).

Dit is een klein voorbeeld van `src/Entity/Car.php`. De volledige versie met alle velden staat in `b toets/Car.php`.

```php
<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

// Deze sticker vertelt dat Doctrine deze klasse bewaart.
#[ORM\Entity]
class Car
{
    // Het nummer wordt vanzelf gemaakt.
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    // Een model is tekst van maximaal 255 tekens.
    #[ORM\Column(length: 255)]
    private ?string $model = null;

    // get haalt een waarde op.
    public function getModel(): ?string
    {
        return $this->model;
    }

    // set vult een waarde in.
    public function setModel(string $model): static
    {
        $this->model = $model;
        return $this;
    }
}
```

`$this` betekent: dit object. `?string` betekent tekst of null. Veelgebruikte veldtypen zijn string, integer, decimal, boolean, date, datetime en text. Nullable betekent dat een databasevakje leeg mag zijn. Een entity-wijziging is pas een databasewijziging nadat je migreert.
