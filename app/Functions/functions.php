<?php
/**
 * Created by PhpStorm.
 * User: phamphuong
 * Author: Phạm Văn Phương
 * Date: 04/12/2019
 * Time: 09:44
 */
//y-m-d=>d/m/y
function convertDate($date)
{
    return implode('/', array_reverse(explode('-', $date)));
}
//y-m-d h:i:s=>d/m/y h:i:s
function convertDatetime($datetime)
{
    return date('d/m/Y H:i:s', strtotime($datetime));
}
