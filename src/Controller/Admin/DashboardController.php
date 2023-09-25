<?php

namespace App\Controller\Admin;

use App\Entity\Message;
use App\Repository\MessageRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Activity;
use App\Entity\Contact;
use App\Entity\Drink;
use App\Entity\Food;
use App\Entity\Kid;
use App\Entity\Lodging;
use App\Entity\Person;
use App\Entity\Menu;
use App\Entity\TableDinner;
use App\Entity\Timeline;
use App\Entity\TimelineEvent;
use App\Repository\PersonRepository;

class DashboardController extends AbstractDashboardController
{

    public function __construct(
        private readonly PersonRepository $personRepository,
        private readonly MessageRepository $messageRepository
    ){}

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
//        return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
//         $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
//         return $this->redirect($adminUrlGenerator->setController(FamilyCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //

        $guests = $this->personRepository->count([]);

        $announcement['total'] = $guests;
        $announcement['sent'] = $this->personRepository->count(['isAnnouncementSent' => true]);
        $announcement['notSent'] = $this->personRepository->count(['isAnnouncementSent' => false]);
        $announcement['percent_yes'] = $this->getPercent($announcement['sent'], $announcement['total']);
        $announcement['percent_no'] = $this->getPercent($announcement['notSent'], $announcement['total']);

        $coming['total'] = $announcement['sent'];
        $coming['yes'] = $this->personRepository->count(['comeToParty' => true]);
        $coming['no'] = $announcement['sent'] - $coming['yes'];
        $coming['percent_yes'] = $this->getPercent($coming['yes'], $coming['total']);
        $coming['percent_no'] = $this->getPercent($coming['no'], $coming['total']);

        $lodged['total'] = $coming['yes'];
        $lodged['notLodged'] = $this->personRepository->count(['lodging' => null, 'comeToParty' => true]);
        $lodged['lodged'] = $lodged['total'] - $lodged['notLodged'];
        $lodged['percent_yes'] = $this->getPercent($lodged['lodged'], $lodged['total']);
        $lodged['percent_no'] = $this->getPercent($lodged['notLodged'], $lodged['total']);

         return $this->render('admin/dashboard.html.twig', [
             'announcement' => $announcement,
             'coming' => $coming,
             'lodged' => $lodged,
         ]);
    }

    private function getPercent(int $number, int $total)
    {
        if( $total === 0 ){
            return 0;
        }
        return $number / $total *100;
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Administration')
            ->setLocales(['fr', 'en']);
    }

    public function configureMenuItems(): iterable
    {
        $nbUnreadMessage = $this->messageRepository->count(['isRead' => false]);
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),
            MenuItem::linkToRoute('Site', 'fa fa-home', 'app_index'),
            MenuItem::section('Guests'),
            MenuItem::linkToCrud('Tables', 'fa fa-user', TableDinner::class),
            MenuItem::linkToCrud('People', 'fa fa-user', Person::class),
            MenuItem::linkToCrud('Kids', 'fa fa-user', Kid::class),
            MenuItem::linkToCrud('Lodgings', 'fa fa-user', Lodging::class),
            MenuItem::section('Organization'),
            MenuItem::linkToCrud('Activities', 'fa fa-user', Activity::class),
            MenuItem::linkToCrud('Timelines', 'fa fa-user', Timeline::class),
            MenuItem::linkToCrud('Events', 'fa fa-user', TimelineEvent::class),
            MenuItem::linkToCrud('Contacts', 'fa fa-user', Contact::class),
            MenuItem::linkToCrud("Messages <span class=\"badge badge-info\">$nbUnreadMessage</span>", 'fa fa-user', Message::class),
            MenuItem::section('Meal'),
            MenuItem::linkToCrud('Drink', 'fa fa-user', Drink::class),
            MenuItem::linkToCrud('Food', 'fa fa-user', Food::class),
            MenuItem::linkToCrud('Menu', 'fa fa-user', Menu::class),
        ];
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
