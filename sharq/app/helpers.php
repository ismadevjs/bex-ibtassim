<?php

if (!function_exists('currency')) {
   function currency($price)
   {
      return $price . " QA ";
   }
}