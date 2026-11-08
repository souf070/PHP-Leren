# Een layout en navigatie hergebruiken

Je schrijft de buitenkant één keer in `base.html.twig`. Andere pagina's vullen de lege plekken in. Dit voorkomt dubbel werk: DRY betekent Don't Repeat Yourself.

Dit is een kleine `templates/base.html.twig`. Maak ook `templates/nav.html.twig` met je menu.

```twig
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>{% block title %}Garage{% endblock %}</title>
</head>
<body>
    {# include plakt het menu op deze plek. #}
    {% include 'nav.html.twig' %}

    {# Een andere pagina mag deze plek vullen. #}
    {% block body %}{% endblock %}
</body>
</html>
```

Een gewone pagina, bijvoorbeeld `templates/car/index.html.twig`, gebruikt die buitenkant zo:

```twig
{# extends kiest de gezamenlijke layout. #}
{% extends 'base.html.twig' %}

{% block title %}Auto's{% endblock %}

{% block body %}
    <h1>Onze auto's</h1>
{% endblock %}
```

Je bestaande `b toets/base.html.twig` en `nav.html.twig` laten dit principe al zien.

Bron: [Les 5](https://eduinsights.nl/lesson/b64aeb92-dbc4-4d36-8ea7-5394cd6e0757).
