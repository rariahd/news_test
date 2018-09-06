<?php
namespace App\Http\Controllers;


class SortAlgorithmController extends Controller
{
    public function index(){
        $time_start = microtime(true);
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');
        $filename = public_path('usia.txt');
        $content = \File::get($filename);
        $content = explode(PHP_EOL, $content);

        /*//START Bubble Sort Algorithm
        function bubble_sort($arr) {
            $size = count($arr)-1;
            for ($i=0; $i<$size; $i++)
                for ($j=0; $j<$size-$i; $j++) {
                    $k = $j+1;
                    if ($arr[$k] < $arr[$j])
                        list($arr[$j], $arr[$k]) = array($arr[$k], $arr[$j]);
                }
            return $arr;
        }
        $sorted = bubble_sort($content);
        //END Bubble Sort Algorithm

        //*******************************************************

        //START Insertion Sort Algorithm
        function insertion_Sort($my_array){
        	for($i=0;$i<count($my_array);$i++){
        		$val = $my_array[$i];
        		$j = $i-1;
        		while($j>=0 && $my_array[$j] > $val){
        			$my_array[$j+1] = $my_array[$j];
        			$j--;
        		}
        		$my_array[$j+1] = $val;
        	}
            return $my_array;
        }
        $sorted = insertion_Sort($content);
        //END Insertion Sort Algorithm

        //*******************************************************

        //START Merge Sort Algorithm
        function merge_sort(&$arrayToSort){
            if(sizeof($arrayToSort) <= 1) return $arrayToSort;

            $leftFrag = array_slice($arrayToSort, 0, (int)(count($arrayToSort)/2));
            $rightFrag = array_slice($arrayToSort, (int)(count($arrayToSort)/2));

            $leftFrag = merge_sort($leftFrag);
            $rightFrag = merge_sort($rightFrag);

            $returnArray = merge($leftFrag, $rightFrag);

            return $returnArray;
        }
        function merge(&$lF, &$rF){
            $result = array();

            while (count($lF)>0 && count($rF)>0)
                if ($lF[0] <= $rF[0]) array_push($result, array_shift($lF));
                else array_push($result, array_shift($rF));

            array_splice($result, count($result), 0, $lF);
            array_splice($result, count($result), 0, $rF);

            return $result;
        }
        $sorted = merge_sort($content);
        //END Merge Sort Algorithm

        //*******************************************************

        //START Quick Sort Algorithm
        function quicksort($array){
            if(count($array) < 2)
                return $array;
            $left = $right = array();
            reset($array);
            $pivot_key = key($array);
            $pivot = array_shift($array);
            foreach( $array as $k => $v )
                if($v < $pivot) $left[$k] = $v;
                else $right[$k] = $v;

            return array_merge(quicksort($left), array($pivot_key => $pivot), quicksort($right));
        }
        $sorted = quicksort($content);
        //END Quick Sort Algorithm*/

        //*******************************************************

        //START Heap Sort
        function build_heap(&$array, $i, $t){
            $tmp_var = $array[$i];
            $j = $i * 2 + 1;

            while($j <= $t){
                if($j < $t)
                    if($array[$j] < $array[$j + 1])
                        $j = $j + 1;

                if($tmp_var < $array[$j]){
                    $array[$i] = $array[$j];
                    $i = $j;
                    $j = 2 * $i + 1;
                } else $j = $t + 1;
            }
            $array[$i] = $tmp_var;
        }
        function heap_sort(&$array) {
            $init = (int)floor((count($array) - 1) / 2);
            for($i=$init; $i >= 0; $i--){
                $count = count($array) - 1;
                build_heap($array, $i, $count);
            }

            for($i = (count($array) - 1); $i >= 1; $i--){
                $tmp_var = $array[0];
                $array[0] = $array [$i];
                $array[$i] = $tmp_var;
                build_heap($array, 0, $i - 1);
            }
        }
        $sorted = $content;
        heap_sort($content);
        //END Heap Sort

        file_put_contents(public_path('usia_urut.txt'), implode("\n", $sorted));
        $time_end = microtime(true);
        $time = round(($time_end - $time_start)/60, 6);
        $minutes = floor($time);
        $secs = $time-$minutes;
        return '<b>Total Execution Time:</b> '.$minutes.' minutes '.$secs.' seconds';
    }
}
