<?php

namespace App\Manager;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class UserManager 
{
    private $entitymanager;

    public function __construct(EntityManagerInterface $entitymanager)
    {
        $this->entitymanager = $entitymanager;
    }

    // utiliser add edit delete de ce class et ne plus utiliser userRepository

    public function add(User $entity, bool $flush = false): void
    {
        $entity = new User();
        $this->entitymanager->persist($entity);

        if ($flush) {
            $this->entitymanager->flush();
        }
    }

    public function remove(User $entity, bool $flush = false): void
    {
        $this->entitymanager->remove($entity);

        if ($flush) {
            $this->entitymanager->flush();
        }
    }

    public function findAll() : array 
    {
        $repository = $this->entitymanager->getRepository(User::class);
        $findAll =  $repository->findAll();
        return $findAll;
    }
    

}
