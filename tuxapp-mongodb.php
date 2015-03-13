<?
exit;
// exemplo mongodb: https://github.com/mongolab/mongodb-driver-examples/blob/master/php/php_simple_example.php
$uri = "  mongodb://tuxusr:test123@ds063870.mongolab.com:63870/tuxapp";
$options = array("connectTimeoutMS" => 30000);

//conecta
$client = new MongoClient($uri, $options );
//seleciona banco
$db = $client->selectDB("tuxapp");

//seleciona coleção (tabela)
$usuarios = $db->usuarios;

//monta dados
$dadosUsuarios = array(
	array(
		'nome' => 'Hugo',
		'email' => 'hugo@mail.com',
		'usuario' => 'huguinho',
		'senha' => '123hugo'
	),
	array(
		'nome' => 'Jose',
		'email' => 'jose@mail.com',
		'usuario' => 'zezinho',
		'senha' => '123jose'
	),
	array(
		'nome' => 'Luiz',
		'email' => 'luiz@mail.com',
		'usuario' => 'luizinho',
		'senha' => '123luiz'
	),
);

//insere os dados
$usuarios->batchInsert($dadosUsuarios);

//exibe dados
$query = array('usuarios' => array('$gte' => 10));
$cursor = $usuarios->find($query);
foreach($cursor as $doc) {
	echo '<p>Nome: ' .$doc['nome']. ' ('.$doc['email'].')';
	echo '<small><br>&nbsp;&nbsp; Usuario: ' .$doc['usuario'];
	echo ' | Senha:  ' .$doc['senha'] . '</small></p>';
}

//fecha conexão
$client->close();

