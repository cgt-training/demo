<?php
use Migrations\AbstractSeed;

/**
 * Blogs seed.
 */
class BlogsSeed extends AbstractSeed
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
                    'title' => 'blogs',
                    'description' => 'details',
                    'created' => date('Y-m-d H:i:s'),
                    ),
                array(
                    'title' => 'blogs2',
                    'description' => 'details',
                    'created' => date('Y-m-d H:i:s'),
                    ),
                array(
                    'title' => 'blogs3',
                    'description' => 'details',
                    'created' => date('Y-m-d H:i:s'),
                    ),
                array(
                    'title' => 'blogs4',
                    'description' => 'details',
                    'created' => date('Y-m-d H:i:s'),
                    ),

            );

        $table = $this->table('blogs');
        $table->insert($data)->save();
    }
}
