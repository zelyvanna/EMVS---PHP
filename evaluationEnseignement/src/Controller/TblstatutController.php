<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tblstatut Controller
 *
 * @property \App\Model\Table\TblstatutTable $Tblstatut
 */
class TblstatutController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $tblstatut = $this->paginate($this->Tblstatut);

        $this->set(compact('tblstatut'));
        $this->set('_serialize', ['tblstatut']);
    }

    /**
     * View method
     *
     * @param string|null $id Tblstatut id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tblstatut = $this->Tblstatut->get($id, [
            'contain' => []
        ]);

        $this->set('tblstatut', $tblstatut);
        $this->set('_serialize', ['tblstatut']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tblstatut = $this->Tblstatut->newEntity();
        if ($this->request->is('post')) {
            $tblstatut = $this->Tblstatut->patchEntity($tblstatut, $this->request->data);
            if ($this->Tblstatut->save($tblstatut)) {
                $this->Flash->success(__('The tblstatut has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tblstatut could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tblstatut'));
        $this->set('_serialize', ['tblstatut']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tblstatut id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tblstatut = $this->Tblstatut->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tblstatut = $this->Tblstatut->patchEntity($tblstatut, $this->request->data);
            if ($this->Tblstatut->save($tblstatut)) {
                $this->Flash->success(__('The tblstatut has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tblstatut could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tblstatut'));
        $this->set('_serialize', ['tblstatut']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tblstatut id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tblstatut = $this->Tblstatut->get($id);
        if ($this->Tblstatut->delete($tblstatut)) {
            $this->Flash->success(__('The tblstatut has been deleted.'));
        } else {
            $this->Flash->error(__('The tblstatut could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
