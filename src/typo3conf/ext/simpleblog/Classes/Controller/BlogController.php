<?php

namespace Pluswerk\Simpleblog\Controller;

/***
 *
 * This file is part of the "Simple Blog Extension" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Frank Berdel
 *
 ***/

use TYPO3\CMS\Extbase\Exception;

/**
 * BlogController
 */
class BlogController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * blogRepository
     *
     * @var \Pluswerk\Simpleblog\Domain\Repository\BlogRepository
     */
    protected $blogRepository;

    /**
     * @param \Pluswerk\Simpleblog\Domain\Repository\BlogRepository $blogRepository
     */
    public function injectBlogRepository(
        \Pluswerk\Simpleblog\Domain\Repository\BlogRepository $blogRepository
    ) {
        $this->blogRepository = $blogRepository;
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $this->view->assign('blogs', $this->blogRepository->findSearchWord('Blog'));
//        $this->view->assign('blogs', $this->blogRepository->findAll());
    }

    /**
     * @param \Pluswerk\Simpleblog\Domain\Model\Blog $blog
     */
    public function addFormAction(
        \Pluswerk\Simpleblog\Domain\Model\Blog $blog = null
    ) {
        $this->view->assign('blog', $blog);
    }

    /**
     * @param \Pluswerk\Simpleblog\Domain\Model\Blog $blog
     */
    public function addAction(\Pluswerk\Simpleblog\Domain\Model\Blog $blog)
    {
        $this->blogRepository->add($blog);
        $this->redirect('list');
    }

    /**
     * @param \Pluswerk\Simpleblog\Domain\Model\Blog $blog
     *
     */
    public function showAction(\Pluswerk\Simpleblog\Domain\Model\Blog $blog)
    {
        $this->view->assign('blog', $blog);
    }

    /**
     * @param \Pluswerk\Simpleblog\Domain\Model\Blog $blog
     */
    public function updateFormAction(
        \Pluswerk\Simpleblog\Domain\Model\Blog $blog
    ) {
        $this->view->assign('blog', $blog);
    }

    /**
     * @param \Pluswerk\Simpleblog\Domain\Model\Blog $blog
     */
    public function updateAction(\Pluswerk\Simpleblog\Domain\Model\Blog $blog)
    {
        $this->blogRepository->update($blog);
        $this->redirect('list');
    }

    /**
     * @param \Pluswerk\Simpleblog\Domain\Model\Blog $blog
     */
    public function deleteAction(\Pluswerk\Simpleblog\Domain\Model\Blog $blog)
    {
        $this->blogRepository->remove($blog);
        $this->redirect('list');
    }

    /**
     * @param \Pluswerk\Simpleblog\Domain\Model\Blog $blog
     */
    public function deleteConfirmAction(
        \Pluswerk\Simpleblog\Domain\Model\Blog $blog
    ) {
        $this->view->assign('blog', $blog);
    }


//    public function initializeObject(){
//        $this->databaseHandle = $GLOBALS['TYPO3_DB'];
//        $this->databaseHandle->explainOuput = 2;
//        $this->databaseHandle->store_lastBuiltQuery = true;
//        $this->databaseHandle->debugOutput = 2;
//    }

}
