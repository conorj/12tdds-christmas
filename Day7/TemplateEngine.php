<?php
/**
 * This is part 7 of the 12 TDDs of Christmas as appeared on
 * http://www.wiredtothemoon.com/
 *
 * Template Engine
 * Task: Write a “template engine” meaning a way to transform template
 * strings, “Hello {$name}” into “instanced” strings
 *
 * @author Conor Ryan <conor.ryan1302@gmail.com>
 */
class TemplateEngine {
    private $mapOfVariables = array();

    /**
     * setVariable
     *
     * set variable value to be used when evaluating template
     *
     * @param string $name
     * @param string $value
     * @access public
     * @return void
     */
    public function setVariable($name, $value)
    {
        $this->mapOfVariables[$name] = $value;
    }

    /**
     * getVariable
     *
     * @param string $name
     * @access public
     * @return string or boolean false if variable not set
     */
    public function getVariable($name)
    {
        if (array_key_exists($name,$this->mapOfVariables)) {
            return $this->mapOfVariables[$name];
        }

        return false;
    }

    public function evaluate($templateStr)
    {
	preg_match_all('/\{\$[^}]+\}/',$templateStr,$placeholders);
	foreach ($placeholders[0] as $placeholder) {
	    $replace = $this->processPlaceholder($placeholder);
	    $templateStr = str_replace($placeholder,$replace,$templateStr);
	}
        return $templateStr;
    }

    private function processPlaceholder($placeholder)
    {
        $key = str_replace(array('{','}','$'),'',$placeholder);
	if (array_key_exists($key,$this->mapOfVariables)) {
	    return $this->mapOfVariables[$key];
	} else {
	    throw new MissingValueException;
	}
        
    }
}
class MissingValueException extends Exception
{
}
