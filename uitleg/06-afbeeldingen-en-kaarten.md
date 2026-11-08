# Afbeeldingen en kaarten tonen

`asset()` maakt het pad naar een openbaar bestand. `path()` maakt een link naar een route. Een Bootstrap-card is een vakje met een plaatje en tekst.

Dit hoort in `templates/car/index.html.twig`. De controller geeft `cars` mee. Bootstrap moet in je basislayout geladen zijn; jouw voorbeeldtoets doet dat al.

```twig
{# Maak voor iedere auto dezelfde kaart. #}
{% for car in cars %}
    <div class="card">
        {# car.image is een bestandsnaam uit public/images. #}
        <img class="card-img-top"
             src="{{ asset('images/' ~ car.image) }}"
             alt="{{ car.model }}">

        <div class="card-body">
            <h2 class="card-title">{{ car.model }}</h2>
            <p class="card-text">{{ car.vendor }}</p>

            {# Het nummer vertelt welke auto je wilt zien. #}
            <a class="btn btn-primary"
               href="{{ path('app_view_car', {id: car.id}) }}">
                Bekijken
            </a>
        </div>
    </div>
{% endfor %}
```

Bij `car.image = 'auto.jpg'` moet het bestand in `public/images/auto.jpg` staan. Dit veld uploadt niets. De les noemt DummyImage als tijdelijk plaatje; je kunt ook een eigen lokaal plaatje gebruiken.

Bron: [Les 6](https://eduinsights.nl/lesson/03842e52-6c37-4eeb-8fcf-f8e37f071724).
