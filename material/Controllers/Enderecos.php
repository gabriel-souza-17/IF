<?php

namespace Controllers;

require_once("Models/Database.php");
require_once("Config/Helpers.php");

use Models\Database as Conexao;
use \PDO;

class Enderecos{

    private $enderecos;
    private $usuarios;
    private $cidades;
    
    function __construct(){
        $this->enderecos = new Conexao('enderecos');
        $this->usuarios = new Conexao('usuarios');
        $this->cidades = new Conexao('cidades');
    }

    protected function redirect($path, $message = null) {
        if ($message) {
            $_SESSION['msg'] = $message;
        }
        header("Location: {$path}");
        exit;
    }

    // Chama o formulário de cadastro
    function new(){
        $data = [];
        $data['cidades'] = $this->cidades->select($join=null, $where=null,$order=null,$limit=null)->fetchAll(PDO::FETCH_CLASS);
        $data['usuarios'] = $this->usuarios->select($join=null, $where=null,$order=null,$limit=null)->fetchAll(PDO::FETCH_CLASS);
        $data['enderecos'] = (object) [
            'enderecos_id' => '',
            'enderecos_nome' => '',
            'enderecos_logradouro' => '',
            'enderecos_numero' => '',
            'enderecos_complemento' => '',
            'enderecos_cep' => '',

        ];
        $data['pagina'] = 'Cadastrar enderecos';
        $data['method'] = 'save';
        return view('enderecos/form',$data);
    }

    // C - Função Cadastrar
    function save(){
        $data = [];
        $requests = $_POST;

        $values = [
            'enderecos_nome'=> $requests['enderecos_nome'],
            'enderecos_logradouro'=> $requests['enderecos_logradouro'],
            'enderecos_numero'=> $requests['enderecos_numero'],
            'enderecos_complemento'=> $requests['enderecos_complemento'],
            'enderecos_cep'=> $requests['enderecos_cep'],
            'enderecos_usuarios_id'=> $requests['enderecos_usuarios_id'],
            'enderecos_cidades_id'=> $requests['enderecos_cidades_id'],
            ];

        if($this->enderecos->insert($values)){
            $data['msg'] = flash('Cadastrado com Sucesso!');
        }else{
            $data['msg'] = flash('Não foi cadastrado!','danger');
        }

        $join = 'cidades on cidades_id = enderecos_cidades_id INNER JOIN usuarios on usuarios_id = enderecos_usuarios_id';
        $data['enderecos'] = $this->enderecos->select($join, $where=null,$order=null,$limit=null)->fetchAll(PDO::FETCH_CLASS);
        $data['pagina'] = 'Listar enderecos';
        return view('enderecos/index',$data);

    }


    //R - Função Listar todas os registros de uma tabela do BD
    function index(){
        $data = [];
        $join = 'cidades on cidades_id = enderecos_cidades_id INNER JOIN usuarios on usuarios_id = enderecos_usuarios_id';
        $data['enderecos'] = $this->enderecos->select($join, $where=null,$order=null,$limit=null)->fetchAll(PDO::FETCH_CLASS);
        $data['pagina'] = 'Listar enderecos';
        $data['msg'] = '';
        return view('enderecos/index',$data);
    }

    //R - Função editar  - Lista um registro da tabela filtrado por id
    function edit($id){
        $data = [];
         $data['cidades'] = $this->cidades->select($join=null, $where=null,$order=null,$limit=null)->fetchAll(PDO::FETCH_CLASS);
        $data['usuarios'] = $this->usuarios->select($join=null, $where=null,$order=null,$limit=null)->fetchAll(PDO::FETCH_CLASS);
        
        $id = (int) $id;
        $data['enderecos'] = $this->enderecos->select($join=null,'enderecos_id = '.$id)->fetchObject();
        $data['pagina'] = 'Alterar enderecos';
        $data['method'] = 'edit_save';

        return view('enderecos/form',$data);
    }

    //R - Função Pesquisar por um valor
    function search(){
        $data = [];
        $requests = $_POST;
        $data['msg'] = '';
        if(isset($requests['pesquisar'])){
            $order = null;
            $limit = null;
            $join = 'cidades on cidades_id = enderecos_cidades_id INNER JOIN usuarios on usuarios_id = enderecos_usuarios_id';
            $where = 'usuarios_nome like "%'.$requests['pesquisar'].'%"'; 
            $data['enderecos'] = $this->enderecos->select($join,$where,$order,$limit)->fetchAll(PDO::FETCH_CLASS);
            $data['msg'] = flash("Total de registros: ".count($data['enderecos']));

            $data['pagina'] = 'Pesquisar enderecos';
            return view('enderecos/index',$data);

        }else{
            $this->index();
        }
        

    }

    //U - Função Alterar
    function edit_save(){
        $data = [];
        $requests = $_POST;
        $values = [
            'enderecos_nome'=> $requests['enderecos_nome'],
            'enderecos_logradouro'=> $requests['enderecos_logradouro'],
            'enderecos_numero'=> $requests['enderecos_numero'],
            'enderecos_complemento'=> $requests['enderecos_complemento'],
            'enderecos_cep'=> $requests['enderecos_cep'],
            'enderecos_usuarios_id'=> $requests['enderecos_usuarios_id'],
            'enderecos_cidades_id'=> $requests['enderecos_cidades_id'],
                ];

        if($this->enderecos->update('enderecos_id = '.$requests['enderecos_id'],$values)){
            $data['msg'] = flash('Alterado com Sucesso!');
        }else{
            $data['msg'] = flash('Não foi alterado!','danger');
        }
        
        $join = 'cidades on cidades_id = enderecos_cidades_id INNER JOIN usuarios on usuarios_id = enderecos_usuarios_id';
        $data['enderecos'] = $this->enderecos->select($join, $where=null,$order=null,$limit=null)->fetchAll(PDO::FETCH_CLASS);
        $data['pagina'] = 'Listar enderecos';
        return view('enderecos/index',$data);

    }

    //D - Função Deletar
    function delete($id){
        $id = (int) $id;
        $data = [];
        if($this->enderecos->delete('enderecos_id = '.$id)){
            $data['msg'] = flash("Excluido com Sucesso!");
        }else{
            $data['msg'] = flash("Não foi Excluido!","danger");
        }
        $data['enderecos'] = $this->enderecos->select($join=null, $where=null,$order=null,$limit=null)->fetchAll(PDO::FETCH_CLASS);
        $data['pagina'] = 'Listar enderecos';
        return view('enderecos/index',$data);

    }
}



