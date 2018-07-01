<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Prizes Controller
 *
 * @property \App\Model\Table\PrizesTable $Prizes
 *
 * @method \App\Model\Entity\Prize[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PrizesController extends AppController
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
        $prizes = $this->paginate($this->Prizes);

        $this->set(compact('prizes'));
    }

    /**
     * View method
     *
     * @param string|null $id Prize id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $prize = $this->Prizes->get($id, [
            'contain' => ['Users', 'Tickets']
        ]);

        $this->set('prize', $prize);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $prize = $this->Prizes->newEntity();
        if ($this->request->is('post')) {
            $prize = $this->Prizes->patchEntity($prize, $this->request->getData());
            if ($this->Prizes->save($prize)) {
                $this->Flash->success(__('The prize has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The prize could not be saved. Please, try again.'));
        }
        $users = $this->Prizes->Users->find('list', ['limit' => 200]);
        $this->set(compact('prize', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Prize id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $prize = $this->Prizes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $prize = $this->Prizes->patchEntity($prize, $this->request->getData());
            if ($this->Prizes->save($prize)) {
                $this->Flash->success(__('The prize has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The prize could not be saved. Please, try again.'));
        }
        $users = $this->Prizes->Users->find('list', ['limit' => 200]);
        $this->set(compact('prize', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Prize id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $prize = $this->Prizes->get($id);
        if ($this->Prizes->delete($prize)) {
            $this->Flash->success(__('The prize has been deleted.'));
        } else {
            $this->Flash->error(__('The prize could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
