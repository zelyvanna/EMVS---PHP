<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tbllistequestion Controller
 *
 * @property \App\Model\Table\TbllistequestionTable $Tbllistequestion
 */
class TbllistequestionController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $tbllistequestion = $this->paginate($this->Tbllistequestion);

        $this->set(compact('tbllistequestion'));
        $this->set('_serialize', ['tbllistequestion']);
    }

    /**
     * View method
     *
     * @param string|null $id Tbllistequestion id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tbllistequestion = $this->Tbllistequestion->get($id, [
            'contain' => []
        ]);

        $this->set('tbllistequestion', $tbllistequestion);
        $this->set('_serialize', ['tbllistequestion']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tbllistequestion = $this->Tbllistequestion->newEntity();
        if ($this->request->is('post')) {
            $tbllistequestion = $this->Tbllistequestion->patchEntity($tbllistequestion, $this->request->data);
            if ($this->Tbllistequestion->save($tbllistequestion)) {
                $this->Flash->success(__('The tbllistequestion has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tbllistequestion could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tbllistequestion'));
        $this->set('_serialize', ['tbllistequestion']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tbllistequestion id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tbllistequestion = $this->Tbllistequestion->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tbllistequestion = $this->Tbllistequestion->patchEntity($tbllistequestion, $this->request->data);
            if ($this->Tbllistequestion->save($tbllistequestion)) {
                $this->Flash->success(__('The tbllistequestion has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tbllistequestion could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tbllistequestion'));
        $this->set('_serialize', ['tbllistequestion']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tbllistequestion id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tbllistequestion = $this->Tbllistequestion->get($id);
        if ($this->Tbllistequestion->delete($tbllistequestion)) {
            $this->Flash->success(__('The tbllistequestion has been deleted.'));
        } else {
            $this->Flash->error(__('The tbllistequestion could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
