<?php

namespace App\Leilao\Service;

use App\Leilao\Model\Leilao;

class Avaliador
{
    private $maiorValor = -INF;

    public function avalia(Leilao $leilao): void
    {
        $lances = $leilao->getLances();
        $ultimoLance = $lances[count($lances) - 1];
        $this->maiorValor = $ultimoLance->getValor();

        foreach ($leilao->getLances() as $lance) {
            if ($lance->getValor() > $this->maiorValor) {
                $this->maiorValor = $lance->getValor();
            }
        }
    }

    public function getMaiorValor(): float
    {
        return $this->maiorValor;
    }
}
