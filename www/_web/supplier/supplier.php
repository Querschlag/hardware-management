<?php require_once('php/navigation.php'); ?>
<!-- Refactor this to be created dynamically -->
<div id="breadcrumb_nav">
	<ul>	
		<?php
			// add selected menu entry
			include ('php/breadcrumb.php');
		?>
		<!--
		<li><a href="index.php?menu=management&mod=rooms">Stammdaten</a></li>
		<li>>> <a href="index.php?mod=supplier">Lieferant</a></li>
		-->
		<li>>> <a href="index.php<?php echo navParams(array('mod' => 'supplier'), false) ?>">Lieferanten</a></li>
	</ul>
</div>
<div id="module">
	<div id="action_bar">
		<a class="left" href="index.php<?php echo navParams(array('mod' => 'createSupplier'), false) ?>">Neuer Lieferant</a>
		<div class="clearfix"></div>
		</div>
		<h2>Lieferanten</h2>
		<ul class="orders">
	
		<!-- FIXME: Post on module to handle inputs. After that redirect to upper nav item. -->
		<?php
			// include deliverer controller
			require_once('../_php/core/DelivererController.php');
			
			// include mock database
			require_once('../_php/database/Database.php');
			
			// include deliverer entity
			require_once('../_php/entity/DelivererEntity.php');
		
			// include deliverer entity
			require_once('../_php/interface/IDeliverer.php');
	
			/**
			* Deliverer object
			*
			* Deliverer object with functionality of IRoom
			*
			* @category 
			* @package
			* @author Johannes Alt <altjohannes510@gmail.com>
			* @copyright 2013 B3ProjectGroup2
			*/	
			class Deliverer implements IDeliverer
			{
				
				/**
				 *  storage for the row max
				 */
				 
				private $_rowMax = 7;
				
				/** 
				 *  storage for the row count
				 */
				private $_DelivererCount;
					
					
				private $_rowCount;
								
				/**
				 *  function to display room
				 * 
				 * @author Johannes Alt <altjohannes510@gmail.com> 
				 */
				public function displayDeliverer($id, $companyName, $street, $zip, $city, $telephone, $mobile, $fax, $email, $country)
				{
					// check row count
					if($this->_rowCount == $this->_rowMax)
					{
						// print end list
						print '</ul>';					
					}
					
					// check row count
					if(isset($this->_rowCount) == FALSE || $this->_rowCount == $this->_rowMax)
					{
						// print start list
						// print '<ul class="suppliers">';
						
						// reset row count
						$this->_rowCount = 0;
					}
					
					// print list element
					print '<li style="background-color: #eee"><a href="index.php?mod=editSupplier&supplierId=' . $id .'"">' . $companyName . '</a></li>';
					
					// increase row count
					$this->_rowCount++;			
				}
			
				/**
			* function to get Deliverer id
			* 
			* @author Thomas Bayer <thomasbayer95@gmail.com>
			*/
			public function getDelivererId()
			{
				return "";
			}
		
			
			/**
			 *  function to get Deliverer campany name
			 * 
			 * @author Thomas Bayer <thomasbayer95@gmail.com>
			 */
			public function getDelivererCompanyName()
			{
				return "";
			}
		
			/** 
			 *  function to get Deliverer street
			 * 
			 * @author Thomas Bayer <thomasbayer95@gmail.com>
			 */
			public function getDelivererStreet()
			{
				return "";
			}
		
				
			/**
			 * function to get Deliverer zip 
			 * 
			 * @author Thomas Bayer <thomasbayer95@gmail.com>
			 */
			public function getDelivererZip()
			{
				return "";
			}
			
			/**
			 * function to get Deliverer city
			 * 
			 * @author Thomas Bayer <thomasbayer95@gmail.com>
			 */
			public function getDelivererCity()
			{
				return "";
			}
			
			
			/**
			 * function to get Deliverer telephone 
			 * 
			 * @author Thomas Bayer <thomasbayer95@gmail.com>
			 */
			public function getDelivererTelephone()
			{
				return "";
			}
			
			
			/**
			 * function to get Deliverer mobile
			 * 
			 * @author Thomas Bayer <thomasbayer95@gmail.com>
			 */
			public function getDelivererMobile()
			{
				return "";
			}
			
			
			/**
			 * function to get Deliverer fax
			 * 
			 * @author Thomas Bayer <thomasbayer95@gmail.com>
			 */
			public function getDelivererFax()
			{
				return "";
			}
			
			
			/**
			 * function to get Deliverer email
			 * 
			 * @author Thomas Bayer <thomasbayer95@gmail.com>
			 */
			public function getDelivererEmail()
			{
				return "";
			}
			
			
			/**
			 * function to get Deliverer country
			 * 
			 * @author Thomas Bayer <thomasbayer95@gmail.com>
			 */
			public function getDelivererCountry()
			{
				return "";
			}
				
			/**
			 * function to set error
			 * 
			 * @author Johannes Alt <altjohannes510@gmail.com>
			 */			
			public function setError()
			{
				// print unknown error message
				print '<b><p><span class="require">Unbekannter Fehler! 
						Bitte versuchen Sie es später nocheinmal</span></p></b>';		
			}
		
		   /**
			 * function to set Deliverer email
			 * 
			 * @author Thomas Bayer <thomasbayer95@gmail.com>
			 */
			public function setDelivererEmailError()
			{
				// print error message
				print '<b><p><span class="require">E-Mail ist nicht richtig</span></p></b>';
			}
			
			}
	
			// create view object
			$view = new Deliverer($_POST);
			
			// create database
			$database = new Database();
			
			// create controller object
			$controller = new DelivererController($view, $database);
					
			// select the deliverers
			$controller->selectDeliverers();
		?>
	</div>
	<!--
	<h2>Lieferanten</h2>
	<ul class="orders">
		<li style="background-color: #eee"><a href="index.php<?php echo navParams(array('mod' => 'editSupplier', 'supplier' => 1)) ?>">DHL</a></li>
		<li style="background-color: #ddd"><a href="index.php<?php echo navParams(array('mod' => 'editSupplier', 'supplier' => 2)) ?>">Kondrad</a></li>
	</ul>
	-->
</div>