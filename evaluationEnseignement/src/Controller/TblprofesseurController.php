<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tblprofesseur Controller
 *
 * @property \App\Model\Table\TblprofesseurTable $Tblprofesseur
 */
class TblprofesseurController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $tblprofesseur = $this->paginate($this->Tblprofesseur);

        $this->set(compact('tblprofesseur'));
        $this->set('_serialize', ['tblprofesseur']);
    }

    /**
     * View method
     *
     * @param string|null $id Tblprofesseur id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tblprofesseur = $this->Tblprofesseur->get($id, [
            'contain' => []
        ]);

        $this->set('tblprofesseur', $tblprofesseur);
        $this->set('_serialize', ['tblprofesseur']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tblprofesseur = $this->Tblprofesseur->newEntity();
        if ($this->request->is('post')) {
            $tblprofesseur = $this->Tblprofesseur->patchEntity($tblprofesseur, $this->request->data);
            if ($this->Tblprofesseur->save($tblprofesseur)) {
                $this->Flash->success(__('The tblprofesseur has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tblprofesseur could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tblprofesseur'));
        $this->set('_serialize', ['tblprofesseur']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tblprofesseur id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tblprofesseur = $this->Tblprofesseur->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tblprofesseur = $this->Tblprofesseur->patchEntity($tblprofesseur, $this->request->data);
            if ($this->Tblprofesseur->save($tblprofesseur)) {
                $this->Flash->success(__('The tblprofesseur has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tblprofesseur could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tblprofesseur'));
        $this->set('_serialize', ['tblprofesseur']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tblprofesseur id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tblprofesseur = $this->Tblprofesseur->get($id);
        if ($this->Tblprofesseur->delete($tblprofesseur)) {
            $this->Flash->success(__('The tblprofesseur has been deleted.'));
        } else {
            $this->Flash->error(__('The tblprofesseur could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
