<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * Usuarios
 *
 * @ORM\Table(name="ruta_tapa_mengibar_usuarios")
 * @ORM\Entity
 *
 */

/*
 *  * @ORM\AttributeOverrides({
 *      @ORM\AttributeOverride(name="email",
 *          column=@ORM\Column(
*               name = "email",
 *              type = "string",
 *              length = 180,
 *              unique=false
 *          )
 *      ),
 *     @ORM\AttributeOverride(name="emailCanonical",
 *          column=@ORM\Column(
 *              name = "email_canonical",
 *              type = "string",
 *              length = 180,
 *              unique=false
 *          )
 *      )
 * })
 */
class Usuario extends BaseUser
{
	/**
	 * @var string
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @return string
	 */
	public function getId() {
		return $this->id;
	}

}

