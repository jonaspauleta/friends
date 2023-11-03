<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use function Laravel\Prompts\note;
use function Laravel\Prompts\select;

class Friends extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:friends';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all friends of the user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $fumasGanzaOptions = [
            0 => 'Sim',
            1 => 'Não',
        ];

        $fumasGanza = select(
            label: 'Fumas Ganza?',
            options: $fumasGanzaOptions,
        );

        $tensMotaOptions = [
            0 => 'Sim',
            1 => 'Não',
        ];

        $tensMota = select(
            label: 'Tens Mota?',
            options: $tensMotaOptions,
        );

        $alternativaOptions = [
            0 => 'Jola',
            1 => 'Fino',
            2 => 'Frize',
            3 => 'Cola',
            4 => 'Café',
            5 => 'Chá',
        ];

        $alternativa = select(
            label: 'Estamos no alternativa, tu estás a beber o quê?',
            options: $alternativaOptions,
        );

        $conduzirOptions = [
            0 => 'na Serra',
            1 => 'na Variante',
            2 => 'de Roda no Ar',
            3 => 'muito devagarinho, tipo avozinha',
            4 => 'não estou, o carro está no mecânico',
        ];

        $conduzir = select(
            label: 'Estás a conduzir, provavelmente estás...',
            options: $conduzirOptions,
        );

        $trabalharOptions = [
            0 => 'que nunca mais é sexta',
            1 => 'que nunca mais são 6 horas',
            2 => 'já é quarta, foda-se',
            3 => 'mas era para estar a trabalhar?',
        ];

        $trabalhar = select(
            label: 'Estás a trabalhar, provavelmente estás a pensar...',
            options: $trabalharOptions,
        );

        $andre = 0;
        $faustino = 0;
        $chupas = 0;
        $ash = 0;
        $naza = 0;
        $simoes = 0;
        $patricia  = 0;
        $preto = 0;
        $fred = 0;

        $fumasGanza = array_search($fumasGanza, $fumasGanzaOptions);
        if ($fumasGanza === 0) {
            $andre += 1;
            $faustino += 1/3;
            $chupas += 2/3;
            $ash += 1;
            $naza += 1;
        } else {
            $faustino += 2/3;
            $chupas += 1/3;
            $simoes += 1;
            $patricia += 1;
            $preto += 1;
            $fred += 1;
        }

        $tensMota = array_search($tensMota, $tensMotaOptions);
        if ($tensMota === 0) {
            $andre += 1;
            $faustino += 1;
            $naza += 1;
            $simoes += 1;
            $fred += 1;
        } else {
            $preto += 1;
            $patricia += 1;
            $chupas += 1;
            $ash += 1;
        }

        $alternativa = array_search($alternativa, $alternativaOptions);
        if ($alternativa === 0) {
            $andre += 1;
            $faustino += 1;
            $chupas += 1;
            $ash += 1;
            $naza += 1;
            $simoes += 1;
        } else if ($alternativa === 1) {
            $andre += 1/3;
            $faustino += 1;
            $chupas += 1;
            $ash += 1/3;
            $naza += 0;
            $simoes += 1 + (1/3);
        } else if ($alternativa === 2) {
            $andre += 1/3;
            $chupas += 2/3;
            $patricia += 2/3;
            $preto += 1 + (1/3);
        } else if ($alternativa === 3) {
            $chupas += 1 + (1/3);
            $fred += 2/3;
        } else if ($alternativa === 4) {
            $andre += 1/3;
            $faustino += 1/3;
            $chupas += 2/3;
            $ash += 2/3;
            $simoes += 2/3;
            $patricia += 1/3;
            $preto += 1/3;
            $fred += 1 + (1/3);
        } else if ($alternativa === 5) {
            $patricia += 1 + (1/3);
            $preto += 2/3;
        }

        $conduzir = array_search($conduzir, $conduzirOptions);
        if ($conduzir === 0) {
            $andre += 1;
            $faustino += 1;
            $chupas += 1 + (1/3);
            $ash += 1/3;
            $naza += 1/3;
            $simoes += 2/3;
            $fred += -1/3;
        } else if ($conduzir === 1) {
            $andre += 2/3;
            $faustino += 2/3;
            $chupas += 1/3;
            $ash += 2/3;
            $naza += 2/3;
            $simoes += 1 + (1/3);
            $fred += 1;
        } else if ($conduzir === 2) {
            $andre += 2/3;
            $faustino += 1;
            $naza += 1;
            $simoes += 1/3;
            $fred += -1/3;
        } else if ($conduzir === 3) {
            $naza += 2/3;
            $patricia += 1;
            $preto += 1;
            $fred += 1 + (1/3);
        } else if ($conduzir === 4) {
            $chupas += 2/3;
            $naza += 1/3;
            $simoes += 2/3;
            $fred += 1;
        }

        $trabalhar = array_search($trabalhar, $trabalharOptions);
        if ($trabalhar === 0) {
            $andre += 1;
            $faustino += 1/3;
            $ash += 1;
            $naza += 1/3;
            $simoes += 1/3;
            $preto += 0;
            $fred += 1 + (1/3);
        } else if ($trabalhar === 1) {
            $andre += 1;
            $faustino += 1;
            $ash += 1/3;
            $naza += 2/3;
            $simoes += 2/3;
            $patricia += 1/3;
            $fred += 1 + (1/3);
        } else if ($trabalhar === 2) {
            $chupas += 1;
            $simoes += 1/3;
            $patricia += 1/3;
            $preto += 1;
            $fred += -1/3;
        } else if ($trabalhar === 3) {
            $andre += 1 + (1/3);
            $ash += 1;
            $naza += 1/3;
            $fred += 1 + (1/3);
        }

        $array = [
            0 => $andre,
            1 => $faustino,
            2 => $chupas,
            3 => $ash,
            4 => $naza,
            5 => $simoes,
            6 => $patricia,
            7 => $preto,
            8 => $fred,
        ];

        $res = array_search(max($array), $array);

        if ($res === 0) {
            note('és o André');
        } else if ($res === 1) {
            note('és o Faustino');
        } else if ($res === 2) {
            note('és o Chupas');
        } else if ($res === 3) {
            note('és o Ash');
        } else if ($res === 4) {
            note('és o Naza');
        } else if ($res === 5) {
            note('és o Simões');
        } else if ($res === 6) {
            note('és o Patrícia');
        } else if ($res === 7) {
            note('és o Preto');
        }  else if ($res === 8) {
            note('és o Fred');
        }

        /*

            $andre += 1;
            $faustino += 1;
            $chupas += 1;
            $ash += 1;
            $naza += 1;
            $simoes += 1;
            $patricia += 0;
            $preto += 0;
            $fred += 0;

         */
    }
}
