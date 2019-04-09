<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tblresultat Controller
 *
 * @property \App\Model\Table\TblresultatTable $Tblresultat
 */
class TblresultatController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $tblresultat = $this->paginate($this->Tblresultat);

        $this->set(compact('tblresultat'));
        $this->set('_serialize', ['tblresultat']);
    }

    /**
     * View method
     *
     * @param string|null $id Tblresultat id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tblresultat = $this->Tblresultat->get($id, [
            'contain' => []
        ]);

        $this->set('tblresultat', $tblresultat);
        $this->set('_serialize', ['tblresultat']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tblresultat = $this->Tblresultat->newEntity();
        if ($this->request->is('post')) {
            $tblresultat = $this->Tblresultat->patchEntity($tblresultat, $this->request->data);
            if ($this->Tblresultat->save($tblresultat)) {
                $this->Flash->success(__('The tblresultat has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tblresultat could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tblresultat'));
        $this->set('_serialize', ['tblresultat']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tblresultat id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tblresultat = $this->Tblresultat->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tblresultat = $this->Tblresultat->patchEntity($tblresultat, $this->request->data);
            if ($this->Tblresultat->save($tblresultat)) {
                $this->Flash->success(__('The tblresultat has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tblresultat could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tblresultat'));
        $this->set('_serialize', ['tblresultat']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tblresultat id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tblresultat = $this->Tblresultat->get($id);
        if ($this->Tblresultat->delete($tblresultat)) {
            $this->Flash->success(__('The tblresultat has been deleted.'));
        } else {
            $this->Flash->error(__('The tblresultat could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
