<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 25.03.16
 * Time: 23:08
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class GenusController extends Controller
{
    /**
     * @Route("/genus/{genusName}")
     */
    public function showAction($genusName) {

        $notes = [
            'Octopus', ' 8 legs', 'nanana'
        ];


        $funFact = 'Octopuses can change the color of their body in just *three-tenths* of a second!';
        $funFact = $this->get('markdown.parser')
            ->transform($funFact);

        return $this->render('genus/show.html.twig', array(
            'name' => $genusName,
            'funFact' => $funFact,
            'notes' => $notes
        ));







//        $templating = $this->container->get('templating');
//        $html = $templating->render('genus/show.html.twig', [
//            'name'=> $genusName,
//            'notes' => $notes
//        ]);
//
//        return new Response($html);

//        return $this->render('genus/show.html.twig', array(
//            'name' => $genusName,
//            'notes' => $notes
//        ));
    }


    /**
    * @Route("/genus/{genusName}/notes", name="genus_show_notes")
    * @Method("GET")
     */
    public function getNotesAction($genusName) {

        $notes = [
            ['id' => 1, 'username' => 'AquaPelham', 'avatarUri' => '/images/leanna.jpeg', 'note' => 'Octopus asked me a riddle, outsmarted me', 'date' => 'Dec. 10, 2015'],
            ['id' => 2, 'username' => 'AquaWeaver', 'avatarUri' => '/images/ryan.jpeg', 'note' => 'I counted 8 legs... as they wrapped around me', 'date' => 'Dec. 1, 2015'],
            ['id' => 3, 'username' => 'AquaPelham', 'avatarUri' => '/images/leanna.jpeg', 'note' => 'Inked!', 'date' => 'Aug. 20, 2015'],
        ];

        $data = [
            'notes' => $notes
        ];

        return new Response(json_encode($data));
    }
}
