<?php
$content=file_get_contents($_POST['txtgeturl']);
$global_content1  = $content;
$global_content2  = $content;
$global_content3  = $content;
$global_content4  = $content;
$global_content5  = $content;
$global_content6  = $content;
$global_content7  = $content;
$global_content8  = $content;
$global_content9  = $content;
$global_content10 = $content;
$buffer=new array();
//echo $content;
/********************************************/

//Getting Model and monle name
//*************************************
$startpos=strpos($content,'class="brand"');
$content=substr($content,$startpos);
$startpos=strpos($content,"<h1>")+4;
if($startpos)
	{
		$endpos=strpos($content,"</h1");
		$modelname=substr($content,$startpos,$endpos-$startpos);
		//$modelname=split(" ",$modelname);
		$brand = array_shift($modelname);//$modelname[0];
                
		$model = implode(" ", $modelname) ; //$modelname[1];
		$buffer[]=$model;
	}
        ///print_r($model) ;
        //echo $brand."<br>".$model;
//exit;
//Geting Image Name
$startpos=strpos($content,"specs-cp-pic");
$content=substr($content,$startpos);
$startpos=strpos($content,"src");

if($startpos)
	{ 
		$endpos=strpos($content,"></a>")-3;
		//echo $startpos." ".$endpos;
		$imgname=substr($content,$startpos+3,$endpos-$startpos);
		//echo $imgname.'<br>';
	}
//Now Finding Content of the on the page;
$image = "<img src='".str_replace("=","",$imgname)."'>";
//createThumbnail(str_replace("=","",$imgname));





//echo "<img src='thumb_mobilename.gif'><br>";
$startpos=strpos($content,"specs-list");
if($startpos)
	{
    
				if ($startpos)
					{
						$content=substr($content,$startpos);
						$startpos=strpos($content,"specs-list")+12;
						
						$endpos=strpos($content,"<table") ;
						
						//echo substr($content,$startpos,$endpos-$startpos).'<br>';
						$description = str_replace("</td>","",substr($content,$startpos,$endpos-$startpos));
                        $description = strip_tags($description);
                        $description = str_replace('.tr-toggle', '', $description);
                        $description = str_replace('display:none;', '', $description);
                        $description = str_replace('{', '', $description);
                        $description = str_replace('}', '', $description);
                        $description = str_replace('  ', '', $description);
                        $description = trim($description);
                        $buffer[]=$description;
                        //$description = preg_replace('/\s+/', '', $description);
					}    
                                        
                                        
                                        
                                       
//		while(strpos($content,"ttl"))
			{
			
			
			//Getting Model and monle name
//*************************************

			
			
				//2G Newwork Mobile
				$startpos=strpos($content,"2G bands");
				if ($startpos)
					{
						$content=substr($content,$startpos);
						$startpos=strpos($content,"nfo")+5;
						
						$endpos=strpos($content,"</tr>") ;
						
					//	echo substr($content,$startpos,$endpos-$startpos).'<br>';
						$network2 = str_replace("</td>","",substr($content,$startpos,$endpos-$startpos));
					}
	
				//2G End
				//3G Newwork Mobile
				$startpos=strpos($content,"3G bands");
				
				if ($startpos)
					{
						$content=substr($content,$startpos);
						$startpos=strpos($content,"nfo")+5;
						
						$endpos=strpos($content,"</tr>") ;
						
					//	echo substr($content,$startpos,$endpos-$startpos).'<br>';
						$network3 = str_replace("</td>","",substr($content,$startpos,$endpos-$startpos));
						$buffer[]=$network3;
					}
                                        
                //GPRS

				$startpos=strpos($content,"GPRS");
				if ($startpos)
					{
						$content=substr($content,$startpos);
						$startpos=strpos($content,"nfo")+5;
						
						$endpos=strpos($content,"</tr>") ;
						
					//	echo substr($content,$startpos,$endpos-$startpos).'<br>';
						$gprs = str_replace("</td>","",substr($content,$startpos,$endpos-$startpos));
						$buffer[]=$gprs;
					}
				
				$startpos=strpos($content,"EDGE");
				if ($startpos)
					{
						$content=substr($content,$startpos);
						$startpos=strpos($content,"nfo")+5;
						
						$endpos=strpos($content,"</tr>") ;
						
					//	echo substr($content,$startpos,$endpos-$startpos).'<br>';
						$edge = str_replace("</td>","",substr($content,$startpos,$endpos-$startpos));
						$buffer[]=$edge;
					}  
                                        

				//3G End
				//Announced
				$startpos=strpos($content,"Announced");
				if ($startpos)
					{
						$content=substr($content,$startpos);
						$startpos=strpos($content,"nfo")+5;
						
						$endpos=strpos($content,"</tr>") ;
						
					//	echo substr($content,$startpos,$endpos-$startpos).'<br>';
						$announced = str_replace("</td>","",substr($content,$startpos,$endpos-$startpos));
						$buffer[]=$announced;
					}
				//Announced End
				//Status
				$startpos=strpos($content,"Status");
				if ($startpos)
					{
						$content=substr($content,$startpos);
						$startpos=strpos($content,"nfo")+5;
						
						$endpos=strpos($content,"</tr>") ;
						
						//echo substr($content,$startpos,$endpos-$startpos).'<br>';
						$status = str_replace("</td>","",substr($content,$startpos,$endpos-$startpos));
                                                $status = strip_tags($status);
                                                $buffer[]=$status;
					}
				//Status End
				//Dimensions
                                        
                                    
				$startpos=strpos($content,"Dimensions");
				if ($startpos)
					{
						$content=substr($content,$startpos);
						$startpos=strpos($content,"nfo")+5;
						
						$endpos=strpos($content,"</tr>") ;
						
						//echo substr($content,$startpos,$endpos-$startpos).'<br>';
						$dimensions = str_replace("</td>","",substr($content,$startpos,$endpos-$startpos));
						$buffer[] = $dimensions;
					}
                                         
				//Dimensions End
				//Weight
				$startpos=strpos($content,"Weight");
				if ($startpos)
					{
						$content=substr($content,$startpos);
						$startpos=strpos($content,"nfo")+5;
						
						$endpos=strpos($content,"</tr>") ;
						
			//			echo substr($content,$startpos,$endpos-$startpos).'<br>';
						$weight = str_replace("</td>","",substr($content,$startpos,$endpos-$startpos));
						$buffer[] = $weight;
					}
				//Weight End
				//Type
				$startpos=strpos($content,"Type");
				if ($startpos)
					{
						$content=substr($content,$startpos);
						$startpos=strpos($content,"nfo")+5;
						
						$endpos=strpos($content,"</tr>") ;
						
					//	echo substr($content,$startpos,$endpos-$startpos).'<br>';
						$type = str_replace("</td>","",substr($content,$startpos,$endpos-$startpos));
						$buffer[] = $type;
					}
				//Type End
				//Size
				$startpos=strpos($content,"Size");
				if ($startpos)
					{
						$content=substr($content,$startpos);
						$startpos=strpos($content,"nfo")+5;
						
						$endpos=strpos($content,"</tr>") ;
						
					//	echo substr($content,$startpos,$endpos-$startpos).'<br>';
						$size = str_replace("</td>","",substr($content,$startpos,$endpos-$startpos));
						$buffer[] = $size;
						
					}
                                        
                                        
                                       
				//Size End
				//Size Space
				//Card slot
				$startpos=strpos($content,"Card slot");
				if ($startpos)
					{
						$content=substr($content,$startpos);
						$startpos=strpos($content,"nfo")+5;
						
						$endpos=strpos($content,"</tr>") ;
						
					//	echo substr($content,$startpos,$endpos-$startpos).'<br>';
						$cardslot = str_replace("</td>","",substr($content,$startpos,$endpos-$startpos));
                                                $cardslot = strip_tags($cardslot);
                                                $buffer[] = $cardslot;
					}

				// shared memory
				$startpos=strpos($content,"Internal</a></td>");
					if ($startpos)
						{
							$content=substr($content,$startpos);
							$startpos=strpos($content,"nfo")+5;
							
							$endpos=strpos($content,"</tr>") ;
							
						//	echo substr($content,$startpos,$endpos-$startpos).'<br>';
							$sharedmemory = str_replace("</td>","",substr($content,$startpos,$endpos-$startpos));
							$buffer[] = $sharedmemory;
						}

				//Camera
				// $startpos=strpos($content,"Primary");
				$startpos=strpos($content,"Primary</a></td>");
				if ($startpos)
					{
						$content=substr($content,$startpos);
						$startpos=strpos($content,"nfo")+5;
						
						$endpos=strpos($content,"</tr>") ;
						
				//		echo substr($content,$startpos,$endpos-$startpos).'<br>';
						$camera = str_replace("</td>","",substr($content,$startpos,$endpos-$startpos));
						$camera = strip_tags($camera);
						$camera = str_replace('check quality', '', $camera);
						$buffer[] = $camera;
					}
				//Camera
				//Call records End
                                        
                                    $startpos=strpos($content,"Features</a></td>");
				if ($startpos)
					{
						$content=substr($content,$startpos);
						$startpos=strpos($content,"nfo")+5;
						
						$endpos=strpos($content,"</tr>") ;
						
				//		echo substr($content,$startpos,$endpos-$startpos).'<br>';
						$dp_features = str_replace("</td>","",substr($content,$startpos,$endpos-$startpos));
						$buffer[] = $dp_features;
					}    
                                         
				$startpos=strpos($content,"Sound");
				if ($startpos)
					{
					
						$content1=substr($content,0,$startpos);
						$startpos=strpos($content1,"&nbsp;");
					   if ($startpos)
					   	{
							$content=substr($content,$startpos);
							$startpos=strpos($content,"nfo")+5;
							$endpos=strpos($content,"</tr>") ;
					//		echo substr($content,$startpos,$endpos-$startpos).'<br>';
							$rt_size = str_replace("</td>","",str_replace(",","",substr($content,$startpos,$endpos-$startpos)));
							$buffer[] = $rt_size;
						}
					}
				//Size Space End
				//Type
				$startpos=strpos($content,"Alert types");
				if ($startpos)
					{
						$content=substr($content,$startpos);
						$startpos=strpos($content,"nfo")+5;
						
						$endpos=strpos($content,"</tr>") ;
						
					//	echo substr($content,$startpos,$endpos-$startpos).'<br>';
						$rt_type = str_replace("</td>","",substr($content,$startpos,$endpos-$startpos));
						$buffer[] = $rt_type;
					}
				//Type End
				//Customization
				$startpos=strpos($content,"Speakerphone");
				if ($startpos)
					{
						$content=substr($content,$startpos);
						$startpos=strpos($content,"nfo")+5;
						
						$endpos=strpos($content,"</tr>") ;
						
					//	echo substr($content,$startpos,$endpos-$startpos).'<br>';
						$rt_customization = str_replace("</td>","",substr($content,$startpos,$endpos-$startpos));
						$buffer[] = $rt_customization;
					}
				//Customization End
				//Vibration
				$startpos=strpos($content,"Vibration");
				if ($startpos)
					{
						$content=substr($content,$startpos);
						$startpos=strpos($content,"nfo")+5;
						
						$endpos=strpos($content,"</tr>") ;
						
					//	echo substr($content,$startpos,$endpos-$startpos).'<br>';
						$vibration = str_replace("</td>","",substr($content,$startpos,$endpos-$startpos));
						$buffer[] = $vibration;
					}
				//Vibration End
				//Vibration Space
				$startpos=strpos($content,"Internal");
				if ($startpos)
					{
					
						$content1=substr($content,0,$startpos);
						$startpos=strpos($content1,"&nbsp;");
					   if ($startpos)
					   	{
							$content=substr($content,$startpos);
							$startpos=strpos($content,"nfo")+5;
							$endpos=strpos($content,"</tr>") ;
					//		echo substr($content,$startpos,$endpos-$startpos).'<br>';
							$vibration_space = str_replace("</td>","",substr($content,$startpos,$endpos-$startpos));
							$buffer[] = $vibration_space;
						}
					}
				//Vibration Space End
				//Phonebook
				$startpos=strpos($content,"Phonebook");
				if ($startpos)
					{
						$content=substr($content,$startpos);
						$startpos=strpos($content,"nfo")+5;
						
						$endpos=strpos($content,"</tr>") ;
						
				//		echo substr($content,$startpos,$endpos-$startpos).'<br>';
						$phonebook = str_replace("</td>","",substr($content,$startpos,$endpos-$startpos));
						$buffer[] = $phonebook;
					}
				//Phonebook End
				//Call records
				$startpos=strpos($content,"Call records");
				if ($startpos)
					{
						$content=substr($content,$startpos);
						$startpos=strpos($content,"nfo")+5;
						
						$endpos=strpos($content,"</tr>") ;
						
					//	echo substr($content,$startpos,$endpos-$startpos).'<br>';
						$callrecords = str_replace("</td>","",substr($content,$startpos,$endpos-$startpos));
						$buffer[] = $callrecords;
					}
				//Call records End
				
				//Card slot Space
				$startpos=strpos($content,"Data");
				if ($startpos)
					{
					
						$content1=substr($content,0,$startpos);
						$startpos=strpos($content1,"&nbsp;");
					   if ($startpos)
					   	{
							$content=substr($content,$startpos);
							$startpos=strpos($content,"nfo")+5;
							$endpos=strpos($content,"</tr>") ;
						//	echo substr($content,$startpos,$endpos-$startpos).'<br>';
							$cardslotspace = str_replace("</td>","",str_replace(",","",substr($content,$startpos,$endpos-$startpos)));
							$buffer[] = $cardslotspace;
						}
					}
				//Card Slot Space End
				
				//EDGE End
				//3G
				// $startpos=strpos($content,"3G");
				// if ($startpos)
				// 	{
				// 		$content=substr($content,$startpos);
				// 		$startpos=strpos($content,"nfo")+5;
						
				// 		$endpos=strpos($content,"</tr>") ;
				// 		$g3 = str_replace("</td>","",substr($content,$startpos,$endpos-$startpos));
				// 	}
				//3G End
				//WLAN
				$startpos=strpos($content,"WLAN</a>");
				if ($startpos)
					{
						$content=substr($content,$startpos);
						$startpos=strpos($content,"nfo")+5;
						
						$endpos=strpos($content,"</tr>") ;
						
				//		echo substr($content,$startpos,$endpos-$startpos).'<br>';
						$wlan = str_replace("</td>","",substr($content,$startpos,$endpos-$startpos));
						$buffer[] = $wlan;
					}
				//WLAN End
				//Bluetooth
				$startpos=strpos($content,"Bluetooth</a>");
				if ($startpos)
					{
						$content=substr($content,$startpos);
						$startpos=strpos($content,"nfo")+5;
						
						$endpos=strpos($content,"</tr>") ;
						
				//		echo substr($content,$startpos,$endpos-$startpos).'<br>';
						$bluetooth = str_replace("</td>","",substr($content,$startpos,$endpos-$startpos));
						$buffer[] = $bluetooth;
					}
				//Bluetooth End
				//Infrared port
				$startpos=strpos($content,"Infrared port");
				if ($startpos)
					{
						$content=substr($content,$startpos);
						$startpos=strpos($content,"nfo")+5;
						
						$endpos=strpos($content,"</tr>") ;
						
				//		echo substr($content,$startpos,$endpos-$startpos).'<br>';
						$infrared = str_replace("</td>","",substr($content,$startpos,$endpos-$startpos));
						$buffer[] = $infrared;
					}
				//Infrared port End
				//USB
				$startpos=strpos($content,"USB</a>");
				if ($startpos)
					{
						$content=substr($content,$startpos);
						$startpos=strpos($content,"nfo")+5;
						
						$endpos=strpos($content,"</tr>") ;
						
					//	echo substr($content,$startpos,$endpos-$startpos).'<br>';
						$usb = str_replace("</td>","",substr($content,$startpos,$endpos-$startpos));
						$buffer[] = $usb;
					}
				//USB End
				//Messaging
				// $startpos=strpos($content,"OS");
				$startpos=strpos($global_content2,"OS</a></td>");
				if ($startpos)
				{
					$global_content2=substr($global_content2,$startpos);
					$startpos=strpos($global_content2,"nfo")+5;

					// echo $global_content2;
					
					$endpos=strpos($global_content2,"</tr>") ;
					
				//	echo substr($global_content2,$startpos,$endpos-$startpos).'<br>';
					$os = str_replace("</td>","",substr($global_content2,$startpos,$endpos-$startpos));
					$buffer[] = $os;
				}
				//Messaging End
				//Messaging
				$startpos=strpos($content,"Messaging");
				if ($startpos)
					{
						$content=substr($content,$startpos);
						$startpos=strpos($content,"nfo")+5;
						
						$endpos=strpos($content,"</tr>") ;
						
				//		echo substr($content,$startpos,$endpos-$startpos).'<br>';
						$messaging = str_replace("</td>","",substr($content,$startpos,$endpos-$startpos));
						$buffer[] = $messaging;
					}
				//Messaging End
				//Games
				$startpos=strpos($content,"Games");
				if ($startpos)
					{
						$content=substr($content,$startpos);
						$startpos=strpos($content,"nfo")+5;
						
						$endpos=strpos($content,"</tr>") ;
						
					//	echo substr($content,$startpos,$endpos-$startpos).'<br>';
						$games = str_replace("</td>","",substr($content,$startpos,$endpos-$startpos));
						$buffer[] = $games;
					}
				//Games End
				// $startpos=strpos($content,"Battery");
				$startpos=strpos($content,'Battery</th><td class="ttl">&nbsp;</td>');
				if ($startpos)
					{
					
						$content1=substr($content,0,$startpos);
						$startpos=strpos($content1,"&nbsp;");
					   if ($startpos)
					   	{
							$content=substr($content,$startpos+5);
							$startpos=strpos($content,"nfo")+5;
							$endpos=strpos($content,"</tr>") ;
					//		echo substr($content,$startpos,$endpos-$startpos).'<br>';
							$cameraspace = str_replace("</td>","",str_replace(",","",substr($content,$startpos,$endpos-$startpos)));
							$buffer[] = $cameraspace;
						}
					}
				//Space End
				//Battery Space
				//Browser
				$startpos=strpos($content,"Browser");
				if ($startpos)
					{
						$content=substr($content,$startpos);
						$startpos=strpos($content,"nfo")+5;
						
						$endpos=strpos($content,"</tr>") ;
						
					//	echo substr($content,$startpos,$endpos-$startpos).'<br>';
						$browser = str_replace("</td>","",substr($content,$startpos,$endpos-$startpos));
						$buffer[] = $browser;
					}
				//Browser End
				// $startpos=strpos($content,"&nbsp;");
				$startpos=strpos($global_content1,'Battery</th>');
				if ($startpos)
					{
						$global_content1=substr($global_content1,$startpos);
						$startpos=strpos($global_content1,"nfo")+5;
						
						$endpos=strpos($global_content1,"</tr>") ;
						
					//	echo substr($global_content1,$startpos,$endpos-$startpos).'<br>';
						$battery = str_replace("</td>","",substr($global_content1,$startpos,$endpos-$startpos));
						$buffer[] = $battery;
					}
				//Battery End
				//Stand-by Space
				$startpos=strpos($content,"Stand-by");
				if ($startpos)
					{
						$content=substr($content,$startpos);
						$startpos=strpos($content,"nfo")+5;
						
						$endpos=strpos($content,"</tr>") ;
						
			//			echo substr($content,$startpos,$endpos-$startpos).'<br>';
						$standby = str_replace("</td>","",substr($content,$startpos,$endpos-$startpos));
						$buffer[] = $standby;
					}
				//Stand-by End
				//Talk time
				$startpos=strpos($content,"Talk time");
				if ($startpos)
					{
						$content=substr($content,$startpos);
						$startpos=strpos($content,"nfo")+5;
						
						$endpos=strpos($content,"</tr>") ;
						
			//			echo substr($content,$startpos,$endpos-$startpos).'<br>';
						$talktime = str_replace("</td>","",substr($content,$startpos,$endpos-$startpos));
						$buffer[] = $talktime;
					}
				//Talk time End
				
				//Colors
				$startpos=strpos($content,"Colors");
				if ($startpos)
					{
						$content=substr($content,$startpos);
						$startpos=strpos($content,"nfo")+5;
						
						$endpos=strpos($content,"</tr>") ;
						
				//		echo substr($content,$startpos,$endpos-$startpos).'<br>';
						$colors = str_replace("</td>","",substr($content,$startpos,$endpos-$startpos));
						$buffer[] = $colors;
					}
				//Colors End
			}
	}	
	
	
?>