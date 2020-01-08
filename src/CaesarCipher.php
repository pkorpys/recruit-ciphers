<?php

require_once 'CiphersContract.php';

class CaesarCipher implements CiphersContract {

    private $code;
    private $decode;

    public function __construct() {
        $alphas = array_merge(range('A', 'Z'), range('a', 'z'));
        $alphasShifted = array_merge(range('D', 'Z'), range('A', 'C'), range('d', 'z'), range('a', 'c'));
        $this->code = array_combine($alphas, $alphasShifted);
        $this->decode = array_combine($alphasShifted, $alphas);
    }

    public function decrypt(string $input): string {
        $input = preg_replace('/[^A-Za-z ]/', '', $input);
        $decryptedString = '';
        for ($i = 0; $i < strlen($input); $i++) {
            if ($input[$i] != ' ') {
                $decryptedString .= $this->decode[$input[$i]];
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
