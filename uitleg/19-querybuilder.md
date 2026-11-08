# Data zoeken met QueryBuilder

**Eigen aanvulling bij het onderwerp van les 16.** De lesnaam was zichtbaar, maar de volledige Edulinsights-pagina kon ik niet lezen.

QueryBuilder bouwt een zoekopdracht in stapjes. `andWhere` voegt een voorwaarde toe. `setParameter` houdt de ingevoerde tekst los van de opdracht. `orderBy` bepaalt de volgorde.

Deze methode hoort **binnen CarRepository**, dat van Doctrine's ServiceEntityRepository overerft.

```php
// Zoek auto's met een stukje van hun modelnaam.
public function zoekOpModel(string $zoekterm): array
{
    return $this->createQueryBuilder('car')
        ->andWhere('car.model LIKE :zoekterm')
        // % betekent: hier mag nog andere tekst staan.
        ->setParameter('zoekterm', '%' . $zoekterm . '%')
        ->orderBy('car.model', 'ASC')
        ->getQuery()
        ->getResult();
}
```

Een controller gebruikt dan `$cars = $carRepository->zoekOpModel('Golf');` en geeft cars aan Twig mee.

Gebruik parameters voor bezoekersinvoer. `getResult()` geeft een lijst objecten. `leftJoin()` kan een relatie erbij halen; `groupBy()` en COUNT kunnen aantallen per groep maken.

Bron: [Officiële Symfony 7.4-uitleg over repositories](https://symfony.com/doc/7.4/doctrine.html#querying-for-objects-the-repository).
