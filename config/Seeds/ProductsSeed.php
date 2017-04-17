<?php
use Migrations\AbstractSeed;

/**
 * Products seed.
 */
class ProductsSeed extends AbstractSeed
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
                'name'   => 'test',
                'product_image'    => 'index.jpeg',
                'description'    => 'details',
                'created' => date('Y-m-d H:i:s'),
            ),
            array(
                'name'   => 'demo',
                'product_image'    => 'index.jpeg',
                'description'    => 'details',
                'created' => date('Y-m-d H:i:s'),
            ),
             array(
                'name'   => 'cake',
                'product_image'    => 'index.jpeg',
                'description'    => 'details',
                'created' => date('Y-m-d H:i:s'),
            ),
             array(
                'name'   => 'computer',
                'product_image'    => 'index.jpeg',
                'description'    => 'details',
                'created' => date('Y-m-d H:i:s'),
            )

);
        $table = $this->table('products');
        $table->insert($data)->save();
    }
}
