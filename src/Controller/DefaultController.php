<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    /**
    * @Route("/")
    */
    public function index()
    {
      return $this->render('pages/index.html.twig');
    }

    /**
    * @Route("/page-lvl1")
    */
    public function pageLvl1()
    {
      return $this->render('pages/page_lvl1.html.twig');
    }

    /**
    * @Route("/page-lvl2")
    */
    public function pageLvl2()
    {
      return $this->render('pages/page_lvl2.html.twig');
    }

    /**
    * @Route("/page-lvl3")
    */
    public function pageLvl3()
    {
      return $this->render('pages/page_lvl3.html.twig');
    }

    /**
    * @Route("/page-simple")
    */
    public function pageSimple()
    {
      return $this->render('pages/page_simple.html.twig');
    }
    
     /**
    * @Route("/page-good-deal")
    */
    public function pageGoodDeal()
    {
      return $this->render('pages/page_good_deal.html.twig');
    }

    /**
    * @Route("/contact")
    */
    public function contact()
    {
      return $this->render('pages/contact.html.twig');
    }

   /**
    * @Route("/page-form")
    */
    public function pageForm()
    {
      return $this->render('pages/page_form.html.twig');
    }

    /**
    * @Route("/brochure")
    */
    public function brochure()
    {
      return $this->render('pages/brochure.html.twig');
    }

    /**
    * @Route("/gallery")
    */
    public function gallery()
    {
      return $this->render('pages/gallery.html.twig');
    }

    /**
    * @Route("/about")
    */
    public function about()
    {
      return $this->render('pages/about.html.twig');
    }

    /**
    * @Route("/job")
    */
    public function job()
    {
      return $this->render('pages/job.html.twig');
    }
  

    /**
    * @Route("/job-detail")
    */
    public function jobDetail()
    {
      return $this->render('pages/job_detail.html.twig');
    }

        /**
    * @Route("/page-template")
    */
    public function pageTemplate()
    {
      return $this->render('pages/page_template.html.twig');
    }



    /**
    * @Route("/icon-lib")
    */
    public function icon()
    {
      return $this->render('pages/icons_lib.html.twig');
    }

    /**
    * @Route("/sitemap")
    */
    public function sitemap()
    {
      return $this->render('pages/sitemap.html.twig');
    }

}