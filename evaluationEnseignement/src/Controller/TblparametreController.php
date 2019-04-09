<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tblparametre Controller
 *
 * @property \App\Model\Table\TblparametreTable $Tblparametre
 */
class TblparametreController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $tblparametre = $this->paginate($this->Tblparametre);

        $this->set(compact('tblparametre'));
        $this->set('_serialize', ['tblparametre']);
    }

    /**
     * View method
     *
     * @param string|null $id Tblparametre id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tblparametre = $this->Tblparametre->get($id, [
            'contain' => []
        ]);

        $this->set('tblparametre', $tblparametre);
        $this->set('_serialize', ['tblparametre']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tblparametre = $this->Tblparametre->newEntity();
        if ($this->request->is('post')) {
            $tblparametre = $this->Tblparametre->patchEntity($tblparametre, $this->request->data);
            if ($this->Tblparametre->save($tblparametre)) {
                $this->Flash->success(__('The tblparametre has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tblparametre could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tblparametre'));
        $this->set('_serialize', ['tblparametre']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tblparametre id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tblparametre = $this->Tblparametre->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tblparametre = $this->Tblparametre->patchEntity($tblparametre, $this->request->data);
            if ($this->Tblparametre->save($tblparametre)) {
                $this->Flash->success(__('The tblparametre has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tblparametre could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tblparametre'));
        $this->set('_serialize', ['tblparametre']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tblparametre id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tblparametre = $this->Tblparametre->get($id);
        if ($this->Tblparametre->delete($tblparametre)) {
            $this->Flash->success(__('The tblparametre has been deleted.'));
        } else {
            $this->Flash->error(__('The tblparametre could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
