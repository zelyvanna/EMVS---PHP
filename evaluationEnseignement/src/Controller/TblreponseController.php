<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tblreponse Controller
 *
 * @property \App\Model\Table\TblreponseTable $Tblreponse
 */
class TblreponseController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $tblreponse = $this->paginate($this->Tblreponse);

        $this->set(compact('tblreponse'));
        $this->set('_serialize', ['tblreponse']);
    }

    /**
     * View method
     *
     * @param string|null $id Tblreponse id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tblreponse = $this->Tblreponse->get($id, [
            'contain' => []
        ]);

        $this->set('tblreponse', $tblreponse);
        $this->set('_serialize', ['tblreponse']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tblreponse = $this->Tblreponse->newEntity();
        if ($this->request->is('post')) {
            $tblreponse = $this->Tblreponse->patchEntity($tblreponse, $this->request->data);
            if ($this->Tblreponse->save($tblreponse)) {
                $this->Flash->success(__('The tblreponse has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tblreponse could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tblreponse'));
        $this->set('_serialize', ['tblreponse']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tblreponse id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tblreponse = $this->Tblreponse->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tblreponse = $this->Tblreponse->patchEntity($tblreponse, $this->request->data);
            if ($this->Tblreponse->save($tblreponse)) {
                $this->Flash->success(__('The tblreponse has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tblreponse could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tblreponse'));
        $this->set('_serialize', ['tblreponse']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tblreponse id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tblreponse = $this->Tblreponse->get($id);
        if ($this->Tblreponse->delete($tblreponse)) {
            $this->Flash->success(__('The tblreponse has been deleted.'));
        } else {
            $this->Flash->error(__('The tblreponse could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
