<?php

namespace AppBundle\Controller;

use Doctrine\ORM\EntityManager;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Route;
use Knp\Bundle\PaginatorBundle\DependencyInjection\KnpPaginatorExtension;
use Knp\Bundle\PaginatorBundle\KnpPaginatorBundle;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends FOSRestController
{

	/**
	 * @Route("/oauth/v2/token")
	 */
	public function tokenAction(Request $request)
	{

		$tokenService = $this->get('fos_oauth_server.controller.token');

		$response = $tokenService->tokenAction($request);
		$responseContent = (array) json_decode($response->getContent());
		
		if (array_key_exists('error', $responseContent)) {
			return $response;
		}

		/** @var EntityManager $em */
		$em = $this->getDoctrine()->getManager();

		$accessTokenEntidad = $em->createQueryBuilder()
				        ->select('at')
				        ->addSelect('u')
				        ->from('AppBundle:AccessToken', 'at')
				        ->leftJoin('at.user', 'u')
				        ->where("at.token = :token")
						->setParameters([
							':token' => $responseContent['access_token']
						])
						->orderBy('at.id', 'DESC')
				        ->getQuery();

// Po si hay que modificar la respuesta del array obtenemos la entidad
//        $usuarioEntidad = $accessTokenEntidad->getResult()[0]->getUser();
        $usuarioArray = $accessTokenEntidad->getArrayResult()[0]['user'];

		// Quitamos el password y añadimos la fecha de la última conexión
		unset($usuarioArray['password']);

		// Comprueba si el usuario esta activo o no
		if (!$usuarioArray['enabled']) {
			$response->setContent(json_encode(['error_description' => 'Cuenta deshabilitada']));
			$response->setStatusCode(401);
			return $response;
		}

		$response->setContent(json_encode($responseContent));

		return $response;
	}

    /**
     * @Route("/api/pruebas")
     */
    public function indexAction(Request $request)
    {

 //        /** @var EntityManager $em */
//        $em = $this->getDoctrine()->getManager();
//
////        $alquileres = $em->getRepository('AppBundle:Alquiler')->findOneBy(['id' => 156]);
//        $alquileres = $em->getRepository('AppBundle:Usuarios')->findAll();
//
//        $limit=10;

//        if($request->get('q'))
////            $alquileres=$this->busqueda($request->get('q'), $alquileres);
//
//        if($request->get('limit'))
//            $limit=$request->get('limit');
//
//        $paginator = $this->get('knp_paginator');
//        $alquileres = $paginator->paginate(
//            $alquileres,
//            $request->query->getInt('page', 1),
//            $limit
//        );

//        $serializer = $this->get('jms_serializer');
//        $alquileres = $serializer->serialize([
//            'meta' => $alquileres->getPaginationData(),
//            'data' => $alquileres->getItems()
//        ], 'json');

//        $data = array($alquileres);

//        $view = $this->view($data);
//        return $this->handleView($view);
//        return new Response($alquileres);
    }



//    /**
//     * @Route("/api/registrar-token-fcm")
//     */
//    public function registrarTokenFcmAction(Request $request)
//    {
//        /** @var EntityManager $em */
//        $em = $this->getDoctrine()->getManager();
//
//        $user = $em->getRepository('AppBundle:Control')->findOneBy(['idcontrol' => $this->getUser()->getIdcontrol()]);
////        $user = $this->getUser();
//
////        if (!is_null($user)) {
//            $token = $request->get('token');
//
//            $user->setTokenFcm($token);
//
//            $em->flush();
////        }
//
////        $data = array("ok" => 'ok');
//
//        $view = $this->view();
//        return $this->handleView($view);
//    }

//    /**
//     * @Route("/api/enviar-notificacion")
//     */
//    public function enviarNotificacionAction()
//    {
//        $fcmClient = $this->get('redjan_ym_fcm.client');
//
//        /** @var EntityManager $em */
//        $em = $this->getDoctrine()->getManager();
//
//        $tokens =  $em->createQueryBuilder()
//        ->select('u.tokenFcm')
//        ->from('AppBundle:Control', 'u')
//        ->where("u.tokenFcm is not null and u.tokenFcm <> ''")
//        ->getQuery()
//        ->getResult();
//
//        foreach ($tokens as $token) {
//            $notification = $fcmClient->createDeviceNotification(
//                'Title of Notification',
//                'Body of Notification',
//                $token
//            );
//
//            $array = ['paginaVisita' => 'ListadoInmuebles'];
//
//            $notification->setData($array);
//            $notification->setClickAction('FCM_PLUGIN_ACTIVITY');
//            $notification->setSound('default');
//            $notification->setPriority('high'); // Excepts 2 priorities, high(default) and low
////        $notification->setIcon('name of icon located in the native mobile app');
//
//            $fcmClient->sendNotification($notification);
//        }
//
//        $data = array("ok" => 'ok');
//
//        $view = $this->view($data);
//        return $this->handleView($view);
//    }
}