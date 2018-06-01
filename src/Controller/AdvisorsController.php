<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Advisors Controller
 *
 * @property \App\Model\Table\AdvisorsTable $Advisors
 *
 * @method \App\Model\Entity\Advisor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdvisorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers']
        ];
        $advisors = $this->paginate($this->Advisors);

        $this->set(compact('advisors'));
    }

    /**
     * View method
     *
     * @param string|null $id Advisor id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $advisor = $this->Advisors->get($id, [
            'contain' => ['Customers']
        ]);

        $this->set('advisor', $advisor);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $advisor = $this->Advisors->newEntity();
        if ($this->request->is('post')) {
            $advisor = $this->Advisors->patchEntity($advisor, $this->request->getData());
            if ($this->Advisors->save($advisor)) {
                $this->Flash->success(__('La référence a bien été sauvegardée'));

                return $this->redirect(['controller' => 'Customers', 'action' => 'view', $advisor->customer_id]);
            }
            $this->Flash->error(__('La référence n\'a pas pu être sauvegardé'));
            return $this->redirect(['controller' => 'Customers', 'action' => 'view', $advisor->customer_id]);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Advisor id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $advisor = $this->Advisors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $advisor = $this->Advisors->patchEntity($advisor, $this->request->getData());
            if ($this->Advisors->save($advisor)) {
                $this->Flash->success(__('The advisor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The advisor could not be saved. Please, try again.'));
        }
        $customers = $this->Advisors->Customers->find('list', ['limit' => 200]);
        $this->set(compact('advisor', 'customers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Advisor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $advisor = $this->Advisors->get($id);
        if ($this->Advisors->delete($advisor)) {
            $this->Flash->success(__('La référence a été supprimée'));
        } else {
            $this->Flash->error(__("Nous n'avons pas pu supprimer cette référence. Réessayez plus tard"));
        }

        return $this->redirect(['controller' => 'Customers', 'action' => 'view', $advisor->customer_id]);
    }
}
