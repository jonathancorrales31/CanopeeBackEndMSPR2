<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
// use App\Entity\Clients;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use App\Controller\Admin\ClientsCrudController;
use App\Controller\Admin\AdminCrudController;
use App\Controller\Admin\ImageCrudController;
use App\Controller\Admin\DevisCrudController;
use App\Controller\Admin\PrestationsCrudController;
use App\Controller\Admin\MessageCrudController;



#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    //  public function __construct(
    //     private AdminUrlGenerator $adminUrlGenerator
    // ) {}

    public function index(): Response
    {
        
        

    return $this->render('@EasyAdmin/page/content.html.twig');
}
            
//    $url = $this->adminUrlGenerator
//             ->setController(ClientsCrudController::class)
//             ->generateUrl();

//         return $this->redirect($url);


        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // return $this->redirectToRoute('admin_user_index');

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirectToRoute('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('CanopeeBackOffice');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkTo(SomeCrudController::class, 'The Label', 'fas fa-list');
       
        yield MenuItem::linkTo(
    ClientsCrudController::class,
    'Clients',
    'fas fa-users'
);

yield MenuItem::linkTo(DevisCrudController::class, 'Devis', 'fas fa-users');
yield MenuItem::linkTo(MessageCrudController::class, 'Message', 'fas fa-users');
yield MenuItem::linkTo(PrestationsCrudController::class, 'Prestations', 'fas fa-users');
yield MenuItem::linkTo(ImageCrudController::class, 'Image', 'fas fa-users');
yield MenuItem::linkTo(AdminCrudController::class, 'Admin', 'fas fa-users');


     
    }
}
