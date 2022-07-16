<p align="center"><a href="#!" target="_blank"><img src="https://user-images.githubusercontent.com/14093492/179338639-560f9958-e627-4645-8c94-1e147f77fe78.svg" width="400"></a></p>


## Sobre o Teste

O desafio consiste no desenvolvimento de uma API para cadastro de bolos, contendo uma listagem de pessoas interessados na compra, além da gestão de envios de e-mail baseado em filas (queues).

## Sobre o Projeto

O projeto foi desenvolvido utilizando PHP 8.1, Laravel 9, MySQL 8, Redis, MailHog e Sail.

## Requisitos obrigatórios finalizados
1. :heavy_check_mark: Criar um CRUD de rotas de API para o cadastro de bolos.
2. :heavy_check_mark: Os bolos deverão ter Nome, Peso (em gramas), Valor, Quantidade disponível e uma lista de e-mail de interessados.
3. :heavy_check_mark: Após o cadastro de e-mails interessados, caso haja bolo disponível, o sistema deve enviar um e-mail para os interessados sobre a disponibilidade do bolo.
4. :heavy_check_mark: Pode ocorrer de 50.000 clientes se cadastrarem e o processo de envio de emails não deve ser algo impeditivo.
5. :heavy_check_mark: Utilizar fila para o envio de e-mails.
6. :heavy_check_mark: Utilizar Resources para construção da API.


## Como executar a aplicação
#### 1 - Clone o projeto
```SHELL
git clone git@github.com:lsnepomuceno/laravel-checklist-test.git && cd laravel-checklist-test
```

#### 2 - Execute o script de automação da instalação
```SHELL
make install
```

#### 3 - Caso queira adicionar o virtual-host no seu arquivo de hosts, basta executar o comando abaixo
```SHELL
sudo sed -i "127.0.0.1   laravel-checklist-test.test/" /etc/hosts
```
##### Caso não esteja em ambiente Linux, basta adicionar o mapeamento acima no arquivo de hosts do seu sistema

## Execução do projeto
#### Por ser tratar de uma API, é necessário utilizar um client Rest.
Para facilitar a análise, disponibilizei a documentação das rotas via PostMan:

[![Run in Postman](https://run.pstmn.io/button.svg)](https://documenter.getpostman.com/view/12685679/UzQvs4eg)
<hr />

#### Acesso externo ao MySQL
<table>
    <tr>
        <td><b>Host</b></td>       
        <td>localhost</td>       
    </tr>
    <tr>
        <td><b>Port</b></td>       
        <td>3306</td>       
    </tr>
    <tr>
        <td><b>User</b></td>       
        <td>sail</td>       
    </tr>
    <tr>
        <td><b>Pass</b></td>       
        <td>password</td>       
    </tr>
    <tr>
        <td><b>DB</b></td>       
        <td>laravel_checklist_test</td>       
    </tr>
</table>

#### Acesso ao dashboard do MailHog
<table>
    <tr>
        <td><b>URL</b></td>       
        <td>http://localhost:8025</td>       
    </tr>
</table>
<hr />

## Testes automatizados
Durante a instalação os testes já são executados no final do processo, mas caso queira executar manualmente, basta executar o comando abaixo:
```SHELL
 docker exec -it checklist-test-app php artisan test
```
