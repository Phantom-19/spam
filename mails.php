<?php

/**
 * Coder par : Faxel >
 */
class TempMail {

    private $md5address;
    // Le format est défini sur privé en raison de problèmes avec les appels répétitifs au serveur de messagerie temporaire
    private $format = 'json';

    public $name;
    public $domain;
    public $address;


    public function __construct ($name = null, $domain = null) {
        // Si le nom n'est pas fourni, générez-en un au hasard
        $this->name = $name ? $name : generateRandomString();

        $domains = json_decode(self::getDomains());

        // Si le domaine n'est pas fourni ou n'est pas valide, choisissez-en un au hasard
        if (!$domain || !in_array($domain, $domains))
            $this->domain = $domains[ rand(0, count($domains) - 1) ];
        else
            $this->domain = $domain;

        // Créez l'adresse e-mail
        $this->address = $this->name . $this->domain;

        // Créer un hachage MD5 de l'adresse
        $this->md5address = md5($this->address);
    }

    /**
     * Obtient tous les e-mails de cette boîte aux lettres
     * Si $raw est faux, la fonction renvoie un tableau d'objets. Si $raw est 'raw',
     * il renvoie le résultat json brut de l'API Temp Mail
     * @param bool|string $raw
     * @return array
     */
    public function getEmails ($raw = false) {

        $emails = file_get_contents('http://api.temp-mail.ru/request/mail/id/' . $this->md5address . '/format/json');

        // la liste de diffusion est vide
        if (empty($emails))
            return json_encode(['message' => 'la liste de diffusion est vide']);

        return $raw == 'raw' ? $emails : json_decode($emails);
    }

    /**
     * Gets all source messages for this mailbox
     * Si $raw est faux, la fonction renvoie un tableau d'objets. Si $raw est 'raw',
     * il renvoie le résultat json brut de l'API Temp Mail
     * @param bool|string $raw
     * @return array
     */
    public function getSources ($raw = false) {
        $sources = file_get_contents('http://api.temp-mail.ru/request/source/id/' . $this->md5address . '/format/json');

        // la liste des sources est vide
        if (empty($sources))
            return json_encode(['message' => 'la liste des sources est vide']);

        return $raw == 'raw' ? $sources : json_decode($sources);
    }

    /**
     * Supprime un message par son ID
     * @param string $messageID
     * @return string
     */
    public function deleteMessage ($messageID) {
        return file_get_contents('http://api.temp-mail.ru/request/delete/id/' . $messageID . '/format/' . $this->format);
    }

    /**
     * Obtient la liste des domaines de messagerie disponibles
     * @param string $format
     * @return array
     */
    public static function getDomains ($format = 'json') {
        $domains = file_get_contents('http://api.temp-mail.ru/request/domains/format/' . $format);

        return $domains ? $domains : json_encode(['message' => 'la liste des domaines est vide']);
    }
}

/**
 * HELPER FUNCTIONS
 */

/**
 * Génère une chaîne aléatoire
 * @param int $longueur
 * @return string
 */
function generateRandomString ($longueur = 10) {
    $caractere = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $longcaractere = strlen($caractere);
    $hasard = '';
    for ($i = 0; $i < $longueur; $i++) {
        $hasard .= $caractere[ rand(0, $longcaractere - 1) ];
    }

    return $hasard;
}
