<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\ApiResource;

/**
 * A question
 */
#[ApiResource]
class Question
{
	/**
	 * The id of the question
	 */
	private ?int $id = null;

	/**
	 * The contents of the question
	 */
	private string $question = '';

	/**
	 * The date that the question was added
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