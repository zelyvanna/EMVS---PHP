<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tblquestionnaire Controller
 *
 * @property \App\Model\Table\TblquestionnaireTable $Tblquestionnaire
 */
class TblquestionnaireController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $tblquestionnaire = $this->paginate($this->Tblquestionnaire);

        $this->set(compact('tblquestionnaire'));
        $this->set('_serialize', ['tblquestionnaire']);
    }

    /**
     * View method
     *
     * @param string|null $id Tblquestionnaire id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tblquestionnaire = $this->Tblquestionnaire->get($id, [
            'contain' => []
        ]);

        $this->set('tblquestionnaire', $tblquestionnaire);
        $this->set('_serialize', ['tblquestionnaire']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tblquestionnaire = $this->Tblquestionnaire->newEntity();
        if ($this->request->is('post')) {
            $tblquestionnaire = $this->Tblquestionnaire->patchEntity($tblquestionnaire, $this->request->data);
            if ($this->Tblquestionnaire->save($tblquestionnaire)) {
                $this->Flash->success(__('The tblquestionnaire has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tblquestionnaire could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tblquestionnaire'));
        $this->set('_serialize', ['tblquestionnaire']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tblquestionnaire id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tblquestionnaire = $this->Tblquestionnaire->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tblquestionnaire = $this->Tblquestionnaire->patchEntity($tblquestionnaire, $this->request->data);
            if ($this->Tblquestionnaire->save($tblquestionnaire)) {
                $this->Flash->success(__('The tblquestionnaire has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tblquestionnaire could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tblquestionnaire'));
        $this->set('_serialize', ['tblquestionnaire']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tblquestionnaire id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tblquestionnaire = $this->Tblquestionnaire->get($id);
        if ($this->Tblquestionnaire->delete($tblquestionnaire)) {
            $this->Flash->success(__('The tblquestionnaire has been deleted.'));
        } else {
            $this->Flash->error(__('The tblquestionnaire could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
