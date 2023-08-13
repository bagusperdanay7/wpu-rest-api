<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries\format.php';
require APPPATH . 'libraries\RestController.php';
use chriskacerguis\RestServer\RestController;

class Mahasiswa extends RestController {
    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('ModelMahasiswa', 'mahasiswa');
        
        // change the limit based your own desire 
        $this->methods['index_get']['limit'] = 10;
    }

    public function index_get()
    {
        // $mahasiswa = new ModelMahasiswa;
        // $result = $mahasiswa->getMahasiswa();

        $id = $this->get('id');
        
        if($id===null) {
            $mahasiswa = $this->mahasiswa->getMahasiswa();
        } else {
            $mahasiswa = $this->mahasiswa->getMahasiswa($id);
        }


        if ($mahasiswa) {
            $this->response([
                'status' => true,
                'data' => $mahasiswa
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Id Not Found'
            ], RestController::HTTP_NOT_FOUND);
        }
    }

    public function index_delete() {
        $id = $this->delete('id');

        // Validate the id.

        if ($id <= 0) {
            // Set the response and exit
            $this->response([
                'status' => false,
                'message' => 'provide an id!'
            ], RestController::HTTP_BAD_REQUEST); 
        } else {
            if ($this->mahasiswa->deleteMahasiswa($id) > 0) {
                // Okay
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'id has been deleted'
                ], RestController::HTTP_OK);
            } else {
                // id not found
                $this->response([
                    'status' => false,
                    'message' => 'id not found'
                ], RestController::HTTP_BAD_REQUEST); 
            }
        }
    }

    public function index_post() {
        $data = [
            'nrp' => $this->post('nrp'),
            'nama' => $this->post('nama'),
            'email' => $this->post('email'),
            'jurusan' => $this->post('jurusan'),
        ];

        if ($this->mahasiswa->createMahasiswa($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new mahasiswa has been created'
            ], RestController::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed to create New Mahasiswa!'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function index_put() {
        $id = $this->put('id');
        $data = [
            'nrp' => $this->put('nrp'),
            'nama' => $this->put('nama'),
            'email' => $this->put('email'),
            'jurusan' => $this->put('jurusan'),
        ];

        if ($this->mahasiswa->updateMahasiswa($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'mahasiswa has been updated'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed to update Mahasiswa!'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
}