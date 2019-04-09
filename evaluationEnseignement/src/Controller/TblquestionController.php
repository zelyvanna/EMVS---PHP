<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tblquestion Controller
 *
 * @property \App\Model\Table\TblquestionTable $Tblquestion
 */
class TblquestionController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $tblquestion = $this->paginate($this->Tblquestion);

        $this->set(compact('tblquestion'));
        $this->set('_serialize', ['tblquestion']);
    }

    /**
     * View method
     *
     * @param string|null $id Tblquestion id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tblquestion = $this->Tblquestion->get($id, [
            'contain' => []
        ]);

        $this->set('tblquestion', $tblquestion);
        $this->set('_serialize', ['tblquestion']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tblquestion = $this->Tblquestion->newEntity();
        if ($this->request->is('post')) {
            $tblquestion = $this->Tblquestion->patchEntity($tblquestion, $this->request->data);
            if ($this->Tblquestion->save($tblquestion)) {
                $this->Flash->success(__('The tblquestion has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tblquestion could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tblquestion'));
        $this->set('_serialize', ['tblquestion']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tblquestion id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tblquestion = $this->Tblquestion->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tblquestion = $this->Tblquestion->patchEntity($tblquestion, $this->request->data);
            if ($this->Tblquestion->save($tblquestion)) {
                $this->Flash->success(__('The tblquestion has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tblquestion could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tblquestion'));
        $this->set('_serialize', ['tblquestion']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tblquestion id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tblquestion = $this->Tblquestion->get($id);
        if ($this->Tblquestion->delete($tblquestion)) {
            $this->Flash->success(__('The tblquestion has been deleted.'));
        } else {
            $this->Flash->error(__('The tblquestion could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
