<?php

namespace AppBundle\Controller;

use Core\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Model\Users;
use AppBundle\Model\Feeds;

class AdminController extends Controller
{
    public function loginAction()
    {
        if (!$this->session->get('auth')) {
            $this->view->render('auth/login', 'layout');
        } else {
            return new RedirectResponse('/admin/dashboard');
        }

        return new Response();
    }

    public function signinAction(Request $request)
    {
        $this->session->start();

        $login = $request->request->get('login');
        $password = $request->request->get('password');

        $model = new Users();
        $user = $model->getUser($login, $password);

        if ($user['login'] === $login && $user['password'] === md5($password)) {

            $this->session->set('auth', true);

            return new RedirectResponse('/admin/dashboard');

        } else {

            return new RedirectResponse('/admin');

        }
    }

    public function logoutAction()
    {
        $this->session->clear();

        return new RedirectResponse('/');
    }

    public function dashboardAction()
    {
        if ($this->session->get('auth')) {

            $model = new Feeds();
            $feeds = $model->getFeeds();

            $this->view->render('admin/dashboard', 'layout', array(
                'feeds' => $feeds
            ));
        } else {
            return new RedirectResponse('/');
        }
        return new Response();
    }

}