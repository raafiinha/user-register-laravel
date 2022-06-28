<?php
// Operação  normal da API
header( 'Acesso-Controle-Permitir-Origem: *' );
header( 'Acesso-Controle-Permitir-Cabeçalhos: *' );
header( 'Métodos de Controle de Acesso-Permitir: *' );
header( 'Acesso-Controle-Permitir-Credenciais: true' );
header( 'Tipo de conteúdo: json/aplicativo' );				

requer " connect.php ";
requer " funções.php ";

// Salva o método atual em uma variável
$ método = $ _SERVER [ 'REQUEST_METHOD' ];

// Divida a URL de solicitação em partes
$ q = $ _GET [ 'q' ];
$ params = explodir( '/' , $ q );

$ api = $ params [ 0 ];
$ tipo = $ params [ 1 ];
$ id = $ params [ 2 ];
$ codigo = $ params [ 2 ];


/* Além disso, tudo é muito simples: verificamos a solicitação correspondente
	e chame a função desejada. Todas as funções estão descritas no arquivo functions.php. */
if ( $ método === 'POST' ) {
	if ( $ type === 'registrar' ) {
		addUser( $ connect , $ _POST );
	} elseif ( $ type === 'login' ) {
		login( $ conectar , $ _POST );
	
			// Aqui a mágica é feita abaixo para que possamos obter corretamente os dados de "body" - "raw" (estamos falando do Postman, já que a Api foi testada nele)

			$ data = file_get_contents( 'php://input' ); // Obtém dados em JSON
			$ data = json_decode( $ data , true ); //Decodifica do JSON para passar a variável como parâmetro
			booking( $ connect , $ data );	// Tudo está claro aqui, chamamos a função e passamos os dados para ela como o 2º parâmetro, que recebemos acima.
	}
}

if ( $ método === 'GET' ) {
	if ( $ tipo === '  documento' ) {
		aeroporto( $ connect , $ _GET [ 'consulta' ]);
	} elseif ( $ type === 'flight' ) {
		voo( $ connect , $ _GET );
	} elseif ( $ type === 'reserva' && isset( $ code )) {
		armorInfo( $ connect , $ code );
	} elseif ( $ api === 'usuário' && $ type === 'reserva' ) {
		// Aqui nós pegamos o Bearer e o passamos para a função com um check.
		$ cabeçalhos = apache_request_headers();
		$ token = $ headers [ 'Autorização' ];
		myBrone( $ connect , $ token );
	} elseif ( $ api === 'usuário' ) {
		// Aqui também obtemos o token do portador.
		$ cabeçalhos = apache_request_headers();
		$ token = $ headers [ 'Autorização' ];
		infoUser( $ connect , $ token );
	}
}
