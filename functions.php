<?php
//////////////////////////////////////////////// / ///////////////////////////////////// Função de adicionar um usuário
function   addUser ( $ connect , $ data ) {
	// Validação de dados de entrada
	$ first_name = filter_var(trim( $ data [ 'primeiro_nome' ]), FILTER_SANITIZE_STRING );
	$ last_name = filter_var(trim( $ data [ 'ultimo_nome' ]), FILTER_SANITIZE_STRING );
	$ phone = filter_var(trim( $ data [ 'telefone' ]), FILTER_SANITIZE_STRING );
	$ senha = md5(filter_var(trim( $ dados [ 'senha' ]), FILTER_SANITIZE_STRING ));
	$ document_number = filter_var(trim( $ data [ 'numero_documento' ]), FILTER_SANITIZE_STRING );

	if (mb_strlen( $ primeiro_nome ) < 1 ||
		mb_strlen( $ ultimo_nome ) < 1 ||
		mb_strlen( $ telefone ) < 1 ||
		mb_strlen( $ senha ) < 1 ) {
		http_response_code( 422 );
		$ res =[
			'erro' => [
				'código' => 422 ,
				'message' => " Erro de validação ",
				'erros' => (objeto)[
					'erro' => 'todos os dados são obrigatórios'
				]
			]
		];
		echo json_encode( $ res );
		saída;
	}
	if (mb_strlen( $ document_number ) < 10 || mb_strlen( $ numero_documento ) > 10 ) {
		http_response_code( 422 );
		$ res =[
			'erro' => [
				'código' => 422 ,
				'message' => " Erro de validação ",
				'erros' => (objeto)[
					'error' => 'numero_documento deve ter 10 caracteres'
				]
			]
		];
		echo json_encode( $ res );
		saída;
	}

	$ api_token = uniqid().uniqid().uniqid();
	// Consulta ao banco de dados
	$ stmt = $ connect -> prepare (" INSERT INTO users(primeiro_nome, ultimo_nome, telefone, senha, dnumero_documento, api_token) VALUES(?, ?, ?, ?, ?, ?) ");
	$ stmt -> execute ([" $ ultimo_nome " , " $ ultimo_nome ", " $ telefone ", " $ senha ", " $ numero_documento ", " $ api_token "]);
	
	//Resposta da base
	if ( $ stmt -> rowCount () > 0 ) {
		http_response_code( 201 );
		$ res =[
			'status' => verdadeiro,
			'post_id' => $ connect -> lastInsertId ()
		];
	} senão {
		http_response_code( 404 );
		$ res =[
			'erro' => [
				'código' => 404 ,
				'message' => " Erro no banco de dados ",
				'erros' => [
					'erro'
				]
			]
		];
	}
	echo json_encode( $ res );
}

//////////////////////////////////////////////// / ///////////////////////////////////// Autenticação
função login ( $ connect , $ data ) {
	// Dados de validade
	$ phone = filter_var(trim( $ data [ 'telefone' ]), FILTER_SANITIZE_STRING );
	$ senha = md5(filter_var(trim( $ dados [ 'senha' ]), FILTER_SANITIZE_STRING ));

	if (mb_strlen( $ telefone ) < 1 || mb_strlen( $ senha ) < 1 ) {
		http_response_code( 422 );
		$ res =[
			'erro' => [
				'código' => 422 ,
				'message' => " Erro de validação ",
				'erros' => (objeto)[
					'error' => 'telefone e senha são obrigatórios'
				]
			]
		];
		echo json_encode( $ res );
		saída;
	}

	// Solicitação ao banco de dados
	$ stmt = $ connect -> prepare (" SELECT * FROM users WHERE phone = ? AND password = ? ");
	$ stmt -> executar ([" $ telefone ", " $ senha "]);
	$ sel = $ stmt -> buscar ( PDO :: FETCH_ASSOC );
	//resposta de saída
	if ( $ stmt -> rowCount () > 0 ) {
		http_response_code( 200 );
		$ res =[
			'dados' => [
				'token' => $ sel [ 'api_token' ]
			]
		];
		echo json_encode( $ res );
	} senão {
		http_response_code( 401 );
		$ res =[
			'erro' => [
				'código' => 401 ,
				'message' => " Não autorizado ",
				'erros' => [
					'telefone' => [ 'telefone ou senha incorreto' ]
				]
			]
		];
		echo json_encode( $ res );
		saída;
	}
}
///////////////////////////////////////////////// ///////////////////////////////////// Solicitação de pesquisa de cadastro
função  cadastros ( $ connect , $ query ) {
	$ consulta = filter_var(trim( $ consulta ), FILTER_SANITIZE_STRING );
	if (mb_strlen( $ consulta ) < 1 ) {
		http_response_code( 422 );
		$ res =[
			'erro' => [
				'código' => 422 ,
				'message' => " Erro de validação ",
				'erros' => ( objeto )[
					'erro' => 'consulta necessária'
				]
			]
		];
		echo json_encode( $ res );
		saída;
	}

	// Solicitação ao banco de dados
	$ consulta = '%' . $ consulta . '%' ;
	$ stmt = $ connect -> prepare (" SELECT * FROM airports WHERE city LIKE ? OR name LIKE ? OR iata LIKE ? ");
	$ stmt -> executar ([" $ consulta ", " $ consulta ", " $ consulta "]);
	$ sel = $ stmt -> buscar ( PDO :: FETCH_ASSOC );
	// Responda
	if ( $ stmt -> rowCount () > 0 ) {
		https_response_code( 200 );
		$ res =[
			'dados' => [
				'itens' => [
					'nome' => $ sel [ 'nome' ],
					'CDOC' => $ sel [ 'CDOC' ]
				]
			]
		];
		echo json_encode( $ res );
	} senão {
		http_response_code( 200 );
		$ res =[
			'dados' => [
				'itens' => []
			]
		];
		echo json_encode( $ res );
	}
}

}
