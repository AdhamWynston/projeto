<?php
function cpf($document) {

    if (! $document) {

        return '';

    }

    if (strlen($document) == 11) {
        return
            substr($document, 0, 3) . '.' .
            substr($document, 3, 3) . '.' .
            substr($document, 6, 3) . '-' .
            substr($document, 9);
    }
    else if (strlen($document) == 14) {
        return
        substr($document, 0, 2) . '.' .
        substr($document, 2, 3) . '.' .
        substr($document, 5, 3) . '/' .
        substr($document, 8, 4) . '-' .
        substr($document, 12, 2);
    }
    return $document;

}