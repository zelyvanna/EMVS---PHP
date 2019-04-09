<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tblevaluation Controller
 *
 * @property \App\Model\Table\TblevaluationTable $Tblevaluation
 */
class TblevaluationController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $tblevaluation = $this->paginate($this->Tblevaluation);

        $this->set(compact('tblevaluation'));
        $this->set('_serialize', ['tblevaluation']);
    }

    /**
     * View method
     *
     * @param string|null $id Tblevaluation id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tblevaluation = $this->Tblevaluation->get($id, [
            'contain' => []
        ]);

        $this->set('tblevaluation', $tblevaluation);
        $this->set('_serialize', ['tblevaluation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tblevaluation = $this->Tblevaluation->newEntity();
        if ($this->request->is('post')) {
            $tblevaluation = $this->Tblevaluation->patchEntity($tblevaluation, $this->request->data);
            if ($this->Tblevaluation->save($tblevaluation)) {
                $this->Flash->success(__('The tblevaluation has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tblevaluation could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tblevaluation'));
        $this->set('_serialize', ['tblevaluation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tblevaluation id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tblevaluation = $this->Tblevaluation->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tblevaluation = $this->Tblevaluation->patchEntity($tblevaluation, $this->request->data);
            if ($this->Tblevaluation->save($tblevaluation)) {
                $this->Flash->success(__('The tblevaluation has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tblevaluation could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tblevaluation'));
        $this->set('_serialize', ['tblevaluation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tblevaluation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tblevaluation = $this->Tblevaluation->get($id);
        if ($this->Tblevaluation->delete($tblevaluation)) {
            $this->Flash->success(__('The tblevaluation has been deleted.'));
        } else {
            $this->Flash->error(__('The tblevaluation could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
