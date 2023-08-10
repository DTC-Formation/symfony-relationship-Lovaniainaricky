<?php

namespace App\Controller;

use App\Entity\User;
use App\Manager\UserManager;
use App\Repository\UserRepository;
use App\Helpers\JsonResponseHelper;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;

/**
 * @Route("/user/api/", name="app_user_api")
 */
class UserApiController extends AbstractController
{
    private JsonResponseHelper $jsonResponseHelper;
    private UserRepository $userRepository;
    private UserManager $userManager;
    
    function __construct(UserRepository $userRepository, JsonResponseHelper $jsonResponseHelper,UserManager $userManager) {
        $this->userRepository = $userRepository;
        $this->jsonResponseHelper = $jsonResponseHelper;
        $this->userManager = $userManager;
    }
    /**
     * @Route("", name="")
     */
    public function index(): Response
    {
        return $this->render('user_api/index.html.twig', [
            'controller_name' => 'UserApiController',
        ]);
    }

    /**
     * @Route("list/{page}",name="api.list", requirements={"page"="\d+"})
     */
    public function recupererUserApi(?int $page = 1) : JsonResponse 
    {
        $user = $this->userRepository->findBy([], [], $page * 10);
        //dd($user);
        return $this->json([
            'status' => 'success',
            'code' => Response::HTTP_OK,
            'data' => $this->jsonResponseHelper->serializeData($user, ['listing']),
        ]);
    }


    /**
     * @Route("create",name="api.create",methods={"POST","PUT"})
     */
    public function createUser(Request $request) : Response 
    {

        $user = $this->jsonResponseHelper->configureSerializer(['listing'])->deserialize($request->getContent(), User::class, 'json');

        $this->userRepository->persist($user);
        $this->userRepository->flush();
        
        return $this->json([
            'status' => 'success',
            'code' => Response::HTTP_CREATED,
        ]);
    }

    /**
     * @Route("edit/{id}",name="api.user.edit",methods={"GET","PUT"})
     */
    public function editUser(Request $request,string $id) : Response
    {
        $userExisting = $this->userRepository->findOneBy(['id' => $id]);

        if (!$userExisting) {
            return $this->json(['error' => 'User not found'], Response::HTTP_NOT_FOUND);
        }

        $updatedUser = $this->jsonResponseHelper->configureSerializer(['listing'])->deserialize($request->getContent(), User::class, 'json', ['object_to_populate' => $userExisting]);

        $this->userManager->add($updatedUser,true);

        return $this->json([
            'code' => Response::HTTP_OK,
            'status' => 'success',
        ]);
    }

    /**
     * @Route("delete/{id}",name="api.user.delete",methods={"DELETE"})
     */
    public function deleteUser(Request $request, string $id) : Response
    {
        $userExisting = $this->userRepository->findOneBy(['id' => $id]);

        if (!$userExisting) {
            return $this->json(['error' => 'User not found'], Response::HTTP_NOT_FOUND);
        }

        $this->userRepository->remove($userExisting,true);

        return $this->json([
            'code' => Response::HTTP_OK,
            'status' => 'success',
        ]);

    }


}
