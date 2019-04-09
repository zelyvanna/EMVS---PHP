<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tblsection Controller
 *
 * @property \App\Model\Table\TblsectionTable $Tblsection
 */
class TblsectionController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $tblsection = $this->paginate($this->Tblsection);

        $this->set(compact('tblsection'));
        $this->set('_serialize', ['tblsection']);
    }

    /**
     * View method
     *
     * @param string|null $id Tblsection id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tblsection = $this->Tblsection->get($id, [
            'contain' => []
        ]);

        $this->set('tblsection', $tblsection);
        $this->set('_serialize', ['tblsection']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tblsection = $this->Tblsection->newEntity();
        if ($this->request->is('post')) {
            $tblsection = $this->Tblsection->patchEntity($tblsection, $this->request->data);
            if ($this->Tblsection->save($tblsection)) {
                $this->Flash->success(__('The tblsection has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tblsection could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tblsection'));
        $this->set('_serialize', ['tblsection']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tblsection id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tblsection = $this->Tblsection->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tblsection = $this->Tblsection->patchEntity($tblsection, $this->request->data);
            if ($this->Tblsection->save($tblsection)) {
                $this->Flash->success(__('The tblsection has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tblsection could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tblsection'));
        $this->set('_serialize', ['tblsection']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tblsection id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tblsection = $this->Tblsection->get($id);
        if ($this->Tblsection->delete($tblsection)) {
            $this->Flash->success(__('The tblsection has been deleted.'));
        } else {
            $this->Flash->error(__('The tblsection could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
