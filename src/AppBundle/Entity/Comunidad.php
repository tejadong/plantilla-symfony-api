<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Comunidad
 *
 * @ORM\Entity
 * @ORM\Table(name="comunidades")
 */
class Comunidad {
	/**
	 * @var int
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="codigo", type="string", length=2, unique=true)
	 */
	private $codigo;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="nombre", type="string", length=255)
	 */
	private $nombre;

	/**
	 * @ORM\OneToMany(targetEntity="AppBundle\Entity\Provincia", mappedBy="comunidad")
	 */
	private $provincias;

	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param int $id
	 *
	 * @return Comunidad
	 */
	public function setId( $id ) {
		$this->id = $id;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getCodigo() {
		return $this->codigo;
	}

	/**
	 * @param string $codigo
	 *
	 * @return Comunidad
	 */
	public function setCodigo( $codigo ) {
		$this->codigo = $codigo;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getNombre() {
		return $this->nombre;
	}

	/**
	 * @param string $nombre
	 *
	 * @return Comunidad
	 */
	public function setNombre( $nombre ) {
		$this->nombre = $nombre;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getProvincias() {
		return $this->provincias;
	}

	/**
	 * @param mixed $provincias
	 *
	 * @return Comunidad
	 */
	public function setProvincias( $provincias ) {
		$this->provincias = $provincias;

		return $this;
	}

	public function __toString() {
		return $this->nombre;
	}
}