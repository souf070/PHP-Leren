# Informatie doorgeven aan Twig

De controller geeft een pakketje gegevens mee. Links staat de naam die Twig mag gebruiken, rechts staat de waarde.

Deze return-regel hoort **in een controlleractie**.

```php
// Twig krijgt een tekst, leeftijd en lijstje.
return $this->render('car/index.html.twig', [
    'bericht' => 'Welkom bij de garage',
    'leeftijd' => 18,
    'modellen' => ['Golf', 'Aygo', 'Zoe'],
]);
```

In `templates/car/index.html.twig` lees je dat pakketje zo:

```twig
{# Dubbele accolades tonen een waarde. #}
<h1>{{ bericht }}</h1>

{# if kiest wat je laat zien. #}
{% if leeftijd >= 18 %}
    <p>Je bent volwassen.</p>
{% else %}
    <p>Je bent minderjarig.</p>
{% endif %}

{# for herhaalt de HTML voor elk model. #}
{% for model in modellen %}
    <p>{{ loop.index }}. {{ model }}</p>
{% else %}
    <p>De lijst is leeg.</p>
{% endfor %}
```

`{{ }}` toont iets. `{% %}` voert logica uit. `{# #}` is een onzichtbare opmerking. De namen moeten precies overeenkomen met de sleutels in render().

Bron: [Les 5](https://eduinsights.nl/lesson/b64aeb92-dbc4-4d36-8ea7-5394cd6e0757).
