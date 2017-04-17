<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = array(

         array(
                'username'   => 'rahul',
                'password'    => sha1('123456'),
                'role'    => 'admin',
                'created' => date('Y-m-d H:i:s'),
            ),
            array(
                'username'   => 'singh',
                'password'    => sha1('123456'),
                'role'    => 'admin',
                'created' => date('Y-m-d H:i:s'),
            ),
             array(
                'username'   => 'demo',
                'password'    => sha1('123456'),
                'role'    => 'admin',
                'created' => date('Y-m-d H:i:s'),
            )
            
);
        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
