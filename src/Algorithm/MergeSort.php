<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/6/20
 * Time: 16:56
 */

namespace algorithm;


class MergeSort
{
    /**
     * 递归公式：mergeSort( arr, start，end) = merge( mergeSort(arr, start, middle),mergeSort(arr, middle+1, end))
     * 终止条件：start> end 不需要再分解
     */
    public function mergeSort(array &$arr, $start, $end)
    {
        if ($start >= $end){
            return;
        }
        $mid = (int)(($start+$end)/2);
        $this->mergeSort($arr, $start, $mid);
        $this->mergeSort($arr, $mid+1, $end);
        $this->_merge($arr, $start, $mid, $end);
    }

    /**
     * 将排序好的数据合并
     * @param $arr
     * @param $start
     * @param $mid
     * @param $end
     */
    private function _merge(&$arr, $start, $mid, $end)
    {
        $arrTem = [];
        $i = $start;
        $j = $mid+1;
        while ($i <=$mid &&  $j<=$end){
            if ($arr[$i] <= $arr[$j] ){
                $arrTem[] = $arr[$i];
                $i++;
            }else{
                $arrTem[] = $arr[$j];
                $j++;
            }
        }
        while ($i <=$mid){
            $arrTem[] = $arr[$i];
            $i++;
        }
        while ( $j<=$end){
            $arrTem[] = $arr[$j];
            $j++;
        }
        $k = 0;
        for($i=$start; $i<=$end; $i++){
            $arr[$i] =$arrTem[$k];
            $k++;
        }
    }



}