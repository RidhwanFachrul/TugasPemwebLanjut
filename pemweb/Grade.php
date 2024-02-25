<?php
class Grade {
    private $partisipasi;
    private $tugas;
    private $uts;
    private $uas;

    public function __construct($partisipasi, $tugas, $uts, $uas) {
        $this->partisipasi = $partisipasi;
        $this->tugas = $tugas;
        $this->uts = $uts;
        $this->uas = $uas;
    }

    public function validateInput() {
        if (!is_numeric($this->partisipasi) || !is_numeric($this->tugas) || !is_numeric($this->uts) || !is_numeric($this->uas)) {
            return false;
        }

        if ($this->partisipasi < 0 || $this->partisipasi > 100 || $this->tugas < 0 || $this->tugas > 100 || $this->uts < 0 || $this->uts > 100 || $this->uas < 0 || $this->uas > 100) {
            return false;
        }

        return true;
    }

    public function calculateNA() {
        if ($this->validateInput()) {
            $na = (0.2 * $this->partisipasi) + (0.3 * $this->tugas) + (0.25 * $this->uts) + (0.25 * $this->uas);
            return $na;
        } else {
            return null;
        }
    }

    public function convertToGrade($na) {
        if ($na !== null) {
            if ($na >= 85 && $na <= 100) {
                return 'A';
            } elseif ($na >= 80) {
                return 'AB';
            } elseif ($na >= 70) {
                return 'B';
            } elseif ($na >= 60) {
                return 'BC';
            } elseif ($na >= 50) {
                return 'C';
            } elseif ($na >= 40) {
                return 'D';
            } else {
                return 'E';
            }
        } else {
            return null;
        }
    }
}
?>