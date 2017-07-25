<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Information Controller
 *
 * @property \App\Model\Table\InformationTable $Information
 *
 * @method \App\Model\Entity\Information[] paginate($object = null, array $settings = [])
 */
class InformationController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $informationen = $this->Information
            ->find()
            ->contain(['BilderZuInformation', 'ZubereitungZuInformation', 'ZutatenZuInformation', 'InformationZuKategorie']);
        $this->set('informationen', $informationen);

        $this->loadModel('Kategorie');
        $kategorien = $this->Kategorie->find();
        $kategorien_as_array = [];
        foreach ($kategorien as $kategorie) {
            $kategorien_as_array[$kategorie->id] = $kategorie->name;
        }

        $this->set('kategorien', $kategorien_as_array);
    }

    /**
     * View method
     *
     * @param string|null $id Information id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $information = $this->Information->get($id, [
            'contain' => ['BilderZuInformation', 'InformationZuKategorie', 'ZubereitungZuInformation', 'ZutatenZuInformation']
        ]);

        $this->loadModel('Zubereitung');
        $this->loadModel('Zutaten');

        $zubereitungen = [];
        if ($information->has('zubereitung_zu_information') && $information->zubereitung_zu_information) {
            foreach ($information->zubereitung_zu_information as $zubereitung_zu_information) {
                $zubereitung = $this->Zubereitung->find()->where(['id' => $zubereitung_zu_information->zubereitung_id])->first();
                if ($zubereitung_zu_information->sortierung > 0) $zubereitungen[$zubereitung_zu_information->sortierung] = $zubereitung;
                else $zubereitungen[] = $zubereitung;
            }
        }
        $information->zubereitungen = $zubereitungen;

        $zutaten = [];
        if ($information->has('zutaten_zu_information') && $information->zutaten_zu_information) {
            foreach ($information->zutaten_zu_information as $zutaten_zu_information) {
                $zutat = $this->Zutaten->find()->where(['id' => $zutaten_zu_information->zutaten_id])->first();
                if ($zutat) {
                    if ($zutaten_zu_information->sortierung>0) $zutaten[$zutaten_zu_information->sortierung] = $zutat;
                    else $zutaten[] = $zutat;
                }
            }
        }
        $information->zutaten = $zutaten;

        $this->set('information', $information);
        $this->set('_serialize', ['information']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $information = $this->Information->newEntity();
        if ($this->request->is('post')) {
            $information = $this->Information->patchEntity($information, $this->request->getData());
            $save_information = $this->Information->save($information);
            if ($save_information) {

                // Alle Zutatenzuweisungen löschen
                $zutaten_zu_information = $this->ZutatenZuInformation
                    ->find()
                    ->where(['information_id' => $save_information->id]);
                foreach ($zutaten_zu_information as $zutat_zu_information) {
                    $this->ZutatenZuInformation->delete($zutat_zu_information);
                }

                // Zutaten speichern
                if (strlen($this->request->getData('zutaten_menge_1')>0) &&
                    strlen($this->request->getData('zutaten_einheit_1')>0) &&
                    strlen($this->request->getData('zutaten_name_1'))>0) {
                    for ($i=1; $i<45; $i++) {
                        if (strlen($this->request->getData('zutaten_menge_' . $i))>0 &&
                            strlen($this->request->getData('zutaten_einheit_' . $i))>0 &&
                            strlen($this->request->getData('zutaten_name_' . $i))>0) {
                            $checkZutat = $this->Zutaten
                                ->find()
                                ->where([
                                    'menge' => $this->request->getData('zutaten_menge_' . $i),
                                    'einheit' => $this->request->getData('zutaten_einheit_' . $i),
                                    'name' => $this->request->getData('zutaten_name_' . $i)
                                ])
                                ->first();
                            if ($checkZutat) {
                                $new_zutat_zu_information_entity_array = [
                                    'information_id' => $save_information->id,
                                    'zutaten_id' => $checkZutat->id
                                ];
                                $new_zutat_zu_information_entity = $this->ZutatenZuInformation->newEntity($new_zutat_zu_information_entity_array);
                                if (!$this->ZutatenZuInformation->save($new_zutat_zu_information_entity)) {
                                    var_dump($new_zutat_zu_information_entity);
                                    die();
                                }
                            } else {
                                $new_zutat_entity_array = [
                                    'menge' => $this->request->getData('zutaten_menge_' . $i),
                                    'einheit' => $this->request->getData('zutaten_einheit_' . $i),
                                    'name' => $this->request->getData('zutaten_name_' . $i)
                                ];
                                $new_zutat_entity = $this->Zutaten->newEntity($new_zutat_entity_array);
                                $new_zutat = $this->Zutaten->save($new_zutat_entity);
                                $new_zutat_zu_information_entity_array = [
                                    'information_id' => $save_information->id,
                                    'zutaten_id' => $new_zutat->id
                                ];
                                $new_zutat_zu_information_entity = $this->ZutatenZuInformation->newEntity($new_zutat_zu_information_entity_array);
                                if (!$this->ZutatenZuInformation->save($new_zutat_zu_information_entity)) {
                                    var_dump($new_zutat_zu_information_entity);
                                    die();
                                }
                            }
                        }
                    }
                }

                // Alle Zubereitungszuweisungen löschen
                $zubereitungen_zu_information = $this->ZubereitungZuInformation
                    ->find()
                    ->where(['information_id' => $save_information->id]);
                foreach ($zubereitungen_zu_information as $zubereitung_zu_information) {
                    $this->ZubereitungZuInformation->delete($zubereitung_zu_information);
                }

                // Zubereitungen speichern
                if (strlen($this->request->getData('zubereitung_titel_1'))>0 &&
                    strlen($this->request->getData('zubereitung_beschreibung_1'))>0) {
                    for ($i=1; $i<45; $i++) {
                        if (strlen($this->request->getData('zubereitung_titel_' . $i))>0 &&
                            strlen($this->request->getData('zubereitung_beschreibung_' . $i))>0) {
                            $checkZubereitung = $this->Zubereitung
                                ->find()
                                ->where([
                                    'titel' => $this->request->getData('zubereitung_titel_' . $i),
                                    'beschreibung' => $this->request->getData('zubereitung_beschreibung_' . $i)
                                ])
                                ->first();
                            if ($checkZubereitung) {
                                $new_zubereitung_zu_information_entity_array = [
                                    'information_id' => $save_information->id,
                                    'zubereitung_id' => $checkZubereitung->id
                                ];
                                $new_zubereitung_zu_information_entity = $this->ZubereitungZuInformation->newEntity($new_zubereitung_zu_information_entity_array);
                                if (!$this->ZubereitungZuInformation->save($new_zubereitung_zu_information_entity)) {
                                    var_dump($new_zubereitung_zu_information_entity);
                                    die();
                                }
                            } else {
                                $new_zubereitung_entity_array = [
                                    'titel' => $this->request->getData('zubereitung_titel_' . $i),
                                    'beschreibung' => $this->request->getData('zubereitung_beschreibung_' . $i)
                                ];
                                $new_zubereitung_entity = $this->Zubereitung->newEntity($new_zutat_zu_information_entity_array);
                                $new_zubereitung = $this->Zubereitung->save($new_zubereitung_entity);

                                $new_zubereitung_zu_information_entity_array = [
                                    'information_id' => $save_information->id,
                                    'zubereitung_id' => $new_zubereitung->id
                                ];
                                $new_zubereitung_zu_information_entity = $this->ZubereitungZuInformation->newEntity($new_zubereitung_zu_information_entity_array);
                                if (!$this->ZubereitungZuInformation->save($new_zubereitung_zu_information_entity)) {
                                    var_dump($new_zubereitung_zu_information_entity);
                                    die();
                                }
                            }
                        }
                    }
                }

                $this->Flash->success(__('Das Rezept wurde erfolgreich angelegt.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Das Rezept wurde nicht gespeichert. Bitte, nochmal versuchen.'));
        }
        $this->set(compact('information'));
        $this->set('_serialize', ['information']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Information id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $information = $this->Information->get($id, [
            'contain' => [
                'ZubereitungZuInformation',
                'ZutatenZuInformation'
            ]
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $information = $this->Information->patchEntity($information, $this->request->getData());
            $save_information = $this->Information->save($information);
            if ($save_information) {

                // Alle Zutatenzuweisungen löschen
                $zutaten_zu_information = $this->ZutatenZuInformation
                    ->find()
                    ->where(['information_id' => $save_information->id]);
                foreach ($zutaten_zu_information as $zutat_zu_information) {
                    $this->ZutatenZuInformation->delete($zutat_zu_information);
                }

                // Zutaten speichern
                if (strlen($this->request->getData('zutaten_menge_1')>0) &&
                    strlen($this->request->getData('zutaten_einheit_1')>0) &&
                    strlen($this->request->getData('zutaten_name_1'))>0) {
                    for ($i=1; $i<45; $i++) {
                        if (strlen($this->request->getData('zutaten_menge_' . $i))>0 &&
                            strlen($this->request->getData('zutaten_einheit_' . $i))>0 &&
                            strlen($this->request->getData('zutaten_name_' . $i))>0) {
                            $checkZutat = $this->Zutaten
                                ->find()
                                ->where([
                                    'menge' => $this->request->getData('zutaten_menge_' . $i),
                                    'einheit' => $this->request->getData('zutaten_einheit_' . $i),
                                    'name' => $this->request->getData('zutaten_name_' . $i)
                                ])
                                ->first();
                            if ($checkZutat) {
                                $new_zutat_zu_information_entity_array = [
                                    'information_id' => $save_information->id,
                                    'zutaten_id' => $checkZutat->id
                                ];
                                $new_zutat_zu_information_entity = $this->ZutatenZuInformation->newEntity($new_zutat_zu_information_entity_array);
                                if (!$this->ZutatenZuInformation->save($new_zutat_zu_information_entity)) {
                                    var_dump($new_zutat_zu_information_entity);
                                    die();
                                }
                            } else {
                                $new_zutat_entity_array = [
                                    'menge' => $this->request->getData('zutaten_menge_' . $i),
                                    'einheit' => $this->request->getData('zutaten_einheit_' . $i),
                                    'name' => $this->request->getData('zutaten_name_' . $i)
                                ];
                                $new_zutat_entity = $this->Zutaten->newEntity($new_zutat_entity_array);
                                $new_zutat = $this->Zutaten->save($new_zutat_entity);
                                $new_zutat_zu_information_entity_array = [
                                    'information_id' => $save_information->id,
                                    'zutaten_id' => $new_zutat->id
                                ];
                                $new_zutat_zu_information_entity = $this->ZutatenZuInformation->newEntity($new_zutat_zu_information_entity_array);
                                if (!$this->ZutatenZuInformation->save($new_zutat_zu_information_entity)) {
                                    var_dump($new_zutat_zu_information_entity);
                                    die();
                                }
                            }
                        }
                    }
                }

                // Alle Zubereitungszuweisungen löschen
                $zubereitungen_zu_information = $this->ZubereitungZuInformation
                    ->find()
                    ->where(['information_id' => $save_information->id]);
                foreach ($zubereitungen_zu_information as $zubereitung_zu_information) {
                    $this->ZubereitungZuInformation->delete($zubereitung_zu_information);
                }

                // Zubereitungen speichern
                if (strlen($this->request->getData('zubereitung_titel_1'))>0 &&
                    strlen($this->request->getData('zubereitung_beschreibung_1'))>0) {
                    for ($i=1; $i<45; $i++) {
                        if (strlen($this->request->getData('zubereitung_titel_' . $i))>0 &&
                            strlen($this->request->getData('zubereitung_beschreibung_' . $i))>0) {
                            $checkZubereitung = $this->Zubereitung
                                ->find()
                                ->where([
                                    'titel' => $this->request->getData('zubereitung_titel_' . $i),
                                    'beschreibung' => $this->request->getData('zubereitung_beschreibung_' . $i)
                                ])
                                ->first();
                            if ($checkZubereitung) {
                                $new_zubereitung_zu_information_entity_array = [
                                    'information_id' => $save_information->id,
                                    'zubereitung_id' => $checkZubereitung->id
                                ];
                                $new_zubereitung_zu_information_entity = $this->ZubereitungZuInformation->newEntity($new_zubereitung_zu_information_entity_array);
                                if (!$this->ZubereitungZuInformation->save($new_zubereitung_zu_information_entity)) {
                                    var_dump($new_zubereitung_zu_information_entity);
                                    die();
                                }
                            } else {
                                $new_zubereitung_entity_array = [
                                    'titel' => $this->request->getData('zubereitung_titel_' . $i),
                                    'beschreibung' => $this->request->getData('zubereitung_beschreibung_' . $i)
                                ];
                                $new_zubereitung_entity = $this->Zubereitung->newEntity($new_zutat_zu_information_entity_array);
                                $new_zubereitung = $this->Zubereitung->save($new_zubereitung_entity);

                                $new_zubereitung_zu_information_entity_array = [
                                    'information_id' => $save_information->id,
                                    'zubereitung_id' => $new_zubereitung->id
                                ];
                                $new_zubereitung_zu_information_entity = $this->ZubereitungZuInformation->newEntity($new_zubereitung_zu_information_entity_array);
                                if (!$this->ZubereitungZuInformation->save($new_zubereitung_zu_information_entity)) {
                                    var_dump($new_zubereitung_zu_information_entity);
                                    die();
                                }
                            }
                        }
                    }
                }


                $this->Flash->success(__('Das Rezept wurde erfolgreich gespeichert.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Das Rezept wurde nicht gespeichert. Bitte, nochmal versuchen.'));
        }

        $this->loadModel('Zubereitung');
        $this->loadModel('Zutaten');

        $zubereitungen = [];
        if ($information->has('zubereitung_zu_information') && $information->zubereitung_zu_information) {
            foreach ($information->zubereitung_zu_information as $zubereitung_zu_information) {
                $zubereitung = $this->Zubereitung->find()->where(['id' => $zubereitung_zu_information->zubereitung_id])->first();
                if ($zubereitung_zu_information->sortierung > 0) $zubereitungen[$zubereitung_zu_information->sortierung] = $zubereitung;
                else $zubereitungen[] = $zubereitung;
            }
        }
        $information->zubereitungen = $zubereitungen;

        $zutaten = [];
        if ($information->has('zutaten_zu_information') && $information->zutaten_zu_information) {
            foreach ($information->zutaten_zu_information as $zutaten_zu_information) {
                $zutat = $this->Zutaten->find()->where(['id' => $zutaten_zu_information->zutaten_id])->first();
                if ($zutat) {
                    if ($zutaten_zu_information->sortierung>0) $zutaten[$zutaten_zu_information->sortierung] = $zutat;
                    else $zutaten[] = $zutat;
                }
            }
        }
        $information->zutaten = $zutaten;

        $this->set(compact('information'));
        $this->set('_serialize', ['information']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Information id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $information = $this->Information->get($id);
        if ($this->Information->delete($information)) {
            $this->Flash->success(__('The information has been deleted.'));
        } else {
            $this->Flash->error(__('The information could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
