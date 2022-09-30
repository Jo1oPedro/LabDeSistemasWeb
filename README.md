# Trabalho de Laboratorio de sistemas web - UFJF / Base para o backend do Trainee da CodeJr

| **Sumário** |
|-------------|
| [Objetivos do repositorio](#objetivos-do-repositorio) |
| [Como executar o projeto inicial](#como-executar-o-projeto-inicial) |
| [Comandos atualmente presentes nesse repositorio](#comandos-atualmente-presentes-nesse-repositorio) |
| [Classe abstrata Controller](#classe-abstrata-controller) |

## Objetivos do repositorio
Objetivos do repositorio: Inicialmente o repositorio tinha como objetivo ser um trabalho a ser entregue para a disciplina de Laboratorio de sistemas web da UFJF, porém percebi que após introduzir o eloquent e programar alguns comandos dentro do sistema ele poderia ser utilizado também como base para o backend do trainee da CodeJr;

## Como executar o projeto inicial
\* É necessário ter o _PHP 8.0+_
1. Abra o Terminal na Pasta do Projeto;
2. Instale as dependências necessárias: `composer install`;
3. Atualize as dependências: `composer update`;
4. Rode o comando composer `dump-autoload`;
5. Crie um banco de dados `sql` com o nome de `sua preferencia e coloque o nome dele dentro do arquivo start_application que está dentro do diretorio bootstrap`;
6. Rode as migrations com o comando `php bootstrap run_all_migrations.php`;
7. Rode o comando: `php -S localhost:8080' ou sua porta de preferencia para iniciar o servidor;

## Comandos atualmente presentes nesse repositorio
1. `php bootstrap create_migration`: Comando responsavel por criar uma migration. Seus parametros são `1° o nome da tabela`, como por exemplo, "users", `2°: --m` , responsavel por criar uma Model junto a migration. A migration serve para auxiliar os desenvolvedores a manterem o controle das versões do banco de dados, já a model serve para representar o elemento de uma determinada tabela.

2. `php bootstrap run_all_migrations`: Comando responsavel por rodar todas as migrations dentro da pasta database\migrations. Esse comando vai fazer com que suas migrations passem a existir no banco de dados.

3. `php bootstrap down_all_migrations`: Comando responsavel por desfazer todas as migrations dentro da pasta database\migrations. Esse comando vai fazer com que suas migrations passem a não mais existir no banco de dados.

4. `php bootstrap make_controller`: Comando responsavel por criar um controller. Seu parametro é o `nome do controller`, a padronização para nome de controllers é a mesma padronização para nome de classes, então como exemplo, um controller de usuario tera o nome de `UsuarioController`, `2°: --resource`, responsavel por criar um controller com todos os metodos basícos de um controller. O controller serve como intermediario entre o usuario e o banco de dados, podendo chamar metodos que irão tratar dados ou redirecionando o usuario.

## Classe abstrata Controller 
  Essa class extendida por todos os controllers tem como objetivo `iniciar o eloquent e a session` do php em todos os controller.

