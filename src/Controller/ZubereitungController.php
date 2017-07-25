<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Zubereitung Controller
 *
 * @property \App\Model\Table\ZubereitungTable $Zubereitung
 *
 * @method \App\Model\Entity\Zubereitung[] paginate($object = null, array $settings = [])
 */
class ZubereitungController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $zubereitung = $this->paginate($this->Zubereitung);

        $this->set(compact('zubereitung'));
        $this->set('_serialize', ['zubereitung']);
    }

    /**
     * View method
     *
     * @param string|null $id Zubereitung id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $zubereitung = $this->Zubereitung->get($id, [
            'contain' => ['ZubereitungZuInformation']
        ]);

        $this->set('zubereitung', $zubereitung);
        $this->set('_serialize', ['zubereitung']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $zubereitung = $this->Zubereitung->newEntity();
        if ($this->request->is('post')) {
            $zubereitung = $this->Zubereitung->patchEntity($zubereitung, $this->request->getData());
            if ($this->Zubereitung->save($zubereitung)) {
                $this->Flash->success(__('The zubereitung has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The zubereitung could not be saved. Please, try again.'));
        }
        $this->set(compact('zubereitung'));
        $this->set('_serialize', ['zubereitung']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Zubereitung id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $zubereitung = $this->Zubereitung->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $zubereitung = $this->Zubereitung->patchEntity($zubereitung, $this->request->getData());
            if ($this->Zubereitung->save($zubereitung)) {
                $this->Flash->success(__('The zubereitung has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The zubereitung could not be saved. Please, try again.'));
        }
        $this->set(compact('zubereitung'));
        $this->set('_serialize', ['zubereitung']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Zubereitung id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $zubereitung = $this->Zubereitung->get($id);
        if ($this->Zubereitung->delete($zubereitung)) {
            $this->Flash->success(__('The zubereitung has been deleted.'));
        } else {
            $this->Flash->error(__('The zubereitung could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
