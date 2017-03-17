<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use AppBundle\Model\NewsModel;
use AppBundle\Utils\Pagination;
use Core\Controller;

class DefaultController extends Controller
{
    public function indexAction($page = 1)
    {
        $model = new NewsModel();
        $total = $model->getAllNews();
        $data = $model->getListForPagination($page);
        $pagination = new Pagination($total, $page, NewsModel::SHOW_BY_DEFAULT, 'page-');

        $this->view->render('news/index', 'layout', array(
                'news' => $data,
                'pagination' => $pagination
            )
        );

        return new Response();
    }
}