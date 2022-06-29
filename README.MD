# API Restful Laravel-8

Em caso de dados especificados incorretamente nas solicitações, uma resposta virá com 
{ Validation-error ou Unauthorized }, validação incorreta fornecida.


O banco de dados pode ser encontrado entre os arquivos. Seu nome é "module2.sql" .

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

#### Metodo a utilizar: (GET)  
http://localhost:8000/api/cadastros

Solicitação de pesquisa de cadastros pelo nome "cadastrado  ou documento .

A pesquisa não diferencia maiúsculas de minúsculas.

#### Ao enviar uma solicitação, certifique-se de passar o parâmetro de consulta, que pode conter um dos seguintes valores:

nome de cadastro (nome completo ou primeiro e ultimo nome)

numero do documento (somente numeros )

Código documento C-DOC (RG, CPF, etc.)

Exemplo :
http://localhost:8000/api/cadastro?query=RG

Exemplo: http://localhost:8000/api/cadastro?query=CPF

A resposta ao exemplo acima deve retornar ao RG ou CPF do cadastrado .

