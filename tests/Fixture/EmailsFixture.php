<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EmailsFixture
 *
 */
class EmailsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'IdEmail' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'Email' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'DtRegister' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'EmailFrom' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'IdUser' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'IdUser' => ['type' => 'index', 'columns' => ['IdUser'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['IdEmail'], 'length' => []],
            'TB_Email_ibfk_1' => ['type' => 'foreign', 'columns' => ['IdUser'], 'references' => ['users', 'IdUser'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
            'IdEmail' => 1,
            'Email' => 'Lorem ipsum dolor sit amet',
            'DtRegister' => '2017-06-12',
            'EmailFrom' => 'Lorem ipsum dolor sit amet',
            'IdUser' => 1
        ],
    ];
}
