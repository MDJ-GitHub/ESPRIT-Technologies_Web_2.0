<?php

namespace App\Controller;

use App\Entity\Student;
use App\Form\StudentType;
use App\Repository\StudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class StudentController extends AbstractController
{
    #[Route('/student', name: 'app_student')]
    public function index(): Response
    {
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }


    #[Route('/student/list', name: 'app_studentList')]
    public function list(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(student::class);
        $list = $repository->findAll();

        return $this->render('student/list.html.twig', [
            'controller_name' => 'studentListController',
            'list' => $list
        ]);
    }

    #[Route('/student/list/orderByNSC', name: 'app_studentListOrderByNSC')]
    public function listOrderByNSC(StudentRepository $repository): Response
    {
        $list = $repository->orderByNSC();

        return $this->render('student/list.html.twig', [
            'controller_name' => 'studentListController',
            'list' => $list
        ]);
    }

    #[Route('/student/list/orderByEmail', name: 'app_studentListOrderByEmail')]
    public function listOrderByEmail(StudentRepository $repository): Response
    {
        $list = $repository->orderByEmail();

        return $this->render('student/list.html.twig', [
            'controller_name' => 'studentListController',
            'list' => $list
        ]);
    }


    #[Route('/student/list/findByEmail/', name: 'app_studentListFindByEmail')]
    public function listFindByEmail(Request $request, StudentRepository $repository,): Response
    {
        $em = $request->get('x');
        $list = $repository->findByEmail($em);

        return $this->render('student/list.html.twig', [
            'controller_name' => 'studentListController',
            'list' => $list
        ]);
    }

    #[Route('/student/add', name: 'app_studentAdd')]
    public function add(Request $request, ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(student::class);
        $em = $doctrine->getManager();
        $student = new student();
        $form = $this->createForm(StudentType::class, $student);
        $form->add('ajouter', SubmitType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $em->persist($student);
            $em->flush();
            return $this->redirectToRoute('app_studentList');
        }
        return $this->renderForm('student/add.html.twig', array('formA' => $form));
    }

    #[Route('/student/remove/{nsc}', name: 'app_studentRemove')]
    public function remove(ManagerRegistry $doctrine, $nsc): Response
    {

        $repository = $doctrine->getRepository(student::class);
        $em = $doctrine->getManager();
        $student = $repository->find($nsc);
        $em->remove($student);
        $em->flush();

        return $this->redirectToRoute('app_studentList');
    }


    #[Route('/student/modify/{nsc}', name: 'app_studentModify')]
    public function modify(Request $request, ManagerRegistry $doctrine, $nsc): Response
    {
        $repository = $doctrine->getRepository(student::class);
        $em = $doctrine->getManager();
        $student = $repository->find($nsc);
        $form = $this->createForm(StudentType::class, $student);
        $form->add('modifier', SubmitType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $em->flush();
            return $this->redirectToRoute('app_studentList');
        }
        return $this->renderForm('student/modify.html.twig', array('formA' => $form));
    }

    #[Route('/student/show/{nsc}', name: 'app_studentShow')]
    public function show(ManagerRegistry $doctrine, $nsc): Response
    {
        $repository = $doctrine->getRepository(student::class);
        $show =  $repository->find($nsc);

        return $this->render('student/show.html.twig', [
            'controller_name' => 'studentListController',
            'show' => $show
        ]);
    }



    #[Route('/classroom/routeclassroom', name: 'app_studentRouteClassroom')]
    public function routeClassroom(): Response
    {
        return $this->redirectToRoute('app_classroomList');
    }

    #[Route('/classroom/routeclub', name: 'app_studentRouteClub')]
    public function routeClub(): Response
    {
        return $this->redirectToRoute('app_clubList');
    }
}
