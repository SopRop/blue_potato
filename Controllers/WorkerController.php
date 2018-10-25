<?php

namespace Controller;

use Core\Controller;
use Core\View;
use \Model\Worker;


class WorkerController extends Controller
{
    public function index()
    {
        $workers = Worker::getAll();
        View::twig('workers.twig.html', ["workers" => $workers]);
    }

    public function search()
    {
        View::twig('search.twig.html', []);
    }

    public function find()
    {
        $column = $_POST['column'];
        $value = $_POST['value'];
       
        header("Location: /worker/getByProperty/$column/$value");
    }

    public function getByProperty($column, $value)
    {
        $worker = Worker::getByProperty($column, $value);
        View::twig('worker.twig.html', ["worker" => $worker[0]]);
    }
    
    public function getByID($id)
    {
        $worker = Worker::getByID($id);
        View::twig('worker.twig.html', ["worker" => $worker[0]]);
    }

}