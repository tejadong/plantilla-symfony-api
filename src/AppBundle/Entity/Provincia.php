<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Provincia
 *
 * @ORM\Entity
 * @ORM\Table(name="provincias")
 */
class Provincia {
	/**
	 * @var int
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Comunidad", inversedBy="provincias")
	 * @ORM\JoinColumn(nullable=false)
	 */
	private $comunidad;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="codigo", type="string", length=2, nullable=false, unique=true)
	 */
	private $codigo;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="nombre", type="string", length=255)
	 */
	private $nombre;

	/**
	 * @ORM\OneToMany(targetEntity="AppBundle\Entity\Municipio", mappedBy="provincia")
	 */
	private $municipios;

	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param int $id
	 *
	 * @return Provincia
	 */
	public function setId( $id ) {
		$this->id = $id;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getComunidad() {
		return $this->comunidad;
	}

	/**
	 * @param mixed $comunidad
	 *
	 * @return Provincia
	 */
	public function setComunidad( $comunidad ) {
		$this->comunidad = $comunidad;

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
	 * @return Provincia
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
	 * @return Provincia
	 */
	public function setNombre( $nombre ) {
		$this->nombre = $nombre;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getMunicipios() {
		return $this->municipios;
	}

	/**
	 * @param mixed $municipios
	 *
	 * @return Provincia
	 */
	public function setMunicipios( $municipios ) {
		$this->municipios = $municipios;

		return $this;
	}

	public function __toString() {
		return $this->nombre;
	}
}