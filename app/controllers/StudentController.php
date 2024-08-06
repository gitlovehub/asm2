<?php
namespace App\Controllers;
use App\Models\Student;

class StudentController extends BaseController
{
    protected $st;

    public function __construct() {
        $this->st = new Student();
    }

    public function index() {
        $data = $this->st->selectAll();
        return $this->render('student.index', compact('data'));
    }

    public function create() {
        return $this->render('student.add');
    }

    public function store() {
        if (isset($_POST["btn-add"])) {
            
            $err = [];

            if (empty($_POST["name"])) {
                $err[] = 'Name is required.';
            }
            if (empty($_POST["year"])) {
                $err[] = 'Year is required.';
            }
            if (empty($_POST["phone"])) {
                $err[] = 'Phone is required.';
            }

            if (count($err)) {
                redirect('errors', $err, 'add');
            } else {
                $check = $this->st->insertStudent(null, $_POST["name"], $_POST["year"], $_POST["phone"]);
                if ($check) {
                    redirect('success', '', 'add');
                }
            }
        }
    }

    public function show($id) {
        $data = $this->st->idStudent($id);
        return $this->render('student.edit', compact('data'));
    }

    public function update($id) {
        if (isset($_POST["btn-save"])) {
            
            $err = [];

            if (empty($_POST["name"])) {
                $err[] = 'Name is required.';
            }
            if (empty($_POST["year"])) {
                $err[] = 'Year is required.';
            }
            if (empty($_POST["phone"])) {
                $err[] = 'Phone is required.';
            }

            $url = 'edit/'.$id;

            if (count($err)) {
                redirect('errors', $err, $url);
            } else {
                $check = $this->st->updatetStudent($id, $_POST["name"], $_POST["year"], $_POST["phone"]);
                if ($check) {
                    redirect('success', '', $url);
                }
            }
        }
    }

    public function delete($id) {
        $check = $this->st->deleteStudent($id);
        if ($check) {
            redirect('success', '', 'index');
        }
    }
    
}