<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/6/22
 * Time: 18:02
 */

namespace algorithm;


class QuickSort
{
    /**
     *递推公式：quick_sort(p…r) = quick_sort(p…q-1) + quick_sort(q+1, r)
     * 终止条件：p >= r
     */
    public function quickSort(&$arr)
    {
        $start = 0;
        $end = count($arr)-1;
        $this->_quickSort($arr, $start, $end);
    }

    private function _quickSort(&$arr, $start, $end)
    {
        if ($start >= $end){
            return;
        }
        $mid = $this->_partition($arr, $start, $end);
        $this->_quickSort($arr, $start, $mid-1);
        $this->_quickSort($arr, $mid+1, $end);
    }

    /**
     * 将数组分成排好序的两个部分
     * @param $arr
     * @param $start
     * @param $end
     */
    /**
     * @param $arr
     * @param $start
     * @param $end
     * @return mixed
     */
    private function _partition(&$arr, $start, $end)
    {
        $pivot = $arr[$end];
        $i = $start;
        for ($j = $i; $j<$end; $j++){
            if ($arr[$j] < $pivot){
                $this->_swap($arr, $i, $j);
                $i++;
            }
        }
        $this->_swap($arr, $end, $i);
        return $i;
    }

    /**
     * 交换数组两个值
     * @param $arr
     * @param $i
     * @param $j
     */
    private function _swap(&$arr, $i, $j)
    {
        $temp = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $temp;
    }
}
