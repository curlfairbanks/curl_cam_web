<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from templates/Pages/
 *
 * @link https://book.cakephp.org/4/en/controllers/pages-controller.html
 */
class CamerasController extends AppController
{
		private $pi_list = [
				"sheet_1" => "192.168.227.277",
				"sheet_2" => "192.168.227.277",
				"sheet_3" => "192.168.227.277",
				"sheet_4" => "192.168.227.277",
				"sheet_5" => "192.168.227.277",
				"sheet_6" => "192.168.227.277"
			];
			
		public function index()
		{
			$data = $this->request->getData();
			if($data) {
				foreach($data as $sheet=>$setting) {
					if($sheet == "all") {
						$this->setAll($setting);
						continue;
					}
					if($setting != 0) {
						$this->setCam($this->pi_list[$sheet], $setting);
					}
				}
			}
		}
		
		public function setAll($camera_view)
		{
			foreach($this->pi_list as $pi_address) {
				$this->setCam($pi_address, $camera_view);
			}
		}
		
		public function setCam($pi_address, $camera_view)
		{
			
			$fp = @fsockopen($pi_address, 10000, $errno, $errstr, 30);
			if(!$fp) {
				return 0;
			} else {
				$out = "^".$camera_view;
				fwrite($fp, $out);
				fclose($fp);
				return 1;
			}
		}
		
}
