<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ForgotPasswordFixture
 *
 */
class ForgotPasswordFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'forgot_password';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'IdForgotPassword' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'IdUser' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'token' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_forgot_password_users1_idx' => ['type' => 'index', 'columns' => ['IdForgotPassword'], 'length' => []],
            'fk_forgot_password_users1' => ['type' => 'index', 'columns' => ['IdUser'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['IdForgotPassword'], 'length' => []],
            'fk_forgot_password_users1' => ['type' => 'foreign', 'columns' => ['IdUser'], 'references' => ['users', 'IdUser'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'IdForgotPassword' => 1,
            'IdUser' => 1,
            'token' => 'Lorem ipsum dolor sit amet',
            'created' => '2017-07-26 13:36:11'
        ],
    ];
}
