<?php
//FR
return [

    /*
    |--------------------------------------------------------------------------
    | Lignes de langage de validation
    |--------------------------------------------------------------------------
    |
    | Les lignes de langage suivantes contiennent les messages d'erreur par défaut
    | utilisés par la classe validateur. Certaines de ces règles ont plusieurs
    | versions telles que les règles de taille. N'hésitez pas à modifier
    | chacun de ces messages ici.
    |
    */

    'accepted' => 'Le champ doit être accepté.',
    'accepted_if' => 'Le champ must doit être accepté lorsque :other vaut :value.',
    'active_url' => 'Le champ n\'est pas une URL valide.',
    'after' => 'Le champ doit être une date après :date.',
    'after_or_equal' => 'Le champ doit être une date postérieure ou égale à :date.',
    'alpha' => 'Le champ ne doit contenir que des lettres.',
    'alpha_dash' => 'Le champ ne doit contenir que des lettres, des chiffres, des tirets et des traits de soulignement.',
    'alpha_num' => 'Le champ ne doit contenir que des lettres et des chiffres.',
    'array' => 'Le champ doit être un tableau.',
    'before' => 'Le champ doit être une date avant :date.',
    'before_or_equal' => 'Le champ doit être une date antérieure ou égale à :date.',
    'between' => [
        'numeric' => 'Le champ doit être compris entre :min et :max.',
        'file' => 'Le champ doit être compris entre :min et :max kilo-octets.',
        'string' => 'Le champ doit être compris entre :min et :max caractères.',
        'array' => 'Le champ doit avoir entre :min et :max éléments.',
    ],
    'boolean' => 'Le champ field doit être vrai ou faux.',
    'confirmed' => 'Le champ la confirmation ne correspond pas.',
    'current_password' => 'Le mot de passe est incorrect.',
    'date' => 'Le champ la date n\'est pas valide.',
    'date_equals' => 'Le champ doit être une date égale à :date.',
    'date_format' => 'Le champ ne correspond pas au format :format.',
    'declined' => 'Le champ doit être refusé.',
    'declined_if' => 'Le champ doit être refusé lorsque :other vaut :value.',
    'different' => 'Le champ et :other doit être différent.',
    'digits' => 'Le champ doit être :chiffres chiffres.',
    'digits_between' => 'Le champ doit être compris entre :min et :max chiffres.',
    'dimensions' => 'Le champ a des dimensions d\'image non valides.',
    'distinct' => 'Le champ champ a une valeur en double.',
    'email' => 'Le champ doit être une adresse courriel valide.',
    'ends_with' => 'Le champ doit se terminer par l\'un des éléments following: :values.',
    'enum' => 'La sélection est invalide.',
    'exists' => 'La sélection est invalide.',
    'file' => 'Le champ doit être un fichier.',
    'filled' => 'Le champ doit avoir une valeur.',
    'gt' => [
        'numeric' => 'Le champ doit être supérieur à :valeur.',
        'file' => 'Le champ doit être supérieur à :value kilo-octets.',
        'string' => 'Le champ doit être supérieur à :valeur caractères.',
        'array' => 'Le champ doit avoir plus de :value éléments.',
    ],
    'gte' => [
        'numeric' => 'Le champ doit être supérieur ou égal à :value.',
        'file' => 'Le champ doit être supérieur ou égal à :value kilo-octets.',
        'string' => 'Le champ doit être supérieur ou égal à :valeur caractères.',
        'array' => 'Le champ doit avoir :value éléments ou plus.',
    ],
    'image' => 'Le champ doit être une image.',
    'in' => 'La sélection est invalide.',
'in_array' => 'Le champ n\'existe pas dans :other.',
    'integer' => 'Le champ doit être un entier.',
    'ip' => 'Le champ doit être une adresse IP valide.',
    'ipv4' => 'Le champ doit être une adresse IPv4 valide.',
    'ipv6' => 'Le champ doit être une adresse IPv6 valide.',
    'json' => 'Le champ doit être une chaîne JSON valide.',
    'lt' => [
        'numeric' => 'Le champ doit être inférieur à :value.',
        'file' => 'Le champ doit être inférieur à :value kilo-octets.',
        'string' => 'Le champ doit être inférieur à :valeur caractères.',
        'array' => 'Le champ doit avoir moins de :value éléments.',
    ],
    'lte' => [
        'numeric' => 'Le champ doit être inférieur ou égal à :value.',
        'file' => 'Le champ doit être inférieur ou égal à :value kilo-octets.',
        'string' => 'Le champ doit être inférieur ou égal à :valeur caractères.',
        'array' => 'Le champ ne doit pas avoir plus de :value éléments.',
    ],
    'mac_address' => 'Le champ doit être une adresse MAC valide.',
    'max' => [
        'numeric' => 'Le champ ne doit pas être supérieur à :max.',
        'file' => 'Le champ ne doit pas être supérieur à :max kilo-octets.',
        'string' => 'Le champ ne doit pas être supérieur à :max caractères.',
        'array' => 'Le champ ne doit pas avoir plus de :max éléments.',
    ],
    'mimes' => 'Le champ doit être un fichier de type: :values.',
    'mimetypes' => 'Le champ doit être un fichier de type: :values.',
    'min' => [
        'numeric' => 'Le champ doit être d\'au moins :min.',
        'file' => 'Le champ doit être d\'au moins :min.',
        'string' => 'Le champ doit contenir au moins :min caractères.',
        'array' => 'Le champ doit avoir au moins :min éléments.',
    ],
    'multiple_of' => 'Le champ doit être un multiple de :value.',
    'not_in' => 'La sélection est invalide.',
    'not_regex' => 'Le format est invalide.',
    'numeric' => 'Le champ doit être un nombre.',
    'password' => 'Le mot de passe est incorrect.',
    'present' => 'Le champ doit être présent.',
    'prohibited' => 'Le champ est interdit.',
    'prohibited_if' => 'Le champ est interdit lorsque :other vaut :value.',
    'prohibited_unless' => 'Le champ est interdit sauf si :other est dans :values.',
    'prohibits' => 'Le champ :other est interdit d\'être présent.',
    'regex' => 'Le format est invalide.',
    'required' => 'Ce champ est requis.',
    'required_array_keys' => 'Le champ doit contenir des entrées for: :values.',
    'required_if' => 'Le champ est obligatoire lorsque :other vaut :value.',
    'required_unless' => 'Le champ est obligatoire sauf si :other est dans :values.',
    'required_with' => 'Le champ est obligatoire lorsque :values est présent.',
    'required_with_all' => 'Le champ est obligatoire lorsque :values sont présentes.',
    'required_without' => 'Le champ est obligatoire lorsque :values ​​n\'est pas présent.',
    'required_without_all' => 'Le champ est obligatoire lorsque aucune des :valeurs n\'est présente.',
    'same' => 'Le champ et :other doit correspondre.',
    'size' => [
        'numeric' => 'Le champ doit être :size.',
        'file' => 'Le champ doit être :size kilo-octets.',
        'string' => 'Le champ doit être :size caractères.',
        'array' => 'Le champ doit contenir :size éléments.',
    ],
    'starts_with' => 'Le champ doit commencer par l\'un des éléments following: :values.',
    'string' => 'Le champ doit être une chaîne.',
    'timezone' => 'Le champ doit être un fuseau horaire valide.',
    'unique' => 'Le champ a déjà été pris.',
    'uploaded' => 'Le champ échec du téléchargement.',
    'url' => 'Le champ doit être une URL valide.',
    'uuid' => 'Le champ doit être un UUID valide.',

    /*
    |--------------------------------------------------------------------------
    | Lignes de langage de validation personnalisées
    |--------------------------------------------------------------------------
    |
    | Ici, vous pouvez spécifier des messages de validation personnalisés pour 
    | les attributs en utilisant la convention "attribut.rule" pour nommer les 
    | lignes. Cela permet de spécifier rapidement une ligne de langue 
    | personnalisée spécifique pour une règle d'attribut donnée.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Attributs de validation personnalisés
    |--------------------------------------------------------------------------
    |
    | Les lignes de langage suivantes sont utilisées pour échanger notre espace 
    | réservé d'attribut avec quelque chose de plus convivial tel que "Adresse 
    | e-mail" au lieu de "email". Cela nous aide simplement à rendre notre 
    | message plus expressif.
    |
    */

    'attributes' => [],

];
