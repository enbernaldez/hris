<?php
function lookup($conn, $lookupUsing_value, $table, $lookupIn_column, $column_ofValue, $column_fk = '', $column_fk_idData = '')
{
    // ======================== GLOSSARY OF ARGUMENTS FOR lookup() ========================
    // $lookupUsing_value is the given value (ex: `4503`)
    // $table is the name of the table (ex: `zipcodes` table)
    // $lookupIn_column is the column name of what we're looking up (ex: `zipcode_id` column)
    // $column_ofValue is the column name of the $lookupUsing_value (ex: `zipcode_no` column)
    // $column_fk is the column name of the foreign key ($column_fk_idData) (ex: `citymunicipality_id` column)
    // $column_fk_idData is the data inside $column_fk (ex: `4`)
    // ======================================================================================

    $finished = false;
    while ($finished == false) {
        // check if $lookupUsing_value exists in $table
        if ($column_fk == "") {
            $sql = "SELECT `{$lookupIn_column}`
                        FROM `{$table}`
                        WHERE `{$column_ofValue}` = ?";
            $filter = array($lookupUsing_value);
        } else {
            $sql = "SELECT `{$lookupIn_column}`, `{$column_fk}`
                        FROM `{$table}`
                        WHERE `{$column_ofValue}` = ?
                        AND `{$column_fk}` = ?";
            $filter = array($lookupUsing_value, $column_fk_idData);
        }
        // return $sql;
        $result = query($conn, $sql, $filter);

        if (empty($result)) {
            // insert $lookupUsing_value if it doesn't exist in $table
            // $table = $table;
            $fields = array($column_ofValue => $lookupUsing_value);
            if (in_array($column_fk, ['citymunicipality_id', 'province_id', 'position_salarygrade'])) {
                $fields[$column_fk] = $column_fk_idData;
            }
            insert($conn, $table, $fields);
        } else {
            // retrieve ID of $lookupUsing_value
            $row = $result[0];
            $finished = true;

            // exit function if ID is successfully received
            return $row[$lookupIn_column];
        }
    }
}