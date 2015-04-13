<?php

use Mbt\UtilsBundle\Helpers\Sql;

class SqlTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateInsertSqlFromArray()
    {
        $data = [];
        $data[] = ['name' => 'John\'s', 'birth_date' => null,         'number' => 12];
        $data[] = ['name' => 'Peter',   'birth_date' => '1985-06-05', 'number' => 12.01];

        $sql = Sql::createInsertSqlFromArray('test_table_name', $data);
        $this->assertSame("INSERT INTO test_table_name (`name`,`birth_date`,`number`) VALUES ('John\'s',NULL,12),('Peter','1985-06-05',12.01)", $sql);
    }
}