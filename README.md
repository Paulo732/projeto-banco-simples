 Banco Digital - Projeto em PHP com POO.
Esse projeto nasceu como parte dos meus estudos em Programação Orientada a Objetos com PHP.
A ideia foi simular o funcionamento básico de uma conta bancária digital, aplicando na prática conceitos como:

Encapsulamento
Atributos privados
Métodos públicos
Sessões
Organização de código em classes

Mais do que "funcionar", o objetivo foi entender como estruturar a lógica de negócio corretamente.

O sistema simula as principais operações de uma conta bancária:
Abrir Conta
Permite criar uma conta informando:
Nome do cliente
Número da conta
Tipo da conta:
Conta Corrente (CC) → mensalidade de R$ 12,00
Conta Poupança (CP) → mensalidade de R$ 20,00

 Depositar
Adiciona valores ao saldo da conta.

 Sacar
Permite retirar valores, validando se há saldo suficiente.

 Pagar Mensalidade
Debita automaticamente o valor da taxa conforme o tipo da conta.

 Fechar Conta
A conta só pode ser encerrada se o saldo estiver exatamente R$ 0,00, simulando uma regra real de negócio.

 Painel de Controle
Exibe em tempo real:
Nome do cliente
Número da conta
Tipo
Saldo
Status (Ativa/Inativa)

 Tecnologias Utilizadas
PHP → Lógica do sistema e orientação a objetos
HTML5 e CSS3 → Estrutura e estilização
Bootstrap 5 → Layout responsivo e componentes visuais
JavaScript → Pequenas interações (como alertas dinâmicos)

 Estrutura do Projeto
 contabanco.php
Contém a classe ContaBanco, onde estão definidos os atributos privados e os métodos responsáveis pelas regras do sistema.

 index.php
Arquivo principal. Gerencia sessão, recebe requisições POST (depósito, saque, etc.) e exibe o painel da conta.

 abrir_conta.php
Formulário inicial para criação da conta quando não há uma sessão ativa.

 Como executar o projeto
Instale um servidor local com PHP (ex: XAMPP, Laragon ou Docker).
Coloque a pasta do projeto dentro do diretório público (ex: htdocs).
Acesse no navegador:
http://localhost/POO-PHP/ProjetoBanco/index.php

 Objetivo do Projeto
Esse projeto foi desenvolvido com foco em:
Praticar POO na prática
Melhorar organização de código
Entender regras de negócio
Simular um pequeno sistema real
É um projeto simples, mas representa um passo importante na minha evolução como desenvolvedor PHP.