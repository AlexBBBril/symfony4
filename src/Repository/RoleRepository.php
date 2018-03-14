<?php

namespace App\Repository;


use App\Entity\Role;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class RoleRepository extends ServiceEntityRepository
{
    /**
     * RoleRepository constructor.
     *
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Role::class);
    }

    /**
     * @param array $in
     *
     * @return array|null
     */
    public function getUsersInRoleArray(array $in): ?array
    {
        $qb = $this->createQueryBuilder('r');

        return $qb->select()
            ->where($qb->expr()->in('r.name', $in))
            ->getQuery()
            ->getResult();
    }
}