<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tblgroupe Controller
 *
 * @property \App\Model\Table\TblgroupeTable $Tblgroupe
 */
class TblgroupeController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $tblgroupe = $this->paginate($this->Tblgroupe);

        $this->set(compact('tblgroupe'));
        $this->set('_serialize', ['tblgroupe']);
    }

    /**
     * View method
     *
     * @param string|null $id Tblgroupe id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tblgroupe = $this->Tblgroupe->get($id, [
            'contain' => []
        ]);

        $this->set('tblgroupe', $tblgroupe);
        $this->set('_serialize', ['tblgroupe']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tblgroupe = $this->Tblgroupe->newEntity();
        if ($this->request->is('post')) {
            $tblgroupe = $this->Tblgroupe->patchEntity($tblgroupe, $this->request->data);
            if ($this->Tblgroupe->save($tblgroupe)) {
                $this->Flash->success(__('The tblgroupe has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tblgroupe could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tblgroupe'));
        $this->set('_serialize', ['tblgroupe']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tblgroupe id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tblgroupe = $this->Tblgroupe->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tblgroupe = $this->Tblgroupe->patchEntity($tblgroupe, $this->request->data);
            if ($this->Tblgroupe->save($tblgroupe)) {
                $this->Flash->success(__('The tblgroupe has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tblgroupe could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tblgroupe'));
        $this->set('_serialize', ['tblgroupe']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tblgroupe id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tblgroupe = $this->Tblgroupe->get($id);
        if ($this->Tblgroupe->delete($tblgroupe)) {
            $this->Flash->success(__('The tblgroupe has been deleted.'));
        } else {
            $this->Flash->error(__('The tblgroupe could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
