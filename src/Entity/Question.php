<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * A question
 * @ORM\Entity
 */
#[ApiResource]
class Question
{
	/**
	 * The id of the question
	 *
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 */
	private ?int $id = null;

	/**
	 * The contents of the question
	 *
	 * @ORM\Column(type="text")
	 */
	private string $question = '';

	/**
	 * The date that the question was added
	 *
	 * @ORM\Column(type="datetime")
	 */
	private ?\DateTimeInterface $addedDate = null;

	public function getQuestion(): string
	{
		return $this->question;
	}

	/**
	 * @return int|null
	 */
	public function getId(): ?int
	{
		return $this->id;
	}

	public function setQuestion(string $question): void
	{
		$this->question = $question;
	}

	public function getAddedDate(): ?\DateTimeInterface
	{
		return $this->addedDate;
	}

	public function setAddedDate(?\DateTimeInterface $addedDate): void
	{
		$this->addedDate = $addedDate;
	}

}