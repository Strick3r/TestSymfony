<?php
/**
 * Created by PhpStorm.
 * User: strick3r
 * Date: 17/02/19
 * Time: 18:36
 */

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {

        //User with ADMIN Rol
        $userAdmin= new User();
        $userAdmin->setName('Admin')->setUsername('admin')->setPassword('adminpassword')->setRoles(['ROLE_ADMIN']);
        $manager->persist($userAdmin);

        //User with PAGE_1 Rol
        $userPage1= new User();
        $userPage1->setName('Page1')->setUsername('page_1')->setPassword('page1password')->setRoles(['ROLE_PAGE_1']);
        $manager->persist($userPage1);

        //User with PAGE_2 Rol
        $userPage2= new User();
        $userPage2->setName('Page2')->setUsername('page_2')->setPassword('page2password')->setRoles(['ROLE_PAGE_2']);
        $manager->persist($userPage2);

        $manager->flush();
    }
}