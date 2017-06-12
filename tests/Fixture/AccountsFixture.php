<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AccountsFixture
 *
 */
class AccountsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'IdAccount' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'NameAccount' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'TaxId' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Address1' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Address2' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'NameCity' => ['type' => 'string', 'length' => 155, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'ZipCode' => ['type' => 'string', 'length' => 105, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'IdStateRegion' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'IdStateRegion' => ['type' => 'index', 'columns' => ['IdStateRegion'], 'length' => []],
            'IdStateRegion_2' => ['type' => 'index', 'columns' => ['IdStateRegion'], 'length' => []],
            'IdStateRegion_3' => ['type' => 'index', 'columns' => ['IdStateRegion'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['IdAccount'], 'length' => []],
            'TB_Account_ibfk_1' => ['type' => 'foreign', 'columns' => ['IdStateRegion'], 'references' => ['TB_State_Region', 'IdStateRegion'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'IdAccount' => 1,
            'NameAccount' => 'Lorem ipsum dolor sit amet',
            'TaxId' => 'Lorem ipsum dolor sit amet',
            'Address1' => 'Lorem ipsum dolor sit amet',
            'Address2' => 'Lorem ipsum dolor sit amet',
            'NameCity' => 'Lorem ipsum dolor sit amet',
            'ZipCode' => 'Lorem ipsum dolor sit amet',
            'IdStateRegion' => 1
        ],
    ];
}
