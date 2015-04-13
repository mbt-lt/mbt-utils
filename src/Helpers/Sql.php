<?php

namespace Mbt\UtilsBundle\Helpers;

class Sql
{
    /**
     * Create sql for multiple INSERT from array
     *
     * @param string $tableName
     * @param array $data
     * @throws \Exception
     * @return string
     */
    public static function createInsertSqlFromArray($tableName, array $data)
    {
        if (empty($tableName) || empty($data) || !is_array($data)) {
            throw new \Exception('Incorrect parameters for method "createInsertSqlFromArray"');
        }

        $sql = 'INSERT INTO ' . $tableName . ' (`' . implode('`,`', array_keys(current($data))) . '`) VALUES ';
        $parts = array();
        foreach ($data as $i) {
            foreach ($i as &$v) {
                if ($v === null) {
                    $v = 'NULL';
                } else if (!is_numeric($v)) {
                    $v = "'" . \addslashes($v) . "'";
                }
            }
            unset($v);
            $parts[] = '(' . implode(',', $i) . ')';
        }
        $sql .= implode(',', $parts);
        return $sql;
    }
}