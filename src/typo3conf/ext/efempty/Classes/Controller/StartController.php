<?php
namespace Pluswerk\Efempty\Controller;

class StartController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
	/**
	 * Initializes the current action
	 *
	 * @return void
	 */
	public function initializeAction()
	{

	}

	/**
	 * Index action for this controller.
	 *
	 * @return string The rendered view
	 */
	public function indexAction()
	{
		// plain assign
		$this->view->assign('helloworld1', 'Hello World 1!');
		
		// normal array assign
		$array = array('Hello','World','2!');
		$this->view->assign('helloworld2', $array);
		
		// assoziative array assign
		$array = array('first' => 'Hello', 'middle' => 'World', 'last' => '3!');
		$this->view->assign('helloworld3', $array);
		
		// object assign
		$start = new \Pluswerk\Efempty\Domain\Model\Start();
       	$start->setTitle('Hello World 4!');
      	$this->view->assign('helloworld4', $start);

        // more object assign
        $obj = array();
        for ($i=1; $i<=3; $i++) {
            $start = $this->objectManager->get('Pluswerk\\Efempty\\Domain\\Model\\Start');
            $start->setTitle('Hello World 5! - Nr. '.$i);
            $obj[] = $start;
        }
        $this->view->assign('helloworld5', $obj);

	}

    /**
     * Index action for this controller.
     *
     * @return string The rendered view
     */
    public function showAction()
	{

    }
    
    
    public function listAction()
    {
        
        $url = 'https://gujims.com/rest/2.0/branduniverse/de/list';
        // create curl resource
        $ch = curl_init();
        
        // set url
        curl_setopt($ch, CURLOPT_URL, $url);
        
        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       
        
        // $output contains the output string
        $output = curl_exec($ch);
        $new = json_decode($output);
        
        $newOut = array();
       
        foreach ($new as $key => $value){    
                       
        }

        
        $this->view->assign('Brand', $new);
        
        #echo($output);
        
        // close curl resource to free up system resources
        curl_close($ch);
        
    }
}


?>