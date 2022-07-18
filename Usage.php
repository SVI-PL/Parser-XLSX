<?php

/** @noinspection ForgottenDebugOutputInspection */

/** Examples
 *
 * use Milvus\SimpleXLSX;
 *
 * Example 1:
 * if ( $xlsx = SimpleXLSX::parse('book.xlsx') ) {
 *   foreach ($xlsx->rows() as $r) {
 *     print_r( $r );
 *   }
 * } else {
 *   echo SimpleXLSX::parseError();
 * }
 *
 * Example 2: html table
 * if ( $xlsx = SimpleXLSX::parse('book.xlsx') ) {
 *   echo $xlsx->toHTML();
 * } else {
 *   echo SimpleXLSX::parseError();
 * }
 *
 * Example 3: rowsEx
 * $xlsx = SimpleXLSX::parse('book.xlsx');
 * foreach ( $xlsx->rowsEx() as $r ) {
 *   print_r( $r );
 * }
 *
 * Example 4: select worksheet
 * $xlsx = SimpleXLSX::parse('book.xlsx');
 * foreach( $xlsx->rows(1) as $r  ) { // second worksheet
 *   print_t( $r );
 * }
 *
 * Example 5: IDs and worksheet names
 * $xlsx = SimpleXLSX::parse('book.xlsx');
 * print_r( $xlsx->sheetNames() ); // array( 0 => 'Sheet 1', 1 => 'Catalog' );
 *
 * Example 6: get sheet name by index
 * $xlsx = SimpleXLSX::parse('book.xlsx');
 * echo 'Sheet Name 2 = '.$xlsx->sheetName(1);
 *
 * Example 7: getCell (very slow)
 * echo $xlsx->getCell(1,'D12'); // reads D12 cell from second sheet
 *
 * Example 8: read data
 * if ( $xlsx = SimpleXLSX::parseData( file_get_contents('http://www.example.com/example.xlsx') ) ) {
 *   $dim = $xlsx->dimension(1);
 *   $num_cols = $dim[0];
 *   $num_rows = $dim[1];
 *   echo $xlsx->sheetName(1).':'.$num_cols.'x'.$num_rows;
 * } else {
 *   echo SimpleXLSX::parseError();
 * }
 *
 * Example 9: old style
 * $xlsx = new SimpleXLSX('book.xlsx');
 * if ( $xlsx->success() ) {
 *   print_r( $xlsx->rows() );
 * } else {
 *   echo 'xlsx error: '.$xlsx->error();
 * }
 */

use Milvus\SimpleXLSX;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

require_once __DIR__ . './src/SimpleXLSX.php';
$table_url = '123.xlsx';

if ($xlsx = SimpleXLSX::parse($table_url)) {
    $start_table = 1;
    $end_table = 15;
    echo '<h1>' . (string)$xlsx->rows()[0][0] . '</h1>';
    echo '<table border=1>';
    for ($i = $start_table; $i < $end_table; $i++) {
        $column = $xlsx->rows()[$i];
        echo '<tr>';
        foreach ($column as $cell) {
            echo '<td>';
            if (empty($cell)) {
                echo '&nbsp;';
            } else {
                echo (string) $cell;
            }
            echo '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo SimpleXLSX::parseError();
}

echo $start_table;

