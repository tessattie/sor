<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Documents Controller
 *
 * @property \App\Model\Table\DocumentsTable $Documents
 *
 * @method \App\Model\Entity\Document[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DocumentsController extends AppController
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
        $documents = $this->paginate($this->Documents);

        $this->set(compact('documents'));
    }

    /**
     * View method
     *
     * @param string|null $id Document id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $document = $this->Documents->get($id, [
            'contain' => ['Customers']
        ]);

        $this->set('document', $document);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $document = $this->Documents->newEntity();
        if ($this->request->is(['post', 'put', 'patch'])) {
            $document = $this->Documents->patchEntity($document, $this->request->getData());
            // debug($this->request->data);
            $path = false;
            if(!empty($_FILES['path_to_doc']['name'])){
                $path = $this->checkFile($_FILES['path_to_doc'], trim(str_replace(" ", "", $document->name."_".$document->customer_id)), 'documents');
            }
            $document->doc_path = $path;
            // debug($document);
            // die();
            if ($this->Documents->save($document)) {
                $this->Flash->success(__("Le document a bien été sauvegardé"));
                return $this->redirect(['controller' => 'Customers', 'action' => 'view', $document->customer_id]);
            }
            $this->Flash->error(__("Nous n'avons pas pu sauvegarder le document. Vérifiez l'extensions"));
        }
        return $this->redirect(['controller' => 'Customers', 'action' => 'view', $document->customer_id]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Document id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $document = $this->Documents->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $document = $this->Documents->patchEntity($document, $this->request->getData());
            if ($this->Documents->save($document)) {
                $this->Flash->success(__('The document has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The document could not be saved. Please, try again.'));
        }
        $customers = $this->Documents->Customers->find('list', ['limit' => 200]);
        $this->set(compact('document', 'customers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Document id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $document = $this->Documents->get($id);
        if ($this->Documents->delete($document)) {
            $this->Flash->success(__('ThLe document a bien été supprimé'));
        } else {
            $this->Flash->error(__("Nous n'avons pas pu supprimer ce document"));
        }
        return $this->redirect(['controller' => 'Customers', 'action' => 'view', $document->customer_id]);
    }
}
