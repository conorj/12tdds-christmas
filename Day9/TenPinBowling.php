<?php
/**
 * This is part 8 of the 12 TDDs of Christmas as appeared on
 * http://www.wiredtothemoon.com/
 *
 * Ten Pin Bowling
 * Task: Write a function to return score given individual frame scores
 *
 * @author Conor Ryan <conor.ryan1302@gmail.com>
 */
class TenPinBowling
{
    public $bonusCount;

    /**
     * calculate total score from array of frame scores
     *
     * @param string $frameScores
     * @return integer
     */
    public function calculateScore($frameScores)
    {
        $score = 0;
        $this->bonusCount = 0;

        list($normal, $bonus) = explode('||', str_replace('-', 0, $frameScores));
        $bonus = str_pad($bonus, 2, '0');

        // explode normal frame scores
        // if X then 10 plus next 2 scores
        // if [0-9/]X then 10 plus next score
        // if [\-0-9][\-0-9] then sum of 2 nums
        // if -- then 0
        foreach (explode('|', $normal) as $roundScore) {
            $score += $this->calculateFrameScore($roundScore);
        }
        $bonusAMultiplier = ($this->bonusCount === 3) ? 2: 1;
        $bonusBMultiplier = ($this->bonusCount >= 2) ? 1: 0;

        $score += ('X' === $bonus[0]) ? 10 * $bonusAMultiplier: $bonus[0] * $bonusAMultiplier;
        $score += ('X' === $bonus[1]) ? 10 * $bonusBMultiplier: $bonus[1] * $bonusBMultiplier;

        return $score;
    }

    public function calculateFrameScore($score)
    {
        if (preg_match('/^[0-9][0-9]$/', $score)) {
            $total = $score[0] + $score[1];
            if ($this->bonusCount == 2) {
                $total = $total * 2;
            } else if ($this->bonusCount == 1) {
                $total = $total + $score[0];
            }
            $this->bonusCount = 0;
            return $total;
        }
        if (preg_match('/^[0-9]\/$/', $score)) {
            $total = 10;
            if ($this->bonusCount == 2) {
                $total = $total * 2;
            } else if ($this->bonusCount == 1) {
                $total = $total + $score[0];
            }
            $this->bonusCount = 1;
            return $total;
        }
        if ('X' === $score) {
            $total = 10;
            if ($this->bonusCount === 3) {
                $total += $total * 2;
            } else if ($this->bonusCount >= 1) {
                $total += $total;
                $this->bonusCount += 1;
            } else {
                $this->bonusCount = 2;
            }
            return $total;
        }
    }
}
