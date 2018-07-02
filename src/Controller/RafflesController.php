<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Raffles Controller
 *
 * @property \App\Model\Table\RafflesTable $Raffles
 *
 * @method \App\Model\Entity\Raffle[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RafflesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $raffles = $this->paginate($this->Raffles);

        $this->set(compact('raffles'));
    }

    /**
     * View method
     *
     * @param string|null $id Raffle id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $raffle = $this->Raffles->get($id, [
            'contain' => ['Users', 'Prizes', 'Tickets']
        ]);

        $this->set('raffle', $raffle);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $raffle = $this->Raffles->newEntity();
        if ($this->request->is('post')) {
            $raffle = $this->Raffles->patchEntity($raffle, $this->request->getData());
            if ($this->Raffles->save($raffle)) {
                $this->Flash->success(__('The raffle has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The raffle could not be saved. Please, try again.'));
        }
        $users = $this->Raffles->Users->find('list', ['limit' => 200]);
        $this->set(compact('raffle', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Raffle id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $raffle = $this->Raffles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $raffle = $this->Raffles->patchEntity($raffle, $this->request->getData());
            if ($this->Raffles->save($raffle)) {
                $this->Flash->success(__('The raffle has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The raffle could not be saved. Please, try again.'));
        }
        $users = $this->Raffles->Users->find('list', ['limit' => 200]);
        $this->set(compact('raffle', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Raffle id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $raffle = $this->Raffles->get($id);
        if ($this->Raffles->delete($raffle)) {
            $this->Flash->success(__('The raffle has been deleted.'));
        } else {
            $this->Flash->error(__('The raffle could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
