<?php

namespace Dotenv;

class DockerSecretsLoader extends Loader
{
	/**
	 * @inheritdoc
	 */
    protected function splitCompoundStringIntoParts($name, $value)
    {
	    list($name, $value) = parent::splitCompoundStringIntoParts($name, $value);

        if (preg_match('/^(.+)_FILE$/', $name, $matches)) {
            $file = realpath($value);

            if (false === $file) {
                $file = realpath(dirname($this->filePath).'/'.$value);
            }

            if (false !== $file && is_readable($file)) {
                $name = $matches[1];
                $value = file_get_contents($file);
            }
        }

        return array($name, $value);
    }
}
