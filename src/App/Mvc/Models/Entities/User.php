<?php

namespace App\Mvc\Models\Entities;

use WebDevBr\Mvc\Models\Entity;

/**
 * @Entity @Table(name="usuarios")
 **/
class User extends Entity
{
	/** @Id @Column(type="integer") @GeneratedValue **/
	protected $id;

	/** @Column(type="string") **/
	protected $name;

	/** @Column(type="string") **/
	protected $email;

	/** @Column(type="string") **/
	protected $password;
}