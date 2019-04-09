<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tblparticipation Controller
 *
 * @property \App\Model\Table\TblparticipationTable $Tblparticipation
 */
class TblparticipationController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $tblparticipation = $this->paginate($this->Tblparticipation);

        $this->set(compact('tblparticipation'));
        $this->set('_serialize', ['tblparticipation']);
    }

    /**
     * View method
     *
     * @param string|null $id Tblparticipation id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tblparticipation = $this->Tblparticipation->get($id, [
            'contain' => []
        ]);

        $this->set('tblparticipation', $tblparticipation);
        $this->set('_serialize', ['tblparticipation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tblparticipation = $this->Tblparticipation->newEntity();
        if ($this->request->is('post')) {
            $tblparticipation = $this->Tblparticipation->patchEntity($tblparticipation, $this->request->data);
            if ($this->Tblparticipation->save($tblparticipation)) {
                $this->Flash->success(__('The tblparticipation has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tblparticipation could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tblparticipation'));
        $this->set('_serialize', ['tblparticipation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tblparticipation id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tblparticipation = $this->Tblparticipation->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tblparticipation = $this->Tblparticipation->patchEntity($tblparticipation, $this->request->data);
            if ($this->Tblparticipation->save($tblparticipation)) {
                $this->Flash->success(__('The tblparticipation has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tblparticipation could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tblparticipation'));
        $this->set('_serialize', ['tblparticipation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tblparticipation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tblparticipation = $this->Tblparticipation->get($id);
        if ($this->Tblparticipation->delete($tblparticipation)) {
            $this->Flash->success(__('The tblparticipation has been deleted.'));
        } else {
            $this->Flash->error(__('The tblparticipation could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
