<?php
include '../../cadastrodeusuario/cadastrodeusuario.php';

class Conteudo extends Cadastro de Usuario{
	private $Nome;
    private $Ultimo_nome;
    private $Telefone;
    private $Senha;
    private $RG_id;
    private $CPF_id;

    function getNome() {
        return $this->Nome;
    }

    function getUltimo_nome() {
        return $this->Ultimo_nome;
    }

    function getTelefone() {
        return $this->Telefone;
    }

    function getSenha_id() {
        return $this->Senha;
    }

    function getRG_id() {
        return $this->RG_id;
    }

    function getCPF_id() {
        return $this->CPF_id;
    }

    function setNome($nome) {
        $this->Nome = $Nome;
    }

    function setUltimo_nome($Ultimo_nome) {
        $this->Ultimo_nome = $Ultimo_nome;
    }

    function setTelefone($Telefone) {
        $this->Telefone = $Telefone;
    }

    function setSenha($Senha) {
        $this->Senha = $Senha;
    }

    function setRG_id($RG_id) {
        $this->RG_id = $RG_id;
    }

    function setCPF_id($CPF_id) {
        $this->CPF_id = $CPF_id;
    }

    public function insert($obj){
    	$sql = "INSERT INTO conteudo(titulo,descricao,horario,curso_id,periodo_id,disciplina_id) VALUES (:titulo,:descricao,:horario,:curso_id,:periodo_id,:disciplina_id)";
    	$consulta = Conexao::prepare($sql);
        $consulta->bindValue('Nome',  $obj->Nome);
        $consulta->bindValue('Ultimo_nome', $obj->Ultimo_nome);
        $consulta->bindValue('Telefone' , $obj->Telefone);
        $consulta->bindValue('Senha' , $obj->Senha);
        $consulta->bindValue('RG_id' , $obj->RG_id);
        $consulta->bindValue('CPF_id' , $obj->CPF_id);
    	return $consulta->execute();

	}

	public function update($obj,$id = null){
		$sql = "UPDATE conteudo SET titulo = :Nome, Ultimo_nome = :Ultimo_Nome,Telefone = :Senha, Senha = :RG_id,RG_id =:RG_id, CPF_id = :CPF_id WHERE id = :id ";
		$consulta = Conexao::prepare($sql);
		$consulta->bindValue('Nome', $obj->Nome);
		$consulta->bindValue('Ultimo_Nome', $obj->Ultimo_Nome);
		$consulta->bindValue('Telefone' , $obj->Telefone);
		$consulta->bindValue('Senha', $obj->Senha);
		$consulta->bindValue('RG_id' , $obj->RG_id);
		$consulta->bindValue('CPF_id' , $obj->CPF_id);
		$consulta->bindValue('id', $id);
		return $consulta->execute();
	}

	public function delete($obj,$id = null){
		$sql =  "DELETE FROM conteudo WHERE id = :id";
		$consulta = Conexao::prepare($sql);
		$consulta->bindValue('id',$id);
		$consulta->execute();
	}

	public function find($id = null){

	}

	public function findAll(){
		$sql = "SELECT * FROM conteudo";
		$consulta = Conexao::prepare($sql);
		$consulta->execute();
		return $consulta->fetchAll();
	}

}

?>
