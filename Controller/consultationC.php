<?php

class ConsultationC
{
    function afficher()
    {
        $sql = "SELECT * FROM consultation ORDER BY id DESC";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }


    function addConsultation($consultation)
    {
        $sql = "INSERT INTO `consultation` (`clef`, `id_patient`, `symptome`, `duration`, `pression`, `frequence`, `diagnostic`, `traitement`)
            VALUES (:clef, :id_patient, :symptome, :duration, :pression, :frequence, :diagnostic, :traitement)";

        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':clef', $consultation->getClef(), PDO::PARAM_STR);
            $query->bindValue(':id_patient', $consultation->getIdPatient(), PDO::PARAM_INT);
            $query->bindValue(':symptome', $consultation->getSymptome(), PDO::PARAM_STR);
            $query->bindValue(':duration', $consultation->getDuration(), PDO::PARAM_INT);
            $query->bindValue(':pression', $consultation->getPression(), PDO::PARAM_STR);
            $query->bindValue(':frequence', $consultation->getFrequence(), PDO::PARAM_STR);
            $query->bindValue(':diagnostic', $consultation->getDiagnostic(), PDO::PARAM_STR);
            $query->bindValue(':traitement', $consultation->getTraitement(), PDO::PARAM_STR);

            $query->execute();
        } catch (PDOException $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
    function afficherDerniereConsultation()
    {
        $sql = "SELECT * FROM consultation ORDER BY id DESC LIMIT 1";
        $db = config::getConnexion();
        try {
            $query = $db->query($sql);
            $consultation = $query->fetch(PDO::FETCH_ASSOC);
            return $consultation;
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }
}
