# Een formulier maken

Een FormType bepaalt welke vakjes de gebruiker ziet. `data_class` vertelt in welk soort object Symfony de waarden invult.

Dit commando maakt het formulier. Kies `Car` als bijbehorende entity. Jouw voorbeeld noemt het formulier `FormType`; dat houden we hier aan.

```powershell
# Genereer de formulierklasse voor Car.
php bin/console make:form FormType Car
```

Bron: [Les 11](https://eduinsights.nl/lesson/99ef4705-2f75-470f-8782-0030635ec8b9).

Deze methoden horen **binnen de gegenereerde FormType-klasse**. Laat de gegenereerde namespace en use-regels bovenaan staan.

```php
// Bouw de vakjes; de namen horen bij de velden van Car.
public function buildForm(FormBuilderInterface $builder, array $options): void
{
    $builder
        ->add('model')
        ->add('vendor')
        ->add('price')
        ->add('image')
        ->add('description');
}

// Koppel de ingevulde vakjes aan een Car-object.
public function configureOptions(OptionsResolver $resolver): void
{
    $resolver->setDefaults(['data_class' => Car::class]);
}
```

Dit hoort in je Twig-pagina. De controller moet het formulier onder de naam `form` meegeven.

```twig
{# Toon het formulier en een verzendknop. #}
{{ form_start(form) }}
    {{ form_widget(form) }}
    <button type="submit">Opslaan</button>
{{ form_end(form) }}
```

Dit korte voorbeeld zet de knop in Twig. Je originele FormType heeft al een SubmitType-knop; kies één van beide plekken om geen dubbele knop te krijgen. Symfony kiest standaard vaak TextType voor tekst, IntegerType voor een geheel getal en TextareaType voor lange tekst.
