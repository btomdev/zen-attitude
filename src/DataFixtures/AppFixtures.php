<?php

namespace App\DataFixtures;

use Faker;
use Faker\Factory;
use App\Entity\News;
use App\Entity\Role;
use App\Entity\User;
use App\Entity\Grade;
use App\Entity\Media;
use App\Entity\Technique;
use App\Entity\StageClub;
use Faker\ORM\Doctrine\Populator;
use App\DataFixtures\Faker\UserProvider;
use App\DataFixtures\Faker\GradeProvider;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\DataFixtures\Faker\TechniqueProvider;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        /*******ROLE*******/
        
        // ROLE_ADMIN
        $roleAdmin = new Role();
        $roleAdmin->setCode('ROLE_ADMIN');
        $roleAdmin->setRole('Administrateur');
        $manager->persist($roleAdmin);

        // ROLE_TEACHER
        $roleTeacher = new Role();
        $roleTeacher->setCode('ROLE_TEACHER');
        $roleTeacher->setRole('Professeur');
        $manager->persist($roleTeacher);

        // ROLE_USER
        $roleUser = new Role();
        $roleUser->setCode('ROLE_USER');
        $roleUser->setRole('Utilisateur');
        $manager->persist($roleUser);


        /*******USER*******/

        // admin
        $userAdmin = new User();
        $userAdmin->setName('Admin');
        $userAdmin->setFirstName('Admin');
        $userAdmin->setBirthdate(new \Datetime('1973-05-03'));
        $userAdmin->setAddress('Rue de l\'admin, 01000 Bourg-en-Bresse');
        $userAdmin->setPhone('06 95 87 54 63');
        $userAdmin->setEmail('admin@aikido-bourg.com');
        $encodedPassword = $this->encoder->encodePassword($userAdmin, 'admin');
        $userAdmin->setPassword($encodedPassword);
        $userAdmin->setLicense('65413');
        $userAdmin->setResponsability('membre');
        $userAdmin->setTeacherComment('Pas mal, mais peut mieux faire');
        $userAdmin->setRole($roleAdmin);

        $manager->persist($userAdmin);

        // prof
        $userProf = new User();
        $userProf->setName('Prof');
        $userProf->setFirstName('Prof');
        $userProf->setBirthdate(new \Datetime('1992-02-10'));
        $userProf->setAddress('Rue du prof, 01000 Bourg-en-Bresse');
        $userProf->setPhone('06 45 87 87 23');
        $userProf->setEmail('prof@aikido-bourg.com');
        $encodedPassword = $this->encoder->encodePassword($userProf, 'prof');
        $userProf->setPassword($encodedPassword);
        $userProf->setLicense('329457');
        $userProf->setResponsability('membre');
        $userProf->setTeacherComment('tu es sur la bonne voie !');
        $userProf->setRole($roleTeacher);

        $manager->persist($userProf);

        // user
        $userUser = new User();
        $userUser->setName('User');
        $userUser->setFirstName('User');
        $userUser->setBirthdate(new \Datetime('1968-08-05'));
        $userUser->setAddress('Rue du user, 01000 Bourg-en-Bresse');
        $userUser->setPhone('06 51 55 87 74');
        $userUser->setEmail('user@aikido-bourg.com');
        $encodedPassword = $this->encoder->encodePassword($userUser, 'user');
        $userUser->setPassword($encodedPassword);
        $userUser->setLicense('128965');
        $userUser->setResponsability('membre');
        $userUser->setTeacherComment('bosse feignasse');
        $userUser->setRole($roleUser);

        $manager->persist($userUser);

        // Alves David
        $userAlves = new User();
        $userAlves->setName('Alves');
        $userAlves->setFirstName('David');
        $userAlves->setBirthdate(new \Datetime('1992-02-10'));
        $userAlves->setAddress('Rue du président, 01000 Bourg-en-Bresse');
        $userAlves->setPhone('06 45 87 96 12');
        $userAlves->setEmail('david-alves@aikido-bourg.com');
        $encodedPassword = $this->encoder->encodePassword($userAlves, 'alves');
        $userAlves->setPassword($encodedPassword);
        $userAlves->setLicense('256471');
        $userAlves->setResponsability('président');
        $userAlves->setTeacherComment('pas mal !');
        $userAlves->setRole($roleAdmin);

        $manager->persist($userAlves);


        /*******GRADE*******/

        // grade1
        $grade1 = new Grade();
        $grade1->setName('No Kyu');

        $manager->persist($grade1);

        // grade2
        $grade2 = new Grade();
        $grade2->setName('5em Kyu');

        $manager->persist($grade2);

        // grade3
        $grade3 = new Grade();
        $grade3->setName('4em Kyu');
        $manager->persist($grade3);

        // grade4
        $grade4 = new Grade();
        $grade4->setName('3em Kyu');

        $manager->persist($grade4);

        // grade5
        $grade5 = new Grade();
        $grade5->setName('2em Kyu');

        $manager->persist($grade5);

        // grade6
        $grade6 = new Grade();
        $grade6->setName('1er Kyu');

        $manager->persist($grade6);

        // grade7
        $grade7 = new Grade();
        $grade7->setName('1er Dan Shodan');

        $manager->persist($grade7);

        // grade8
        $grade8 = new Grade();
        $grade8->setName('2em Dan Nidan');

        $manager->persist($grade8);

        // grade9
        $grade9 = new Grade();
        $grade9->setName('3em Dan Sandan');

        $manager->persist($grade9);

        // grade10
        $grade10 = new Grade();
        $grade10->setName('4em Dan Yondan');

        $manager->persist($grade10);

        // grade11
        $grade11 = new Grade();
        $grade11->setName('5em Dan Godan');

        $manager->persist($grade11);

        // grade12
        $grade12 = new Grade();
        $grade12->setName('6em Dan Rokudan');

        $manager->persist($grade12);


        /*******MEDIA******/

        // img1
        $img1 = new Media();
        $img1->setUrl('7a7d92ab27afd5aa3f78f3821ae1a61f.jpeg');
        $img1->setAlt('échauffement');
        $img1->setTakenAt(new  \Datetime('2017-12-10'));
        $img1->setCaption('stage hervé du 10/01/2018');

        $manager->persist($img1);

        // img2
        $img2 = new Media();
        $img2->setUrl('97774486a40fc6577d69a9fc8d49aa83.jpeg');
        $img2->setAlt('démonstration stage');
        $img2->setTakenAt(new \Datetime('2008-10-05'));
        $img2->setCaption('Démonstration Hervé lors d\'un stage');

        $manager->persist($img2);

        // img3
        $img3 = new Media();
        $img3->setUrl('55a0308db937504ddb6edd736c77e54f.jpeg');
        $img3->setAlt('travail distance');
        $img3->setTakenAt(new \Datetime('2008-10-05'));
        $img3->setCaption('Travail distance Uke/Tori');

        $manager->persist($img3);

        // img4
        $img4 = new Media();
        $img4->setUrl('398834c130d4a5fe714b2af6348a9fed.jpeg');
        $img4->setAlt('Démonstration frappe');
        $img4->setTakenAt(new \Datetime('2008-10-05'));
        $img4->setCaption('Démonstration frappe au Jo');

        $manager->persist($img4);

        // img5
        $img5 = new Media();
        $img5->setUrl('ff15e4454323913b01effbaa25914deb.png');
        $img5->setAlt('Dégainer son ken');
        $img5->setTakenAt(new \Datetime('2011-05-02'));
        $img5->setCaption('Montage photo "Dégainer son ken"');

        $manager->persist($img5);

        // img6
        $img6 = new Media();
        $img6->setUrl('a527c0ac3f9ac18b53a76eb948d8105e.jpeg');
        $img6->setAlt('Débutants');
        $img6->setTakenAt(new \Datetime('2016-11-24'));
        $img6->setCaption('Pratique entre débutants');

        $manager->persist($img6);


        /*****Faker*****/

        // Faker
        $faker = Faker\Factory::create('fr_FR');

                //----------provider--------//
        $faker->addProvider(new UserProvider($faker));
        // $faker->addProvider(new GradeProvider($faker));
        $faker->addProvider(new TechniqueProvider($faker));
                //----------provider--------//

        $populator = new Populator($faker, $manager);



        /******Populators*****/

        // Role
        $populator->addEntity(Role::class, 2, [
            'code' => function() use ($faker) { return $faker->unique()->rolesCode(); },
        ], [
            function($role) use ($faker) {
                $code = $role->getCode();
                $roleName = $faker->RoleName($code);
                $role->setRole($roleName);
            }
        ]);

        // User
        $populator->addEntity(User::class, 6, [
            'firstName' => function() use ($faker) { return strtoupper($faker->unique()->lastName()); },
            // 'birthdate' => function() use ($faker) { return strtoupper($faker->unique()->dateTimeThisDecade($max = 'now', $timezone = null)); },
            'address' => function() use ($faker) { return $faker->unique()->address(); },
            'phone' => function() use ($faker) { return $faker->unique()->phoneNumber(); },
            'license' => function() use ($faker) { return $faker->unique()->randomNumber($nbDigits = null, $strict = false); },
            'responsability' => function() use ($faker) { return $faker->randomElement($array = ['membre']); },
            'teacher_comment' => function() use ($faker) { return $faker->sentence($nbWords = 6, $variableNbWords = true); },
        ], [
            function($user) {
                // name
                $user->setName(
                    strtolower($user->getFirstname())
                );
                // email
                $user->setEmail(
                    strtolower(substr($user->getName(), 0, 1).'.'.$user->getFirstName().'@aikido-bourg.fr')
                );
                // password
                $encodedPassword = $this->encoder->encodePassword($user, strtolower($user->getFirstName()));
                $user->setPassWord(
                    $encodedPassword
                );
            }
        ]);

        // fais appel au GradeProvider mais inscrit les grades en random dans la bdd
        // // grade
        // $populator->addEntity(Grade::class, 10, [
        //         'name' => function() use ($faker) { return $faker->gradeNames(); },
        // ]);

        // stage_club
        $populator->addEntity(StageClub::class, 10, [
            'name' => function() use ($faker) { return $faker->name(); },
            'place' => function() use ($faker) { return $faker->address(); },
            'date' => function() use ($faker) { return $faker->dateTimeThisDecade($max = 'now', $timezone = null); },
            'poster' => function() use ($faker) { return null; }
        ]);

        // technique
        $populator->addEntity(Technique::class, 50, [
            'title' => function() use ($faker) { return $faker->TechniqueTitles(); },
            'attack' => function() use ($faker) { return $faker->TechniqueAttacks(); },
            'side' => function() use ($faker) { return $faker->TechniqueSides(); },
            'position' => function() use ($faker) { return $faker->TechniquePositions(); },
        ]);

        // media
        $populator->addEntity(Media::class, 10, [
            'url' => function() use ($faker) { return ''; },
            'alt' => function() use ($faker) { return $faker->unique()->text($maxNbChars = 25); },
            'taken_at' => function() use ($faker) { return $faker->dateTime($max = 'now', $timezone = null); },
            'caption' => function() use ($faker) { return $faker->unique()->text($maxNbChars = 35); },

        ]);

        
        // news
        $populator->addEntity(News::class, 5, [
            'title' => function() use ($faker) { return $faker->text($maxNbChars = 25); },
            'content' => function() use ($faker) { return $faker->text($maxNbChars = 100); },
            'date' => function() use ($faker) { return $faker->dateTime($max = 'now', $timezone = null); },
            'created_at' => function() use ($faker) { return $faker->dateTime($format = 'Y-m-d'); },
                ]);
            
            
        $Entities = $populator->execute();
        
        // // afin de forcer la relation Many To Many
        // $users = $Entities['App\Entity\User'];
        // $grades = $Entities['App\Entity\Grade'];

        // foreach($users as $user) {
        //     // on melange
        //     shuffle($users);
        //     $nb_user = count($users);
        //     $i = 1;
        //     $nb_user_random = mt_rand($i, 1);

        //     for($i; $i < $nb_user_random; $i++) {
        //         $user->addGrade($grades[$i], true);
        //         $manager->persist($user);
        //     }
        // }


        $manager->flush();
    }
}
