<?php

namespace AppBundle\Controller;

use AppBundle\Model\Feeds;
use Core\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FeedController extends Controller
{
    public function addAction()
    {
        if ($this->session->get('auth')) {
            $this->view->render('admin/feed/add', 'layout');
        } else {
            return new RedirectResponse('/');
        }
        return new Response();
    }

    public function insertAction(Request $request)
    {
        if ($this->session->get('auth')) {
            $source = $request->request->get('source');
            $rss = $request->request->get('rss');
            $enabled = $request->request->get('enabled');

            $model = new Feeds();
            $model->insertFeed(array($source, $rss, $enabled));

            return new RedirectResponse('/admin/dashboard');

        } else {
            return new RedirectResponse('/');
        }
    }

    public function editAction($id)
    {
        if ($this->session->get('auth')) {

            $model = new Feeds();
            $feed = $model->editFeed($id);

            $this->view->render('admin/feed/edit', 'layout', array(
                'feed' => $feed
            ));

        } else {
            return new RedirectResponse('/');
        }

        return new Response();
    }

    public function updateAction($id, Request $request)
    {
        if ($this->session->get('auth')) {

            $source = $request->request->get('source');
            $rss = $request->request->get('rss');
            $enabled = $request->request->get('enabled');

            $model = new Feeds();
            $model->updateFeed(array($source, $rss, $enabled, $id));

            return new RedirectResponse('/admin/dashboard');

        } else {
            return new RedirectResponse('/');
        }
        return new Response();
    }

    public function deleteAction($id)
    {
        if ($this->session->get('auth')) {

            $model = new Feeds();
            $model->deleteFeed($id);

            return new RedirectResponse('/admin/dashboard');

        } else {
            return new RedirectResponse('/');
        }
        return new Response();
    }
}