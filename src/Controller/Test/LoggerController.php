<?php

namespace App\Controller\Test;

use App\Event\LoggerEvent;
use App\Service\EventDispatcherDecorator;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LoggerController extends AbstractController
{
    #[Route('/api/test/event', name: 'app_test_event')]
    public function index(Request $request, EventDispatcherInterface $dispatcher, LoggerInterface $logger): JsonResponse
    {
        $message = $request->get('message','Сообщение не передано!');

        $eventDispatcherDecorator = new EventDispatcherDecorator($dispatcher, $logger);

        $eventDispatcherDecorator->dispatch(new LoggerEvent($message), LoggerEvent::NAME);

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/TestEventController.php',
        ]);
    }
}
