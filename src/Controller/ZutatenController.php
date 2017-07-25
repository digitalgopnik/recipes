<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Zutaten Controller
 *
 * @property \App\Model\Table\ZutatenTable $Zutaten
 *
 * @method \App\Model\Entity\Zutaten[] paginate($object = null, array $settings = [])
 */
class ZutatenController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $zutaten = $this->paginate($this->Zutaten);

        $this->set(compact('zutaten'));
        $this->set('_serialize', ['zutaten']);
    }

    /**
     * View method
     *
     * @param string|null $id Zutaten id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $zutaten = $this->Zutaten->get($id, [
            'contain' => ['ZutatenZuInformation']
        ]);

        $this->set('zutaten', $zutaten);
        $this->set('_serialize', ['zutaten']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $zutaten = $this->Zutaten->newEntity();
        if ($this->request->is('post')) {
            $zutaten = $this->Zutaten->patchEntity($zutaten, $this->request->getData());
            if ($this->Zutaten->save($zutaten)) {
                $this->Flash->success(__('The zutaten has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The zutaten could not be saved. Please, try again.'));
        }
        $this->set(compact('zutaten'));
        $this->set('_serialize', ['zutaten']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Zutaten id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $zutaten = $this->Zutaten->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $zutaten = $this->Zutaten->patchEntity($zutaten, $this->request->getData());
            if ($this->Zutaten->save($zutaten)) {
                $this->Flash->success(__('The zutaten has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The zutaten could not be saved. Please, try again.'));
        }
        $this->set(compact('zutaten'));
        $this->set('_serialize', ['zutaten']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Zutaten id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $zutaten = $this->Zutaten->get($id);
        if ($this->Zutaten->delete($zutaten)) {
            $this->Flash->success(__('The zutaten has been deleted.'));
        } else {
            $this->Flash->error(__('The zutaten could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
