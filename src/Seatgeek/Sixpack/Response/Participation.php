<?php namespace Seatgeek\Sixpack\Response;

use Seatgeek\Sixpack\Response\Response;

class Participation extends Response
{
    private $control = null;

    public function __construct($jsonResponse, $meta, $control = null)
    {
        if ($control !== null) {
            $this->control = $control;
        }

        parent::__construct($jsonResponse, $meta);
    }

    public function getExperiment()
    {
        return $this->response->experiment;
    }

    public function getAlternative()
    {
        if (!$this->getSuccess()) {
            return $this->control;
        }
        return $this->response->alternative->name;
    }
}
