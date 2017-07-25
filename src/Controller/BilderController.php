<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Bilder Controller
 *
 * @property \App\Model\Table\BilderTable $Bilder
 *
 * @method \App\Model\Entity\Bilder[] paginate($object = null, array $settings = [])
 */
class BilderController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $bilder = $this->paginate($this->Bilder);

        $this->set(compact('bilder'));
        $this->set('_serialize', ['bilder']);
    }

    /**
     * View method
     *
     * @param string|null $id Bilder id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bilder = $this->Bilder->get($id, [
            'contain' => ['BilderZuInformation']
        ]);

        $this->set('bilder', $bilder);
        $this->set('_serialize', ['bilder']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bilder = $this->Bilder->newEntity();
        if ($this->request->is('post')) {
            $bilder = $this->Bilder->patchEntity($bilder, $this->request->getData());
            if ($this->Bilder->save($bilder)) {
                $this->Flash->success(__('The bilder has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bilder could not be saved. Please, try again.'));
        }
        $this->set(compact('bilder'));
        $this->set('_serialize', ['bilder']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Bilder id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bilder = $this->Bilder->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bilder = $this->Bilder->patchEntity($bilder, $this->request->getData());
            if ($this->Bilder->save($bilder)) {
                $this->Flash->success(__('The bilder has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bilder could not be saved. Please, try again.'));
        }
        $this->set(compact('bilder'));
        $this->set('_serialize', ['bilder']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Bilder id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bilder = $this->Bilder->get($id);
        if ($this->Bilder->delete($bilder)) {
            $this->Flash->success(__('The bilder has been deleted.'));
        } else {
            $this->Flash->error(__('The bilder could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
