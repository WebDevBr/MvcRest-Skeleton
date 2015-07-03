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