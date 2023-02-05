<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TeacherController extends AbstractController
{
    #[Route('/teacher/{name}', name: 'app_teacher')]
    public function showTeacher($name): Response
    {
        return $this->render('teacher/showTeacher.html.twig', [
            'teacherName' => $name
        ]);
    }


    #[Route('/goToStudentIndex', name: 'goToStudentIndex')]
    public function goToIndex(): Response {
        return $this->redirectToRoute('app_student');
    }
}


