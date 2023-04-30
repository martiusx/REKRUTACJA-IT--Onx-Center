<?php 
    class Thesaurus {
        private $thesaurus;

        public function __construct($thesaurus) {
            $this->thesaurus = $thesaurus;
        }

        public function getSynonyms($word) {
            $synonyms = isset($this->thesaurus[$word]) ? $this->thesaurus[$word] : [];

            return json_encode([
                "word" => $word,
                "synonyms" => $synonyms
            ]);
        }
    }
    $thesaurus = new Thesaurus([
        "market" => ["trade"],
        "small" => ["little", "compact"]
    ]);

    echo $thesaurus->getSynonyms("small"); 
    echo $thesaurus->getSynonyms("asleast");
?>