<?php

namespace App\Controller;

use App\Entity\Club;
use App\Form\ClubType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ClubController extends AbstractController
{
    #[Route('/club', name: 'app_club')]
    public function index(): Response
    {
        return $this->render('club/index.html.twig', [
            'controller_name' => 'ClubController',
        ]);
    }



    #[Route('/club/list', name: 'app_clubList')]
    public function list(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(club::class);
        $list = $repository->findAll();

        return $this->render('club/list.html.twig', [
            'controller_name' => 'clubListController',
            'list' => $list
        ]);
    }

    #[Route('/club/add', name: 'app_clubAdd')]
    public function add(Request $request, ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(club::class);
        $em = $doctrine->getManager();
        $club = new club();
        $form = $this->createForm(ClubType::class, $club);
        $form->add('ajouter', SubmitType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $em->persist($club);
            $em->flush();
            return $this->redirectToRoute('app_clubList');
        }
        return $this->renderForm('club/add.html.twig', array('formA' => $form));
    }

    #[Route('/club/remove/{ref}', name: 'app_clubRemove')]
    public function remove(ManagerRegistry $doctrine, $ref): Response
    {

        $repository = $doctrine->getRepository(club::class);
        $em = $doctrine->getManager();
        $club = $repository->find($ref);
        $em->remove($club);
        $em->flush();

        return $this->redirectToRoute('app_clubList');
    }


    #[Route('/club/modify/{ref}', name: 'app_clubModify')]
    public function modify(Request $request, ManagerRegistry $doctrine, $ref): Response
    {
        $repository = $doctrine->getRepository(club::class);
        $em = $doctrine->getManager();
        $club = $repository->find($ref);
        $form = $this->createForm(ClubType::class, $club);
        $form->add('modifier', SubmitType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $em->flush();
            return $this->redirectToRoute('app_clubList');
        }
        return $this->renderForm('club/modify.html.twig', array('formA' => $form));
    }

    #[Route('/club/show/{ref}', name: 'app_clubShow')]
    public function show(ManagerRegistry $doctrine, $ref): Response
    {
        $repository = $doctrine->getRepository(club::class);
        $show =  $repository->find($ref);

        return $this->render('club/show.html.twig', [
            'controller_name' => 'clubListController',
            'show' => $show
        ]);
    }



    #[Route('/classroom/routeclassroom', name: 'app_clubRouteClassroom')]
    public function routeClassroom(): Response
    {
        return $this->redirectToRoute('app_classroomList');
    }


    #[Route('/classroom/routestudent', name: 'app_clubRouteStudent')]
    public function routeStudent(): Response
    {
        return $this->redirectToRoute('app_studentList');
    }

    #[Route('/classroom/routestudent', name: 'app_clubRouteStudent')]
    public function orderStudent(): Response
    {
        return $this->redirectToRoute('app_studentList');
    }
}
