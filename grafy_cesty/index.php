<?php

class Graph {
  private $vertices = array(); // Pole, do kterého se ukládají vrcholy a hrany grafu
  private $edges = array(); // Pole pro ukládání hran

  public function add_vertex($name, $edges) {
    $this->vertices[$name] = $edges;
  }

  public function shortest_path($start, $finish) {
    $distances = array();
    $previous = array();
    $queue = array();
    foreach ($this->vertices as $vertex => $edges) {
      if ($vertex === $start) {
        $distances[$vertex] = 0;
        $queue[$vertex] = 0;
      } else {
        $distances[$vertex] = INF;
        $queue[$vertex] = INF;
      }
      $previous[$vertex] = null;
    }

    while (!empty($queue)) { //  Smyčka se opakuje, dokud fronta není prázdná (Hledá nejmenší vzdálenost z fronty).
      $min_distance = min($queue);
      $u = array_search($min_distance, $queue);
      if ($u === $finish) {
        $path = array();
        while ($previous[$u]) {
          array_unshift($path, $u);
          $u = $previous[$u];
        }
        array_unshift($path, $u);
        return $path;
      }

      unset($queue[$u]); // Výpočet nejkratších cest (Od prvního vrcholu dle vzdálenosti).
      foreach ($this->vertices[$u] as $v => $dist) {
        $alt = $distances[$u] + $dist;
        if ($alt < $distances[$v]) {
          $distances[$v] = $alt;
          $previous[$v] = $u;
          $queue[$v] = $alt;
        }
      }
    }

    return false;
  }
}


$graph = new Graph();

$graph->add_vertex('A', array('B' => 7, 'C' => 9, 'D' => 14));
$graph->add_vertex('B', array('A' => 7, 'C' => 10, 'E' => 15));
$graph->add_vertex('C', array('A' => 9, 'B' => 10, 'D' => 2, 'E' => 11));
$graph->add_vertex('D', array('A' => 14, 'C' => 2, 'F' => 9));
$graph->add_vertex('E', array('B' => 15, 'C' => 11, 'F' => 6));
$graph->add_vertex('F', array('D' => 9, 'E' => 6));

$path = $graph->shortest_path('A', 'F');

print_r($path);

?>