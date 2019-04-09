<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tbltypequestion Controller
 *
 * @property \App\Model\Table\TbltypequestionTable $Tbltypequestion
 */
class TbltypequestionController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $tbltypequestion = $this->paginate($this->Tbltypequestion);

        $this->set(compact('tbltypequestion'));
        $this->set('_serialize', ['tbltypequestion']);
    }

    /**
     * View method
     *
     * @param string|null $id Tbltypequestion id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tbltypequestion = $this->Tbltypequestion->get($id, [
            'contain' => []
        ]);

        $this->set('tbltypequestion', $tbltypequestion);
        $this->set('_serialize', ['tbltypequestion']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tbltypequestion = $this->Tbltypequestion->newEntity();
        if ($this->request->is('post')) {
            $tbltypequestion = $this->Tbltypequestion->patchEntity($tbltypequestion, $this->request->data);
            if ($this->Tbltypequestion->save($tbltypequestion)) {
                $this->Flash->success(__('The tbltypequestion has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tbltypequestion could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tbltypequestion'));
        $this->set('_serialize', ['tbltypequestion']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tbltypequestion id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tbltypequestion = $this->Tbltypequestion->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tbltypequestion = $this->Tbltypequestion->patchEntity($tbltypequestion, $this->request->data);
            if ($this->Tbltypequestion->save($tbltypequestion)) {
                $this->Flash->success(__('The tbltypequestion has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tbltypequestion could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tbltypequestion'));
        $this->set('_serialize', ['tbltypequestion']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tbltypequestion id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tbltypequestion = $this->Tbltypequestion->get($id);
        if ($this->Tbltypequestion->delete($tbltypequestion)) {
            $this->Flash->success(__('The tbltypequestion has been deleted.'));
        } else {
            $this->Flash->error(__('The tbltypequestion could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
