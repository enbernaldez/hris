<?php
    function lookup($conn, $name, $table, $column_pk, $column_name, $column_fk = '', $column_fk_idData = '')
    {
        // ======================== GLOSSARY OF ARGUMENTS FOR lookup() ========================
        // $name is the given value (ex: `4503`)
        // $table is the name of the table (ex: `zipcodes` table)
        // $column_pk is the column name of what we're looking up (ex: `zipcode_id` column)
        // $column_name is the column name of the $name (ex: `zipcode_no` column)
        // $column_fk is the column name of the foreign key ($column_fk_idData) (ex: `citymunicipality_id` column)
        // $column_fk_idData is the data inside $column_fk (ex: `4`)
        // ======================================================================================

        $finished = false;
        while ($finished == false) {
            // check if $name exists in $table
            if ($column_fk == "") {
                $sql = "SELECT `$column_pk`
                        FROM `{$table}`
                        WHERE `{$column_name}` = ?";
                $filter = array($name);
            } else {
                $sql = "SELECT `$column_pk`, `$column_fk`
                        FROM `{$table}`
                        WHERE `{$column_name}` = ?
                        AND `{$column_fk}` = ?";
                $filter = array($name, $column_fk_idData);
            }
            // return $sql;
            $result = query($conn, $sql, $filter);

            if (empty($result)) {
                // insert $name if it doesn't exist in $table
                // $table = $table;
                $fields = array($column_name => $name);
                if (in_array($column_fk, ['citymunicipality_id', 'province_id', 'position_salarygrade'])) {
                    $fields[$column_fk] = $column_fk_idData;
                }
                insert($conn, $table, $fields);
            } else {
                // retrieve ID of $name
                $row = $result[0];
                $finished = true;

                // exit function if ID is successfully received
                return $row[$column_pk];
            }
        }
    }