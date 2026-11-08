# Controleren of invoer klopt

Validatie controleert de ingevulde gegevens. Bijvoorbeeld: een model mag niet leeg zijn. Browsercontroles zijn handig, maar Symfony moet de invoer zelf controleren.

Dit stukje hoort **binnen Car**, boven de model-property. Voeg bovenaan het bestand de getoonde use-regel toe.

```php
// Deze use-regel staat boven de klasse.
use Symfony\Component\Validator\Constraints as Assert;

// Binnen de klasse: deze regels controleren het veld eronder.
#[ORM\Column(length: 255)]
#[Assert\NotBlank(message: 'Vul een model in.')]
#[Assert\Length(min: 2, max: 255, minMessage: 'Gebruik minstens 2 tekens.')]
private ?string $model = null;
```

`isValid()` voert de controles uit. Andere voorbeelden: `Positive` voor groter dan nul, `Email` voor een e-mailadres en `Length` voor tekstlengte.

Voor het testen van servervalidatie kun je de browsercontrole tijdelijk overslaan:

```twig
{# novalidate schakelt alleen de browsercontrole uit, niet Symfony's controle. #}
{{ form_start(form, {attr: {novalidate: 'novalidate'}}) }}
    {{ form_widget(form) }}
    <button type="submit">Opslaan</button>
{{ form_end(form) }}
```

Tijdens ontwikkelen laat `dump($car)` de gegevens zien. `dd($car)` toont ze en stopt het programma. Haal dd weg als je de actie echt wilt afmaken.

Bron: [Les 11](https://eduinsights.nl/lesson/99ef4705-2f75-470f-8782-0030635ec8b9).
