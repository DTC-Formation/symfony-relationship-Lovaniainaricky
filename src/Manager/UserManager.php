<?php

namespace App\Manager;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class UserManager 
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    // utiliser add edit delete de ce class et ne plus utiliser userRepository

    public function add(User $entity, bool $flush = false): void
    {
        $entity = new User();
        $this->entityManager->persist($entity);

        if ($flush) {
            $this->entityManager->flush();
        }

        return;
    }

    public function remove(User $entity, bool $flush = false): void
    {
        $this->entityManager->remove($entity);

        if ($flush) {
            $this->entityManager->flush();
        }

        return;
    }

    public function findAll() : array 
    {
        $repository = $this->entityManager->getRepository(User::class);
        $findAll =  $repository->findAll();

        return $findAll;
    }
    

}
