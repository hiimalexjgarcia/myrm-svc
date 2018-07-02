<?php
use Migrations\AbstractMigration;

class CreateRaffles extends AbstractMigration
{

    public function up()
    {

        $this->table('prizes')
            ->changeColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->update();
        $this->table('tickets')
            ->dropForeignKey([], 'fk_tickets_prizes')
            ->removeIndexByName('fk_tickets_prizes_idx')
            ->update();

        $this->table('tickets')
            ->removeColumn('prize_id')
            ->update();

        $this->table('raffles')
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('title', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('description', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'user_id',
                ]
            )
            ->create();

        $this->table('raffles')
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->update();

        $this->table('prizes')
            ->addColumn('raffle_id', 'integer', [
                'after' => 'user_id',
                'default' => null,
                'length' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'raffle_id',
                ],
                [
                    'name' => 'fk_prizes_raffles_idx',
                ]
            )
            ->update();

        $this->table('tickets')
            ->addColumn('raffle_id', 'integer', [
                'after' => 'user_id',
                'default' => null,
                'length' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'raffle_id',
                ],
                [
                    'name' => 'fk_tickets_raffles_idx',
                ]
            )
            ->update();

        $this->table('prizes')
            ->addForeignKey(
                'raffle_id',
                'raffles',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->update();

        $this->table('tickets')
            ->addForeignKey(
                'raffle_id',
                'raffles',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->update();
    }

    public function down()
    {
        $this->table('raffles')
            ->dropForeignKey(
                'user_id'
            );

        $this->table('prizes')
            ->dropForeignKey(
                'raffle_id'
            );

        $this->table('tickets')
            ->dropForeignKey(
                'raffle_id'
            );

        $this->table('prizes')
            ->removeIndexByName('fk_prizes_raffles_idx')
            ->update();

        $this->table('prizes')
            ->changeColumn('user_id', 'integer', [
                'default' => null,
                'length' => 11,
                'null' => true,
            ])
            ->removeColumn('raffle_id')
            ->update();

        $this->table('tickets')
            ->removeIndexByName('fk_tickets_raffles_idx')
            ->update();

        $this->table('tickets')
            ->addColumn('prize_id', 'integer', [
                'after' => 'modified',
                'default' => null,
                'length' => 11,
                'null' => false,
            ])
            ->removeColumn('raffle_id')
            ->addIndex(
                [
                    'prize_id',
                ],
                [
                    'name' => 'fk_tickets_prizes_idx',
                ]
            )
            ->update();

        $this->table('tickets')
            ->addForeignKey(
                'prize_id',
                'prizes',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->update();

        $this->dropTable('raffles');
    }
}

