<?php

namespace Source\App;

use Source\Models\User;

class UserService
{
    private $user;
    private $result = [];
    private $arr = [];

    public function __construct()
    {
        $this->user = new User();
    }


    // Função que Captura Usuário
    public function get($data = null)
    {
        if ($data) {

            $user = $this->user->find("id = :uid", "uid={$data['id_user']}")->fetch(true);

            if ($user > 0) {

                $this->result['status'] = "success";

                foreach ($user as $data) {
                    $this->result['data'] = $data->data();
                }

                echo json_encode($this->result, JSON_UNESCAPED_UNICODE);
            } else {
                http_response_code(404);
                $result['status'] = "error";
                $result['data'] = "Usuário Não encontrado";

                echo json_encode($result, JSON_UNESCAPED_UNICODE);
            }
        } else {

            $user = $this->user->find()->fetch(true);

            if ($user > 0) {

                $this->result['status'] = "success";

                foreach ($user as $data) {
                    $this->arr['id'] = $data->id;
                    $this->arr['email'] = $data->email;
                    $this->arr['password'] = $data->password;
                    $this->arr['name'] = $data->name;

                    $secondArray[] = $this->arr;
                }

                $this->result['data'] = $secondArray;
            } else {
                http_response_code(404);
                $this->result['status'] = "error";
                $this->result['data'] = "Nenhum Usuário encontrado";
            }

            echo json_encode($this->result, JSON_UNESCAPED_UNICODE);
        }
    }


    // Função que Insere Usuário
    public function post($data)
    {
        $this->user->email = $data['email'];
        $this->user->password = $data['pass'];
        $this->user->name = $data['name'];
        $response = $this->user->save();

        if ($response) {

            $this->result['status'] = "success";
            $this->result['data'] = "Usuário(a) Cadastrado(a) com sucesso";
        } else {
            http_response_code(404);
            $this->result['status'] = "Error";
            $this->result['data'] = "Não foi possível cadastrar Usuário";
        }
        echo json_encode($this->result, JSON_UNESCAPED_UNICODE);
    }


    // Função que Deleta Usuário
    public function delete($data)
    {
        $user = $this->user->find("id = :uid", "uid={$data['id_user']}")->count();

        if ($user > 0) {
            $user = $this->user->findById($data['id_user']);
            $response = $user->destroy();

            if ($response) {
                $this->result['status'] = "success";
                $this->result['data'] = "Usuário(a) Deletado(a) com sucesso";
            } else {
                http_response_code(404);
                $this->result['status'] = "error";
                $this->result['data'] = "Error ao Deletar Usuário(a)";
            }
        } else {
            http_response_code(404);
            $this->result['status'] = "error";
            $this->result['data'] = "Usuário(a) Não encontrado(a)";
        }

        echo json_encode($this->result, JSON_UNESCAPED_UNICODE);
    }


    
    // Função que Editar Usuário
    public function put($data)
    {
        $user = $this->user->findById($data['id_user']);
        $data['name'] != null ? $user->name = $data['name'] : null;
        $data['email'] != null ? $user->email = $data['email'] : null;
        $data['pass'] != null ? $user->password = $data['pass'] : null;
        $response = $user->save();

        if ($response) {
            $this->result['status'] = "success";
            $this->result['data'] = "Usuário(a) Atualizado(a) com sucesso";
        } else {
            http_response_code(404);
            $this->result['status'] = "error";
            $this->result['data'] = "Error ao Atualizar Usuário(a)";
        }

        echo json_encode($this->result);
    }
}
