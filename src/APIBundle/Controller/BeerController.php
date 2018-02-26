<?php

namespace APIBundle\Controller;

use APIBundle\Entity\Beer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/beers")
 */
class BeerController extends Controller
{
	/**
	 * @Route("/", name="api_beers")
	 */
	public function index()
	{
		$beers = $this->getDoctrine()
					  ->getRepository('APIBundle:Beer')
					  ->findAll();

		$beers = $this->get('jms_serializer')->serialize($beers, 'json');

		$response = new Response($beers, 200);
		$response->headers->set('Content-Type', 'application/json');

		return $response;
	}

	/**
	 * @Route("/{id}", name="api_beers_show")
	 */
	public function show(Beer $beer)
	{
		$beers = $this->get('jms_serializer')->serialize($beer, 'json');

		$response = new Response($beers, 200);
		$response->headers->set('Content-Type', 'application/json');

		return $response;
	}
}
