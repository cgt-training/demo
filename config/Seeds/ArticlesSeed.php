<?php
use Migrations\AbstractSeed;

/**
 * Articles seed.
 */
class ArticlesSeed extends AbstractSeed
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
                'title'   => 'test',
                'body'    => 'foo',
                'created' => date('Y-m-d H:i:s'),
            ),
            array(
                'title'   => 'demo',
                'body'    => 'bar',
                'created' => date('Y-m-d H:i:s'),
            ),
             array(
                'title'   => 'tests',
                'body'    => 'bar',
                'created' => date('Y-m-d H:i:s'),
            ),
             array(
                'title'   => 'articles',
                'body'    => 'bar',
                'created' => date('Y-m-d H:i:s'),
            )
        );

        $table = $this->table('articles');
        $table->insert($data)->save();
    }
}
