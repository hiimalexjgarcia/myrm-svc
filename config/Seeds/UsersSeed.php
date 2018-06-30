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
        $data = [
            [
                'id' => '1',
                'username' => 'admin',
                'password' => '$2y$10$V0PptpiIZbhpPyUahUKVnOWK06rKwo9GVhsCefOhoWelilJK9BsO6',
                'created' => '2018-06-30 18:56:56',
                'modified' => '2018-06-30 19:18:00',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
