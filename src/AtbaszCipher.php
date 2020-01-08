<?php

require_once 'CiphersContract.php';

class AtbaszCipher implements CiphersContract {

    private $code;
    private $decode;

    public function __construct() {
        $alphas = array_merge(range('A', 'Z'), range('a', 'z'));
        $alphasReversed = array_merge(range('Z', 'A'), range('z', 'a'));
        $this->code = array_combine($alphas, $alphasReversed);
        $this->decode = array_combine($alphasReversed, $alphas);
    }

    public function decrypt(string $input): string {
        $input = preg_replace('/[^A-Za-z ]/', '', $input);
        $decryptedString = '';
        for ($i = 0; $i < strlen($input); $i++) {
            if ($input[$i] != ' ') {
                $decryptedString .= $this->code[$input[$i]];
            } else {
                $decryptedString .= ' ';
            }
        }
        return $decryptedString;
    }

    public function encrypt(string $input): string {
        $input = preg_replace('/[^A-Za-z ]/', '', $input);
        $encryptedString = '';
        for ($i = 0; $i < strlen($input); $i++) {
            if ($input[$i] != ' ') {
                $encryptedString .= $this->code[$input[$i]];
            } else {
                $encryptedString .= ' ';
            }
        }
        return $encryptedString;
    }

}
