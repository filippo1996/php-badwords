<?php 
/**
 * Creare una variabile con un paragrafo di testo a vostra scelta. 
 * Stampare a schermo il paragrafo e la sua lunghezza. 
 * Una parola da censurare viene passata dall'utente tramite parametro GET.
 * Stampare di nuovo il paragrafo e la sua lunghezza, dopo aver sostituito con tre asterischi (***) tutte le occorrenze della parola da censurare.
*/
namespace Controllers;

class CensorshipController {

    public function index()
    {
        //Recuperiamo il percorso del file txt
        $path = dirname(__FILE__) . '/paragraph.txt';

        //Salviamo nella variabile la stringa contenente tutto il file txt
        $handle = file_get_contents($path);

        //Recuperiamo il peso del file in bytes
        //$fileSize = filesize($path);

        //Salviamo nella variabile il numero dei byte della stringa
        $strByte = strlen($handle);

        // Lunghezza per ogni carattere della stringa
        $lengthStr = mb_strlen($handle);

        return [
            'handle' => $handle,
            'strByte' => $strByte,
            'lengthStr' => $lengthStr
        ];
    }

    public function edit($req)
    {
        $response = 'Nessuna parola è stata censurata';
        $censoredWord = trim($req);
        $strChange = str_replace($censoredWord, '***', $this->index()['handle'], $counter);
        if($counter){
            $response = 'Sono state censurate ' . $counter . ' parole';
        }
        $result = [
            'handle' => $strChange,
            'response' => $response
        ];

        echo json_encode($result);
    }
}
