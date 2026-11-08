# Een grafiek maken met Symfony UX ChartJS

Met ChartJS teken je een grafiek. Symfony UX laat je de gegevens in PHP invullen. labels zijn de namen onderaan; data zijn de bijbehorende getallen.

Installeer dit alleen in een echt Symfony-project:

```powershell
# Voeg Symfony's ChartJS-koppeling toe.
composer require symfony/ux-chartjs

# Haal JavaScript-pakketten op voor een project met importmap.
php bin/console importmap:install
```

Voeg bovenaan je controller `use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;` en `use Symfony\UX\Chartjs\Model\Chart;` toe. Dit is de actie **binnen die controller**:

```php
#[Route('/grafiek', name: 'app_chart', methods: ['GET'])]
public function index(ChartBuilderInterface $builder): Response
{
    // Dit zijn fictieve oefencijfers.
    $chart = $builder->createChart(Chart::TYPE_BAR);
    $chart->setData([
        'labels' => ['Week 1', 'Week 2', 'Week 3'],
        'datasets' => [[
            'label' => 'Oefenverkopen',
            'data' => [2, 5, 3],
        ]],
    ]);

    return $this->render('chart/index.html.twig', ['chart' => $chart]);
}
```

In de Twig-pagina gebruik je `{{ render_chart(chart) }}`. De basislayout moet ook `{{ importmap('app') }}` laden en de Stimulus-starter moet aan staan; de Symfony-recipes helpen daarbij.

**Bar** vergelijkt aantallen. **Line** toont ontwikkeling over tijd. **Pie** toont hoe een totaal verdeeld is. Gebruik TYPE_LINE of TYPE_PIE om het soort te veranderen. Voor echte gegevens kun je met een foreach over database-objecten je labels en data vullen.

Bron: [Les 14](https://eduinsights.nl/lesson/1bf2ca29-7a7b-4167-ab48-7182d6f3e714).
