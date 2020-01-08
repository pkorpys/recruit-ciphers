<?php

require_once 'CiphersContract.php';

class BaconsCipher implements CiphersContract {

    private $code;
    private $decode;

    public function __construct() {
        $this->code = [
            'a' => 'aaaaa',
            'b' => 'aaaab',
            'c' => 'aaaba',
            'd' => 'aaabb',
            'e' => 'aabaa',
            'f' => 'aabab',
            'g' => 'aabba',
            'h' => 'aabbb',
            'i' => 'abaaa',
            'j' => 'abaaa',
            'k' => 'abaab',
            'l' => 'ababa',
            'm' => 'ababb',
            'n' => 'abbaa',
            'o' => 'abbab',
            'p' => 'abbba',
            'q' => 'abbbb',
            'r' => 'baaaa',
            's' => 'baaab',
            't' => 'baaab',
            'u' => 'baabb',
            'v' => 'baabb',
            'w' => 'babaa',
            'x' => 'babab',
            'y' => 'babba',
            'z' => 'babbb',
        ];
        $this->decode = array_flip($this->code);
    }

    public function decrypt(string $input): string {
        $decryptedString = '';
        $input = strtolower(preg_replace('/[^A-Za-z ]/', '', $input));
        $input = preg_replace('/ /', '     ', $input);
        foreach (str_split($input, 5) as $code) {
            if ($code != '     ') {
                $decryptedString .= $this->decode[$code];
            } else {
                $decryptedString .= ' ';
            }
        }
        return $decryptedString;
    }

    public function encrypt(string $input): string {
        $input = strtolower(preg_replace('/[^A-Za-z ]/', '', $input));
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
