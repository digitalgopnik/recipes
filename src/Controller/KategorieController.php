<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Kategorie Controller
 *
 * @property \App\Model\Table\KategorieTable $Kategorie
 *
 * @method \App\Model\Entity\Kategorie[] paginate($object = null, array $settings = [])
 */
class KategorieController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $kategorie = $this->paginate($this->Kategorie);

        $this->set(compact('kategorie'));
        $this->set('_serialize', ['kategorie']);
    }

    /**
     * View method
     *
     * @param string|null $id Kategorie id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $kategorie = $this->Kategorie->get($id, [
            'contain' => ['InformationZuKategorie']
        ]);

        $this->set('kategorie', $kategorie);
        $this->set('_serialize', ['kategorie']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $kategorie = $this->Kategorie->newEntity();
        if ($this->request->is('post')) {
            $kategorie = $this->Kategorie->patchEntity($kategorie, $this->request->getData());
            if ($this->Kategorie->save($kategorie)) {
                $this->Flash->success(__('Die Kategorie wurde erfolgreich angelegt.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The kategorie could not be saved. Please, try again.'));
        }
        $this->set(compact('kategorie'));
        $this->set('_serialize', ['kategorie']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Kategorie id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $kategorie = $this->Kategorie->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $kategorie = $this->Kategorie->patchEntity($kategorie, $this->request->getData());
            if ($this->Kategorie->save($kategorie)) {
                $this->Flash->success(__('Die Kategorie wurde erfolgreich gespeichert.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The kategorie could not be saved. Please, try again.'));
        }
        $this->set(compact('kategorie'));
        $this->set('_serialize', ['kategorie']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Kategorie id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $kategorie = $this->Kategorie->get($id);
        if ($this->Kategorie->delete($kategorie)) {
            $this->Flash->success(__('The kategorie has been deleted.'));
        } else {
            $this->Flash->error(__('The kategorie could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
