<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Exception\NotFoundException;

class ArticlesController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        // $this->getEventManager()->off($this->Csrf);
    }

    public function index()
    {
      $articles = $this->Articles->find('all');
      $this->set(compact('articles'));
      $this->viewBuilder()->setOption('serialize', ['articles']);
    }

    public function view($id = null)
    {
      if (!$id) {
        throw new NotFoundException('Invalid article');
      }
      
      $article = $this->Articles->get($id);
      $this->set(compact('article'));
      $this->viewBuilder()->setOption('serialize', ['article']);
    }

    public function add()
    {
      $article = $this->Articles->newEmptyEntity();
      if ($this->request->is('post')) {
          $articleData = $this->request->getData();
          // hardcode user_id = 1
          $articleData['user_id'] = 1;

          $article = $this->Articles->patchEntity($article, $articleData);
          if ($this->Articles->save($article)) {
              $this->Flash->success('Your article has been saved.');
              return $this->redirect(['action' => 'index']);
          }
          $this->Flash->error('Unable to add your article.');
      }
      $this->set('article', $article);
    }

    public function edit($id)
    {
      $article = $this->Articles->get($id);
      if ($this->request->is(['post', 'put'])) {
          $this->Articles->patchEntity($article, $this->request->getData());
          if ($this->Articles->save($article)) {
              $this->Flash->success('Your article has been updated.');
              return $this->redirect(['action' => 'index']);
          }
          $this->Flash->error('Unable to update your article.');
      }
  
      $this->set('article', $article);
    }

    public function delete($id)
    {
      $this->request->allowMethod(['post', 'delete']);

      $article = $this->Articles->get($id);
      if ($this->Articles->delete($article)) {
          $this->Flash->success('The article with id: {0} has been deleted.');
          return $this->redirect(['action' => 'index']);
      }
    }
}
