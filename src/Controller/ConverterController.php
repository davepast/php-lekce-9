<?php

namespace App\Controller;

use App\Form\ConverterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Choice;

/**
 * @Route("/converter")
 */
class ConverterController extends AbstractController
{
    /**
     * @Route("/", name="converter", methods="GET|POST")
     */
    public function convert(Request $request): Response
    {
        $result = '';
        $form = $this->createForm(ConverterType::class);

        /*
         * možnost 2
        $form = $this->createFormBuilder()
            ->add('text', TextType::class)
            ->add('direction', ChoiceType::class, [
                'choices' => [
                    'Uppercase to Lowercase' => 'toLowercase',
                    'Lowercase to Uppercase' => 'toUppercase'
                ]
            ])
            ->getForm()
        ;
*/
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();

            if ($formData['direction'] === 'toLowercase') {
                $result = strtolower($formData['text']);
            } else {
                $result = strtoupper($formData['text']);
            }
        }


        return $this->render('converter/convert.html.twig', [
            'form' => $form->createView(),
            'result' => $result
        ]);
    }
}
