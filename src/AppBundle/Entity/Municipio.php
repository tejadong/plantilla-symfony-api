<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Municipio
 *
 * @ORM\Entity
 * @ORM\Table(name="municipios")
 */
class Municipio {
	/**
	 * @var int
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Provincia", inversedBy="municipios")
	 * @ORM\JoinColumn(nullable=false)
	 */
	private $provincia;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="codigo", type="string", length=3, nullable=true)
	 */
	private $codigo;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="dc", type="string", length=1, nullable=true)
	 */
	private $dc;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="nombre", type="string", length=255)
	 */
	private $nombre;


	/**
	 * @ORM\OneToMany(targetEntity="AppBundle\Entity\CodigoPostal", mappedBy="municipio")
	 */
	private $codigosPostales;


	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}


	/**
	 * @return mixed
	 */
	public function getProvincia() {
		return $this->provincia;
	}

	/**
	 * @param mixed $provincia
	 *
	 * @return Municipio
	 */
	public function setProvincia( $provincia ) {
		$this->provincia = $provincia;

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
	 * @return Municipio
	 */
	public function setCodigo( $codigo ) {
		$this->codigo = $codigo;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getDc() {
		return $this->dc;
	}

	/**
	 * @param string $dc
	 *
	 * @return Municipio
	 */
	public function setDc( $dc ) {
		$this->dc = $dc;

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
	 * @return Municipio
	 */
	public function setNombre( $nombre ) {
		$this->nombre = $nombre;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCodigosPostales() {
		return $this->codigosPostales;
	}

	/**
	 * @param mixed $codigosPostales
	 *
	 * @return Municipio
	 */
	public function setCodigosPostales( $codigosPostales ) {
		$this->codigosPostales = $codigosPostales;

		return $this;
	}

	public function __toString() {
		return $this->nombre;
	}

}