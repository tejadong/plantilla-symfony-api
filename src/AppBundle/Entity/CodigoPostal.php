<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * CodigoPostal
 *
 * @ORM\Entity
 * @ORM\Table(name="codigos_postales")
 *
 */
class CodigoPostal {
	/**
	 * @var int
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Municipio", inversedBy="codigosPostales")
	 * @ORM\JoinColumn(nullable=false)
	 */
	private $municipio;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="cod_postal", type="string", length=5)
	 */
	private $codPostal;

	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param int $id
	 *
	 * @return CodigoPostal
	 */
	public function setId( $id ) {
		$this->id = $id;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getMunicipio() {
		return $this->municipio;
	}

	/**
	 * @param mixed $municipio
	 *
	 * @return CodigoPostal
	 */
	public function setMunicipio( $municipio ) {
		$this->municipio = $municipio;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getCodPostal() {
		return $this->codPostal;
	}

	/**
	 * @param string $codPostal
	 *
	 * @return CodigoPostal
	 */
	public function setCodPostal( $codPostal ) {
		$this->codPostal = $codPostal;

		return $this;
	}

}