<?php

namespace Dotenv;

use Dotenv\Exception\InvalidFileException;
use Dotenv\Exception\InvalidPathException;

interface LoaderInterface
{
	/**
     * Set immutable value.
     *
     * @param bool $immutable
     * @return $this
     */
    public function setImmutable($immutable = false);

    /**
     * Load `.env` file in given directory.
     *
     * @return array
     */
    public function load();

    /**
     * Search the different places for environment variables and return first value found.
     *
     * @param string $name
     *
     * @return string|null
     */
    public function getEnvironmentVariable($name);
}
