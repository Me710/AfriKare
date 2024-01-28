<?php
class Consultation
{
    private $clef;
    private $id_patient;
    private $symptome;
    private $duration;
    private $pression;
    private $frequence;
    private $diagnostic;
    private $traitement;

    public function __construct($clef, $id_patient, $symptome, $duration, $pression, $frequence, $diagnostic, $traitement)
    {
        $this->clef = $clef;
        $this->id_patient = $id_patient;
        $this->symptome = $symptome;
        $this->duration = $duration;
        $this->pression = $pression;
        $this->frequence = $frequence;
        $this->diagnostic = $diagnostic;
        $this->traitement = $traitement;
    }

    public function get_clef()
    {
        return $this->clef;
    }

    public function set_clef($clef)
    {
        $this->clef = $clef;
    }

    public function get_id_patient()
    {
        return $this->id_patient;
    }

    public function set_id_patient($id_patient)
    {
        $this->id_patient = $id_patient;
    }

    public function get_symptome()
    {
        return $this->symptome;
    }

    public function set_symptome($symptome)
    {
        $this->symptome = $symptome;
    }

    public function get_duration()
    {
        return $this->duration;
    }

    public function set_duration($duration)
    {
        $this->duration = $duration;
    }

    public function get_pression()
    {
        return $this->pression;
    }

    public function set_pression($pression)
    {
        $this->pression = $pression;
    }

    public function get_frequence()
    {
        return $this->frequence;
    }

    public function set_frequence($frequence)
    {
        $this->frequence = $frequence;
    }

    public function get_diagnostic()
    {
        return $this->diagnostic;
    }

    public function set_diagnostic($diagnostic)
    {
        $this->diagnostic = $diagnostic;
    }

    public function get_traitement()
    {
        return $this->traitement;
    }

    public function set_traitement($traitement)
    {
        $this->traitement = $traitement;
    }
}
