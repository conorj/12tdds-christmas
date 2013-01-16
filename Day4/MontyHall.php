<?php
/**
 * This is part three of the 12 TDDs of Christmas as appeared on
 * http://www.wiredtothemoon.com/
 *
 * Monty Hall
 * Task: Simulate the Monty Hall game show where contestant is show three doors
 * - A, B and C. A car is nehind one and gotats lie behing the other two. the contestant
 * picks a door (but doesn't open it) and the host opens one of the two remaining doors showing a goat.
 * The contestant must then decide whether to change door or not. This program
 * should simulate this game at least a thousand times and show results in easy
 * to read format.
 *
 * @author Conor Ryan <conor.ryan1302@gmail.com>
 */
class MontyHall {
    private $doorNames = array(1 => 'A', 2 => 'B', 3 => 'C');
    private $resultsArray = array(
        1 => array('stay' => array('win' => 0, 'lose' => 0), 'move' => array('win' => 0, 'lose' => 0)),
        2 => array('stay' => array('win' => 0, 'lose' => 0), 'move' => array('win' => 0, 'lose' => 0)),
        3 => array('stay' => array('win' => 0, 'lose' => 0), 'move' => array('win' => 0, 'lose' => 0))
    );
    private $simulation_per_door = 400;

    /**
     * runSimulation
     *
     * run the simulation
     *
     * @access public
     * @return str formatted result in string format
     */
    public function runSimulation()
    {
        foreach ($this->resultsArray as $door => $arr) {
            $this->simulateDoorAction($door,'stay');
            $this->simulateDoorAction($door,'move');
        }
        return $this->toString();
    }

    /**
     * toString
     *
     * format results array as string
     *
     * @access public
     * @return void
     */
    public function toString()
    {
        $res = "Door\tAction\tSuccess Rate\n";
        foreach ($this->resultsArray as $door => $arr) {
            $res .= $this->doorNames[$door]."\tStay\t" . ( ($this->resultsArray[$door]['stay']['win'] / ($this->simulation_per_door / 2) ) * 100) . " %\n";
            $res .= $this->doorNames[$door]."\tMove\t" . ( ($this->resultsArray[$door]['move']['win'] / ($this->simulation_per_door / 2) ) * 100) . " %\n";
        }
        return $res;
    }

    /**
     * simulateDoorAction
     *
     * simulate contestant action and record if correct decision or not.
     *
     * @param integer $door
     * @param str $action 'stay' or 'move'
     * @access private
     * @return void
     */
    private function simulateDoorAction($door,$action)
    {
        for ($i = 0; $i < $this->simulation_per_door / 2; $i++) {
            $car_door = $this->getCarDoor();
            if ( ( ($car_door === $door) && ('stay' == $action) ) ||
                 ( ($car_door !== $door) && ('move' == $action) ) )
            {
                $this->resultsArray[$door][$action]['win'] += 1;
            } else {
                $this->resultsArray[$door][$action]['lose'] += 1;
            }
        }
    }

    /**
     * getCarDoor
     *
     * return random number between 1 and 3 (inclusive).
     *
     * @access private
     * @return integer
     */
    private function getCarDoor()
    {
        return rand(1,3);
    }
}
