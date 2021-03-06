--TEST--
Test array_map() function : usage variations - failing built-in functions & language constructs
--FILE--
<?php
/* Prototype  : array array_map  ( callback $callback  , array $arr1  [, array $...  ] )
 * Description: Applies the callback to the elements of the given arrays
 * Source code: ext/standard/array.c
 */

/*
 * Test array_map() by passing non-permmited built-in functions and language constructs i.e.
 *   echo(), array(), empty(), eval(), exit(), isset(), list(), print()
 */

echo "*** Testing array_map() : non-permmited built-in functions ***\n";

// array to be passed as arguments
$arr1 = array(1, 2);

// built-in functions & language constructs
$callback_names = array(
/*1*/  'echo',
       'array',
       'empty',
/*4*/  'eval',
       'exit',
       'isset',
       'list',
/*8*/  'print'
);
for($count = 0; $count < count($callback_names); $count++)
{
    echo "-- Iteration ".($count + 1)." --\n";
    try {
        var_dump( array_map($callback_names[$count], $arr1) );
    } catch (TypeError $e) {
        echo $e->getMessage(), "\n";
    }
}

echo "Done";
?>
--EXPECTF--
*** Testing array_map() : non-permmited built-in functions ***
-- Iteration 1 --
array_map() expects parameter 1 to be a valid callback, function 'echo' not found or invalid function name
-- Iteration 2 --
array_map() expects parameter 1 to be a valid callback, function 'array' not found or invalid function name
-- Iteration 3 --
array_map() expects parameter 1 to be a valid callback, function 'empty' not found or invalid function name
-- Iteration 4 --
array_map() expects parameter 1 to be a valid callback, function 'eval' not found or invalid function name
-- Iteration 5 --
array_map() expects parameter 1 to be a valid callback, function 'exit' not found or invalid function name
-- Iteration 6 --
array_map() expects parameter 1 to be a valid callback, function 'isset' not found or invalid function name
-- Iteration 7 --
array_map() expects parameter 1 to be a valid callback, function 'list' not found or invalid function name
-- Iteration 8 --
array_map() expects parameter 1 to be a valid callback, function 'print' not found or invalid function name
Done
