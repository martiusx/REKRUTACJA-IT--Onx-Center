<?php 
class RankingTable {
    private $players = [];
    private $games = []; 
    private $scores = [];
    
    public function __construct($players) {
        $this->players = $players;
        foreach ($this->players as $player) {
            $this->scores[$player] = 0;
            $this->games[$player] = 0;
        }
    }
    public function recordResult($player, $score) {
        if (array_key_exists($player, $this->scores)) {
            $this->scores[$player] += $score;
            $this->games[$player]++;
        }
    }
    
    public function playerRank($rank) {
        arsort($this->scores); 
        $keys = array_keys($this->scores); 
        
        if (array_key_exists($rank-1, $keys)) {
            return $keys[$rank-1];
        }
        
        return 'there is no player with that rank';
    }
}

$table = new RankingTable(array('Jan', 'Maks', 'Monika'));
$table->recordResult('Jan', 2);
$table->recordResult('Maks', 3);
$table->recordResult('Monika', 5);
echo $table->playerRank(1);

?>