<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AsConnections Controller
 *
 * @property \App\Model\Table\AsConnectionsTable $AsConnections
 *
 * @method \App\Model\Entity\AsConnection[] paginate($object = null, array $settings = [])
 */
class AsConnectionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $asConnections = $this->paginate($this->AsConnections);

        $this->set(compact('asConnections'));
        $this->set('_serialize', ['asConnections']);
    }

    /**
     * View method
     *
     * @param string|null $id As Connection id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $asConnection = $this->AsConnections->get($id, [
            'contain' => []
        ]);

        $this->set('asConnection', $asConnection);
        $this->set('_serialize', ['asConnection']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $asConnection = $this->AsConnections->newEntity();
        if ($this->request->is('post')) {
            $asConnection = $this->AsConnections->patchEntity($asConnection, $this->request->getData());
            if ($this->AsConnections->save($asConnection)) {
                $this->Flash->success(__('The as connection has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The as connection could not be saved. Please, try again.'));
        }
        $this->set(compact('asConnection'));
        $this->set('_serialize', ['asConnection']);
    }

    /**
     * Edit method
     *
     * @param string|null $id As Connection id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $asConnection = $this->AsConnections->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $asConnection = $this->AsConnections->patchEntity($asConnection, $this->request->getData());
            if ($this->AsConnections->save($asConnection)) {
                $this->Flash->success(__('The as connection has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The as connection could not be saved. Please, try again.'));
        }
        $this->set(compact('asConnection'));
        $this->set('_serialize', ['asConnection']);
    }

    /**
     * Delete method
     *
     * @param string|null $id As Connection id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $asConnection = $this->AsConnections->get($id);
        if ($this->AsConnections->delete($asConnection)) {
            $this->Flash->success(__('The as connection has been deleted.'));
        } else {
            $this->Flash->error(__('The as connection could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
