<?php

namespace App\Manager;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

/**
 * Manager pf User
 */
class UserManager 
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    // utiliser add edit delete de ce class et ne plus utiliser userRepository

    /**
     * Ajout et modification user
     *
     * @param User $entity
     * @param boolean $flush
     * @return void
     */
    public function add(User $entity, bool $flush = false): void
    {
        $this->entityManager->persist($entity);

        if ($flush) {
            $this->entityManager->flush();
        }

        return;
    }

    /**
     * Suprression user
     *
     * @param User $entity
     * @param boolean $flush
     * @return void
     */
    public function remove(User $entity, bool $flush = false): void
    {
        $this->entityManager->remove($entity);

        if ($flush) {
            $this->entityManager->flush();
        }

        return;
    }

    /**
     * Undocumented function
     *
     * @author Ricky <rickylovaniainarajhonson>
     * @return array
     */
    public function findAll() : array 
    {
        $repository = $this->entityManager->getRepository(User::class);

        return $repository->findAll();
    }

    public function SaveUser($user) : void {
        // foreach ($user->getExperiences() as $experience) {
        //     $this->entityManager->persist($experience);
        // }

        // foreach ($user->getEtudes() as $education) {
        //     $this->entityManager->persist($education);
        // }

        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }
    

}
