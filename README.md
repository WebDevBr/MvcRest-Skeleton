# MVC Rest

## O que é

MVC Rest disponibiliza uma estrutura pronta para você criar suas aplicações RESTfull, é bem simples, basta mapear o banco de dados e ele faz o resto pra você.

## Instalação

Para instalar você pode usar o [Composer](http://getcomposer.org).

Rode o comando a baixo:

	composer create-project --prefer-dist webdevbr/mvc-rest-skeleton

Você ainda pode informar um diretório (o padrão é mvc-rest-slim), basta passar aonde quer instalar logo após o comando, exemplo:

	composer create-project --prefer-dist webdevbr/mvc-rest-skeleton app

Ele vai instalar a aplicação em um novo diretório **app**.

## Mapeamento dos dados

### A partir de um banco de dados

Para mapear os dados a partir de um banco de dados já existente use:

	bin/doctrine orm:convert-mapping --force --from-database annotation ./src/App/Mvc/Models/Entities

Toda entidade deve extender a class **WebDevBr\Mvc\Models\Entity**, por exemplo:

	<?php

	namespace App\Mvc\Models\Entities;

	use WebDevBr\Mvc\Models\Entity;

	/**
	 * @Entity @Table(name="pages")
	 **/
	class Page extends Entity
	{
		/** @Id @Column(type="integer") @GeneratedValue **/
		protected $id;

		/** @Column(type="string") **/
		protected $title;

		/** @Column(type="text") **/
		protected $content;

		/** @Column(type="string") **/
		protected $slug;
	}

A menos que você vá usar os métodos getters e setters você não precisa cria-los, apenas o mapeamento já está bom.

Todos os atributos da entidade devem ser **protected**, note que o Doctrine mapeia como **private**, desta forma não rola.

### Gerar um banco de dados a partir das entidades

Uma tarefa muito simples também, basta rodar o comando:

	bin/doctrine orm:schema-tool:create

Este é o formato que eu trabalho, eu crio as entidades e o Doctrine cria o banco pra mim.