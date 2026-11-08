<?php

namespace App\Controller;

use App\Entity\Car;
use App\Repository\CarRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\FormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final class CarController extends AbstractController
{
    #[Route('/car', name: 'app_car')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $cars = $entityManager->getRepository(Car::class)->findAll();
        return $this->render('car/index.html.twig', [
            'cars' => $cars,
        ]);
    }

    #[Route('/car/{id}', name: 'app_view_car')]
    public function view(carRepository $carRepository, int $id): Response
    {
        $car = $carRepository->find($id);
        return $this->render('car/view.html.twig', [
            'car' => $car,
        ]);
    }

    #[Route('/car-add', name: 'app_add_car')]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FormType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $car = $form->getData();
            $entityManager->persist($car);
            $entityManager->flush();

            $this->addFlash('success', 'De auto is toegevoegd');

            return $this->redirectToRoute('app_car');
        }

        return $this->render('car/add.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/car-update/{id}', name: 'app_update_car')]
    public function update(Request $request, EntityManagerInterface $entityManager, int $id): Response
    {
        $car = $entityManager->getRepository(car::class)->find($id);
        $form = $this->createForm(FormType::class, $car);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $car = $form->getData();
            $entityManager->persist($car);
            $entityManager->flush();

            $this->addFlash('success', 'De auto is bijgewerkt');

            return $this->redirectToRoute('app_car');
        }

        return $this->render('car/update.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/car-delete/{id}', name: 'app_delete_car')]
    public function delete(EntityManagerInterface $entityManager, int $id): Response {
    $car = $entityManager->getRepository(Car::class)->find($id);
    //We bereiden het wissen voor in de database
    $entityManager->remove($car);

    //We voeren de statements uit (het wordt nog gedelete)
    $entityManager->flush();

    //Uiteraard zetten we een flash-message
    $this->addFlash('success', 'car got deleted');

    //We maken een redirect naar de route om het aangepaste boek te tonen
    return $this->redirectToRoute('app_car');
    }
}

// Note:
// Bootstrap no clue how to use it 
// tryed to make a red button... broke everything....