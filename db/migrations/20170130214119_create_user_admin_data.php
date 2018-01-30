<?php

use Phinx\Migration\AbstractMigration;

class CreateUserAdminData extends AbstractMigration
{

    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */

    public function up()
    {

        $app = require __DIR__ . '/../bootstrap.php';
        $auth = $app->service('auth');

        $users = $this->table('users');
        $users->insert([
            'first_name' => 'Admin',
            'last_name' => 'System',
            'email' => 'admin@user.com',
            'password' => $auth->hashPassword('123456'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ])->save();
    }

    public function down()
    {
        $this->execute("DELETE FROM users WHERE email ='admin@user.com' ");
    }
}
