<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

// MISC NOVASTOR-SPECIFIC CONFIG ITEMS

// LANUGAGE DATE FORMATS

$config['language_dates'] = array(
    1034 => array( // SPANISH
        'months' => array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'),
        'days' => array('domingo', 'lunes', 'martes', 'mi&#233;rcoles', 'jueves', 'viernes', 's&#225;bado'),
        'format' => 'por %s, el %s de %s de %s',
    ),
    1036 => array( // FRENCH
        'months' => array('janvier', 'f&#233;vrier', 'mars', 'avril', 'mai', 'juin', 'juillet', 'ao&#251;t', 'septembre', 'octobre', 'novembre', 'd&#233;cembre'),
        'days' => array('dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'),
        'format' => 'le %s %s %s %s',
    ),
    1040 => array( // ITALIAN
        'months' => array('gennaio', 'febbraio', 'marzo', 'aprile', 'maggio', 'giugno', 'luglio', 'agosto', 'settembre', 'ottobre', 'novembre', 'dicembre'),
        'days' => array('domenica', 'luned&#236;', 'marted&#236;', 'mercoled&#236;', 'gioved&#236;', 'venerd&#236;', 'sabato'),
        'format' => 'il %s, %s %s %s',
    ),
    1046 => array( // PORTUGUESE
        'months' => array('janeiro', 'fevereiro', 'mar&#231;o', 'abril', 'maio', 'junho', 'julho', 'agosto', 'setembro', 'outubro', 'novembro', 'dezembro'),
        'days' => array('domingo', 'segunda-feira', 'ter&#231;a-feira', 'quarta-feira', 'quinta-feira', 'sexta-feira', 's&#225;bado'),
        'format' => 'at&#233; %s, %s de %s de %s',
    ),
);

$config['enable_ns_debugging'] = false;

/* End of file novastor.php */
/* Location: ./application/config/novastor.php */
