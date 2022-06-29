# API Restful PHP/LARAVEL

Uma aplicação simples de cadastro de usuarios com banco de dados relacional desenvolvida em PHP,

utilizando arquitetura RESTful, enviando e consumindo dados no formato JSON.


Em caso de dados especificados incorretamente nas solicitações, uma resposta virá com 
{ Validation-error ou Unauthorized }, validação incorreta fornecida.


O banco de dados pode ser encontrado entre os arquivos. Seu nome é "Config.SQL" .

#### Metodo a utilizar: (POST)  

http://localhost:8000/api/register

Ao enviar uma solicitação, você deve passar um objeto com as seguintes propriedades:

- primeiro nome - campo obrigatório, string


- ultimo nome - campo obrigatório, string


- telefone - campo obrigatório e exclusivo, string


- numero documento - obrigatório, string de 10 dígitos (pode ser com um zero à esquerda)


- senha - campo obrigatório, string


#### Metodo a utilizar: Autenticação (POST)


http://localhost:8000/api/login

Ao enviar uma solicitação, você deve inseir um objeto com login (número de telefone) e senha;

#### { telefone senha } A resposta deve vir com um token de usuário gerado.

![687474703a2f2f636f6e65637465732e636f6d2e62722f6170695f6c61726176656c5f646f63732f706f7374746f6b656e65782e706e67](https://user-images.githubusercontent.com/107967231/176337018-ee45ba9c-6c4d-4450-a90e-be6b57a03399.png)



#### Metodo a utilizar: (GET)  
http://localhost:8000/api/cadastros

Solicitação de pesquisa de cadastros pelo nome "cadastrado  ou documento .

A pesquisa não diferencia maiúsculas de minúsculas.

#### Ao enviar uma solicitação, certifique-se de passar o parâmetro de consulta, que pode conter um dos seguintes valores:

nome de cadastro (nome completo ou primeiro e ultimo nome)

numero do documento (somente numeros )

Código Documento C-DOC (RG, CPF, etc.)

Exemplo :
http://localhost:8000/api/cadastro?query=RG

Exemplo: http://localhost:8000/api/cadastro?query=CPF

A resposta ao exemplo acima deve retornar ao RG ou CPF do cadastrado .

